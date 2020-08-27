<?php
/**
 * Created by PhpStorm.
 * User: Bahram
 * Date: 13.11.2019
 * Time: 16:35
 */

namespace app\controllers;
use yii\web\Controller;
use app\models\Suradua;

class SuraduaController extends Controller{


    public function actionIndex(){
        $suraDua = Suradua::find()->asArray()->all();

        return $this->render('index', compact('suraDua'));
    }


    public function actionView($id){
        $suraDua = Suradua::find()->where(['id'=>$id])->asArray()->all();

        return $this->render('view', compact('suraDua'));
    }


}