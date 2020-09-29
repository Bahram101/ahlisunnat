<?php


namespace app\controllers;


use app\models\Quran;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class QuranController extends Controller{

    public function actionIndex(){
        Yii::$app->view->title = 'Қуръони карим';
        $allSuraByMushaf = Quran::selectByMushaf();
        $allSuraByAlphabet = Quran::selectByAlphabet();
        ksort($allSuraByAlphabet);
        array_shift($allSuraByAlphabet);
        $allSuraByAlphabet = array_slice($allSuraByAlphabet, 0, 18, true) + array("Ёсин" => 439) + array_slice($allSuraByAlphabet, 18, count($allSuraByAlphabet) - 1, true);

        return $this->render('index', compact('allSuraByMushaf','allSuraByAlphabet'));
    }

    public function actionDownload($id){

        $suraId = (int)$id;
        if(strlen($suraId) == 1){
            $sura = '00'.$suraId;
        }elseif(strlen($suraId) == 2){
            $sura = '0'.$suraId;
        }else{
            $sura = $suraId;
        }

        $storagePath = Yii::getAlias('@app/web/images/quran/audio');
        $filename = $sura.'.mp3';
//        $sura_name = Quran::selectById($suraId);
        if(file_exists("$storagePath/$filename")){
            return Yii::$app->response->sendFile("$storagePath/$filename", $filename);
        }else{
            throw new NotFoundHttpException('Такого файла не существует ');
        }

    }


    public function actionView($id){
        $currentSura = Quran::selectById($id);
//        debug($currentSura);die;
        return $this->render('view', compact('id', 'currentSura'));
    }

    public function actionAjax(){
        $currentSura = Quran::selectById($_POST['quranId']);
        return $currentSura;
    }



}