<?php
/**
 * Created by PhpStorm.
 * User: Bahram
 * Date: 20.06.2020
 * Time: 17:14
 */

namespace app\controllers;


use app\models\Quran;
use yii\web\Controller;

class QuranController extends Controller{

    public function actionIndex(){
        $allSuraByMushaf = Quran::selectByMushaf();
        $allSuraByAlphabet = Quran::selectByAlphabet();
        ksort($allSuraByAlphabet);
        array_shift($allSuraByAlphabet);
        $allSuraByAlphabet = array_slice($allSuraByAlphabet, 0, 18, true) + array("Ёсин" => 439) + array_slice($allSuraByAlphabet, 18, count($allSuraByAlphabet) - 1, true);

        return $this->render('index', compact('allSuraByMushaf','allSuraByAlphabet'));
    }

}