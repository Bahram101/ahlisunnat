<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\AddToPost;
use app\modules\admin\models\DownloadJob;
use Yii;
use yii\web\Controller;


class DefaultController extends Controller{

    public function actionNewpost(){

        if(Yii::$app->queue->push(new DownloadJob([
            'url' => 'https://akparat.com/upload/global/hususi-ikram-hurma--1588806740.jpg',
            'file' => '/images/hurma.jpg',
        ]))){
            echo "OK";
        }else{
            echo "NO";
        }
    }


}
