<?php

namespace app\controllers;

use app\models\Cities;
use yii\db\Query;
use yii\helpers\ArrayHelper;

class JsonController extends \yii\web\Controller{

    public function beforeAction($action){
        # Указываем формат ответа
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        return parent::beforeAction($action);
    }

    public function actionStates($sid = null) {
        $sid = (int)$sid;
        $lang = \Yii::$app->language;
        $query = "SELECT state_en as id, IF(state_$lang IS NULL or state_$lang = '', state_en, state_$lang) as name from cities WHERE country_id=:sid GROUP BY name";
        $states = \app\models\Cities::findBySql($query,[':sid' => $sid])->asArray()->all();
        $states = \yii\helpers\ArrayHelper::map($states,'id','name');
        return $states;
        //return ArrayHelper::map($states, 'id', 'name');
    }


    public function actionCities($cid = null) {
        //$sid = (int)$sid;
        $lang = \Yii::$app->language;
        $query = "SELECT id, IF(name_$lang IS NULL or name_$lang = '', name_en, name_$lang) as name from cities WHERE state_en =:cid";
        $cities = \app\models\Cities::findBySql($query,[':cid' => $cid])->asArray()->all();
        $cities = \yii\helpers\ArrayHelper::map($cities,'id','name');
        return $cities;
        //return ArrayHelper::map($states, 'id', 'name');
    }


    public function actionCity($q = null, $id = null){
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            /*
                $lang = \Yii::$app->language;
                SELECT user.ss (SELECT concat(user.second_name, user.patronymic, user.first_name) AS ss
                        FROM user) FROM user

            SELECT id, IF(name_kz IS NULL or name_kz = '', name_en, name_kz) as name from cities WHERE name LIKE 'алм'

            WHERE user.ss LIKE 'wwww' AND user.ss = 'dddd'
                $query = "SELECT id, IF(name_$lang IS NULL or name_$lang = '', name_en, name_$lang) as name from cities WHERE state_en =:cid";
                $cities = \app\models\Cities::findBySql($query,[':cid' => $cid])->asArray()->all();
                $states = \yii\helpers\ArrayHelper::map($states,'id','name');
              */
            $lang = \Yii::$app->language;
            $query = new Query();
            $query->select('id, name_uz AS text')
                ->from('cities')
                ->where(['like', 'name_kz', $q])
                ->orWhere(['like', 'name_en', $q])
                ->orWhere(['like', 'name_ru', $q])
                ->orWhere(['like', 'name_uz', $q])
                //->andWhere([['like', 'name_en', $q]])
                ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => Cities::find($id)->text];
        }
        return $out;
    }

    public function actionTimes($id=null){
        $id = $id ? $id : 8408;
        $id = (int)$id;

        $json = file_get_contents(
            'https://namaztimes.kz/api/praytimes?id='.$id.'type=json'
        );
        $json = json_decode($json,true);
        $city = Cities::findOne($id);

        $json['attributes']['CityName'] = $city['name_uz'] ? $city['name_uz'] : $city['name_ru'];

        return $json;
    }



}
