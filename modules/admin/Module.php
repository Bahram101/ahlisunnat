<?php

namespace app\modules\admin;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
class Module extends \yii\base\Module{


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
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        //'actions' => ['special-callback'],
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            return !Yii::$app->user->isGuest;
                        }
                    ],
                ],
            ]

        ];
    }

    public function init(){
        parent::init();
        // custom initialization code goes here
    }
}
