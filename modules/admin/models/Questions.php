<?php

namespace app\modules\admin\models;
use Yii;


class Questions extends \yii\db\ActiveRecord{

    public static function tableName(){
        return 'questions';
    }


    public function rules(){
        return [
            [['content', 'name', 'email'], 'required'],
            [['content'], 'string'],
            [['name'], 'string', 'max' => 500],
            [['email'], 'string', 'max' => 100],
        ];
    }


    public function attributeLabels(){
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'content' => 'Content',
        ];
    }
}
