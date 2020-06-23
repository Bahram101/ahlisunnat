<?php

namespace app\modules\admin\models;
use Yii;


class Subscribers extends \yii\db\ActiveRecord{

    public static function tableName(){
        return 'subscribers';
    }


    public function rules(){
        return [
            [['email'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['email'], 'email'],
            [['token'], 'string', 'max' => 255],
        ];
    }


    public function attributeLabels(){
        return [
            'id' => 'ID',
            'email' => 'Email',
            'token' => 'Token',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
