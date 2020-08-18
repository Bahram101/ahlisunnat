<?php

namespace app\controllers;
use yii\web\Controller;

class QiblaController extends Controller{

    public function actionIndex(){

        return $this->render('index');
    }

}