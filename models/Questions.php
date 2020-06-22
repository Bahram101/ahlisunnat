<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "questions".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $content
 */
class Questions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(){
        return 'questions';
    }


    public function rules(){
        return [
            [['content', 'email', 'name'], 'required'],
            [['name'], 'string', 'max' => 500],
            [['created_at'], 'save'],
            [['email'], 'email'],
        ];
    }


    public function attributeLabels(){
        return [
            'id' => 'ID',
            'name' => 'Исм',
            'email' => 'Email',
            'created_at' => 'Дата',
            'content' => 'Савол',
        ];
    }

    public function sendQuestion(){
        if($this->validate()){
            $this->setAttribute('name', $this->name);
            $this->setAttribute('email', $this->email);
            $this->setAttribute('content', $this->content);
            $this->save();
            return true;
        }
        return false;
    }
}
