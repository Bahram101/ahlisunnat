<?php

use yii\helpers\Html;
use yii\helpers\Url;


    $activationUrl = Url::to(['/site/activate', 'subscriberId'=>$subscriber->id, 'subscriberToken'=> $subscriber->token], true);
    echo "Салом $subscriber->email! Ahlisunnat.com сайтига хуш келибсиз!\n, Қуйидаги линкни босиб, e-mail почтангизни тасдиқланг! \n".
        Html::a('http://ahlisunnat/site/activate/?subscriberId='.$subscriber->id."&subscriberToken=".$subscriber->token, $activationUrl);

