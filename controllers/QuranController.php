<?php


namespace app\controllers;


use app\models\Quran;
use Yii;
use yii\web\Controller;

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

}