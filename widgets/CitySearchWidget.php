<?php
/**
 * Created by PhpStorm.
 * User: Nurbol
 * Date: 29.08.2018
 * Time: 12:05
 */

namespace app\widgets;

use yii\base\Widget;

class CitySearchWidget extends Widget{
    //public $model;

    public function run(){
        //$model = $this->model ?? new Cities();
        return $this->render('citysearch');
        //return $this->render('subscribe');
        //return '<h2>Hello!</h2>';
    }
}