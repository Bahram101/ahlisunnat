<?php


namespace app\models;
use app\models\Cities;
use app\modules\admin\models\Ip;
use Yii;
use yii\helpers\FileHelper;
use yii\helpers\Json;

class Praytimes{
    public static function GetCityIdByIp(){
        $session = Yii::$app->session;
        $city_id = $session['city_id'];

        $UserIp = Yii::$app->getRequest()->getUserIP();
        $findIp = Ip::find()->where(['ip'=>$UserIp])->asArray()->limit(1)->one();

        if($city_id){
            if (!($city_id == $findIp['city'])){
                Praytimes::CHeckIpOnDb($UserIp, $city_id);
            }
        }
        if($city_id){
            $city = Cities::find()->where(['like', 'id', $city_id])->asArray()->one();
            return $city;
        }else{
            return false;
            $json = file_get_contents('http://ru3.sxgeo.city/doSHr/json/'.$UserIp);

            $json = Json::decode($json);
			
            if ($json['city']['name_en']) {
                $city = Cities::find()->where(['like', 'name_en', 'Shymkent'])->asArray()->one();
                self::CHeckIpOnDb($UserIp,$city['id']);
                $session = Yii::$app->session;
                $session->set('city_id', $city['id']);
				
            } elseif ($json['country']['capital_en']) {
                $city = Cities::find()->where(['like', 'name_en', $json['country']['capital_en']])->asArray()->one();				
                self::CHeckIpOnDb($UserIp,$city['id']);
                $session = Yii::$app->session;
                $session->set('city_id', $city['id']);

            } elseif ($json['country']['name_en']) {
                $country = Countries::find()->where(['like', 'en', $json['country']['name_en']])->asArray()->one();
                $city = Cities::find()->where(['like', 'country_id', $country['id']])->asArray()->one();
                self::CHeckIpOnDb($UserIp,$city['id']);
                $session = Yii::$app->session;
                $session->set('city_id', $city['id']);

            }else{
                $city = Cities::find()->where(['like', 'id', '8408'])->asArray()->one();			
                self::CHeckIpOnDb($UserIp,$city['id']);
                $session = Yii::$app->session;
                $session->set('city_id', $city['id']);
            }
			
            return $city;
        }

    }

    public static function CHeckIpOnDb($UserIp,$city_id){
        $model = Ip::find()->where(['ip'=>$UserIp])->asArray()->limit(1)->one();
        if ($model == null) {
            $model = new Ip();
            $model->ip = $UserIp;
            $model->city = $city_id;
        }else{
            $model = Ip::findOne($model['id']);
            $model->ip = $UserIp;
            $model->city = $city_id;
        }
        $model->save();
    }

    public static function CheckXml($city_id){
        $city_id = (int)$city_id;
        //Create xml
        $storage = Yii::getAlias('@app/xml/'.date("Y"));
        if(!file_exists($storage)) FileHelper::createDirectory($storage);
        if(!file_exists($storage.'/'.$city_id.'.xml')){
            file_put_contents($storage.'/'.$city_id.'.xml',
                file_get_contents('http://www.namazvakti.com/XML.php?cityID='.$city_id)
            );
        }

        //Del trush
        $directories = Yii::getAlias('@app/xml/');
        $directories = array_diff(scandir($directories), array('..', '.'));
        foreach ($directories as $directory){
            if($directory != date("Y")){
                FileHelper::removeDirectory(Yii::getAlias('@app/xml/').$directory);
            }
        }
    }

    public static function Praylist($city_id){
        $city_id = (int)$city_id;
        self::CheckXml($city_id);
        $storage = Yii::getAlias('@app/xml/'.date("Y"));
        //Load xml and convert to json
        $path = $storage.'/'.$city_id.'.xml';
        $xmlfile = file_get_contents($path);
        $xmlfile= simplexml_load_string($xmlfile);
        $xmlfile  = json_encode($xmlfile);
        $configData = json_decode($xmlfile, true);


        $TimesName =[
            "imsak","bamdat", "kun","ishraq",
            "kerahat","besin","asriauual","ekindi",
            "isfirar","aqsham","ishtibaq","quptan","ishaisani"
        ];

        $today = date("z")+1;
        $today = explode ("	", $configData['prayertimes'][$today], 16);

        $today = array_diff_key($today, array_flip(array("13", "14","15")));
        $today = array_combine($TimesName, $today);

        $yesterday = date("z");
        $yesterday = explode ("	", $configData['prayertimes'][$yesterday], 16);
        $yesterday = array_diff_key($yesterday, array_flip(array("13", "14","15")));
        $yesterday = array_combine($TimesName, $yesterday);

        $tomorrow = date("z")+2;
        $tomorrow = explode ("	", $configData['prayertimes'][$tomorrow], 16);
        $tomorrow = array_diff_key($tomorrow, array_flip(array("13", "14","15")));
        $tomorrow = array_combine($TimesName, $tomorrow);

        $tine =(date("z")+1);
        $xmlres =  $configData['prayertimes'][$tine];
        $chunks = explode ("	", $xmlres, 16);
        $imsak = str_replace("*","",$chunks[0]);
        $imsak = explode (":", $imsak, 2);
        $bamdat = explode (":", $chunks[1], 2);
        $kun = explode (":", $chunks[2], 2);
        $ishraq = explode (":", $chunks[3], 2);
        $kerahat = explode (":", $chunks[4], 2);
        $besin = explode (":", $chunks[5], 2);
        $ekindi_asri_aual = explode (":", $chunks[6], 2);
        $ekindi = explode (":", $chunks[7], 2);
        $isfirar = explode (":", $chunks[8], 2);
        $aqsham = explode (":", $chunks[9], 2);
        $ishtibaq = explode (":", $chunks[10], 2);
        $quptan = str_replace("*","",$chunks[11]);
        $quptan = explode (":", $quptan, 2);

        if($chunks[12]=='-'){
            $ishaisani = str_replace("*","",$chunks[11]);
            $ishaisani = explode (":", $ishaisani, 2);
        }else{
            $ishaisani = str_replace("*","",$chunks[12]);
            $ishaisani = explode (":", $ishaisani, 2);
        }
        $namaztimes_details = [
            "imsak" =>  [
                "hour" =>  $imsak[0],
                "minute" => $imsak[1],
            ],
            "bamdat" =>  [
                "hour" =>  $bamdat[0],
                "minute" => $bamdat[1],
            ],
            "kun" =>  [
                "hour" =>  $kun[0],
                "minute" => $kun[1],
            ],
            "ishraq" =>  [
                "hour" =>  $ishraq[0],
                "minute" => $ishraq[1],
            ],
            "kerahat" =>  [
                "hour" =>  $kerahat[0],
                "minute" => $kerahat[1],
            ],
            "besin" =>  [
                "hour" =>  $besin[0],
                "minute" => $besin[1],
            ],
            "ekindi_asri_aual" =>  [
                "hour" =>  $ekindi_asri_aual[0],
                "minute" => $ekindi_asri_aual[1],
            ],
            "ekindi" =>  [
                "hour" =>  $ekindi[0],
                "minute" => $ekindi[1],
            ],
            "isfirar" =>  [
                "hour" =>  $isfirar[0],
                "minute" => $isfirar[1],
            ],
            "aqsham" =>  [
                "hour" =>  $aqsham[0],
                "minute" => $aqsham[1],
            ],
            "ishtibaq" =>  [
                "hour" =>  $ishtibaq[0],
                "minute" => $ishtibaq[1],
            ],
            "quptan" =>  [
                "hour" =>  $quptan[0],
                "minute" => $quptan[1],
            ],
            "ishaisani" =>  [
                "hour" =>  $ishaisani[0],
                "minute" => $ishaisani[1],
            ]
        ];

        $Data['attributes'] =  $configData['@attributes'];
        $Data['yesterday'] = $yesterday;
        $Data['today'] = $today;
        $Data['tomorrow'] = $tomorrow;
        $Data['details'] = $namaztimes_details;
        return $Data;
    }


}