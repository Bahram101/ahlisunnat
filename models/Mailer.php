<?php

namespace app\models;

use Yii;

class Mailer {

    const TYPE_SUBSCRIPTION = 1;
    const TYPE_PASSWORD_RESET = 4;
    const TYPE_SENDING_QUESTION = 5;
    const TYPE_SENDING_ANSWER = 6;
    const TYPE_NEWSLETTER_ALLAH = 34;
    const TYPE_NEWSLETTER_ISLAM = 35;

    private static $from = ['bahram101@mail.ru'=>'Ahlisunnat'];
    private static $to;
    private static $subject;
    private static $renderFile;
    private static $renderParams = [];

    public static function validate($type, $model, $newsletter = false){
        switch ($type){
            case self::TYPE_NEWSLETTER_ALLAH:
                self::$to = [$model];
                self::$subject = 'Савол';
                self::$renderFile = 'newsletter_allah';
                self::$renderParams = ['newsletter' => $newsletter];
                break;

            case self::TYPE_NEWSLETTER_ISLAM:
                self::$to = [$model];
                self::$subject = 'Савол';
                self::$renderFile = 'newsletter_islam';
                self::$renderParams =['newsletter' => $newsletter];
                break;

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
        return $message->setFrom(self::$from)
                        ->setTo(self::$to)
                        ->setSubject(self::$subject)
                        ->send();
    }


    public static function multipleSend($template, $emails, $newsletter){
        if(!self::validate($template, $emails, $newsletter)){
            return false;
        }
        foreach(self::$to as $email){
            $message = \Yii::$app->mailer->compose(self::$renderFile, self::$renderParams);
            return $message->setFrom(self::$from)
                ->setTo($email)
                ->setSubject(self::$subject)
                ->send();
        }
    }




}