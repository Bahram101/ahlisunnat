<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [

    'id' => 'basic',
    'name' => 'Аҳлисуннат',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log','queue'],
//    'language' => 'uz-UZ',
    'language' => 'uz-UZ',
    'sourceLanguage' => 'uz',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],

    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'layout' => 'main',
            'defaultRoute'=> 'article/index',
        ],
    ],
    'components' => [
        'queue' => [
            'class' => \yii\queue\file\Queue::class,
            'as log' => \yii\queue\LogBehavior::class,
            // Индивидуальные настройки драйвера
        ],

        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'cNCIG-bUjaLMfHp1xV-bUlzUXlM-cg1I',
            'baseUrl'=>'',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.mail.ru',
                'username' => 'bahram101@mail.ru',
                'password' => 'gnusmasgnus',
                'port' => '587', //if ssl -> 465
                'encryption' => 'tls', //if -> ssl
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                ''=>'site/index',
                'article/<id:\d+>' => 'site/article',
                'category/<id:\d+>/page/<page:\d+>' => 'site/category',
                'category/<id:\d+>' => 'site/category',
                'quran/<id:\d+>' => 'quran/view',
                'quran/download/<id:\d+>' => 'quran/download',
                'download/<id:\d+>' => 'site/download',
                'suradua' => 'suradua/index',
                'suradua/<id:\d+>' => 'suradua/view',
                '<action>'=>'site/<action>',
            ],
        ],


    ],

    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
        'allowedIPs' => ['*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
        'allowedIPs' => ['*'],
    ];
}

return $config;
