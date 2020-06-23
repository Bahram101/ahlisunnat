<?php

namespace app\models;

use Yii;

class Mailer {

    const TYPE_SUBSCRIPTION = 1;
    /*const TYPE_PASSWORD_RESET = 2;
    const TYPE_SENDING_QUESTION = 3;
    const TYPE_SENDING_ANSWER = 4;*/

    private static $renderFile;
    private static $renderParams = [];
    private static $from = ['bahram101@mail.ru'=>'Ahlisunnat'];
    private static $to;
    private static $subject;

    public static function validate($type, $model){
        switch ($type){
            case self::TYPE_SUBSCRIPTION:
                if(empty($model->id) || empty($model->email) || empty($model->token)){
                    return false;
                }
                self::$to = [$model->email];
                self::$subject = 'Электрон манзилингизни тасдиқланг';
                self::$renderFile = 'subscription';
                self::$renderParams = ['subscriber' => $model];
                break;

            case self::TYPE_PASSWORD_RESET:
                break;

            case self::TYPE_SENDING_QUESTION:
                self::$to = [$model];
                self::$subject = 'Савол';
                self::$renderFile = 'question';
                break;

            case self::TYPE_SENDING_ANSWER:
                self::$to = [$model[0]['user']['email']];
                self::$subject = $model[0]['name'].' саволингизнинг жавоби';
                self::$renderFile = 'answer';
                self::$renderParams = ['model' => $model];
                break;

            default:
                return false;
        }
        return true;
    }


    public static function send($type, $model){
        if(!self::validate($type, $model)){
            return false;
        }

        $message = \Yii::$app->mailer->compose(self::$renderFile, self::$renderParams);
        return $message->setFrom(self::$from)->setTo(self::$to)->setSubject(self::$subject)->send();

    }

}