<?php
/**
 * Created by PhpStorm.
 * User: Bahram
 * Date: 13.07.2020
 * Time: 16:45
 */

namespace app\widgets;

use app\models\Mailer;
use app\models\Subscribers;
use Yii;
use yii\base\Widget;

class Subscribe extends Widget
{

    public function run(){
        $subscriber = new Subscribers();
        if ($subscriber->load(Yii::$app->request->post()) && $subscriber->addSubscriber() && Mailer::send(Mailer::TYPE_SUBSCRIPTION, $subscriber)) {
            Yii::$app->session->setFlash('success', 'Электрон манзилингизни тасдиқланг!');
        }

        return $this->render('subscribe', [
            'subscriber' =>$subscriber
        ]);
    }

}