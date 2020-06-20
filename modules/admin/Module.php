<?php

namespace app\modules\admin;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
class Module extends \yii\base\Module{

//    public $layout = '/admin';

    public $controllerNamespace = 'app\modules\admin\controllers';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],

        ];
    }

    public function init(){
        parent::init();
        // custom initialization code goes here
    }
}
