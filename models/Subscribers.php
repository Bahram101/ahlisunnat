<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subscribers".
 *
 * @property int $id
 * @property string $email
 * @property string|null $token
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Subscribers extends \yii\db\ActiveRecord{

    const STATUS_ACTIVE = 1;

    public static function tableName(){
        return 'subscribers';
    }


    public function rules(){
        return [
            [['email'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['email'], 'email'],
            [['email'], 'unique'],
            [['email', 'token'], 'string', 'max' => 255],
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


    public function activate(){
        $this->status = self::STATUS_ACTIVE;
        $this->token = null;
        return $this->save();
    }

    public function addSubscriber(){
        if($this->validate()){
            $this->setAttribute('email', $this->email);
            $this->setAttribute('token', Yii::$app->security->generateRandomString(15));
            $this->setAttribute('created_at', date('Y-m-d H:i:s'));
            $this->setAttribute('updated_at', date('Y-m-d H:i:s'));
            $this->save();
            return true;
        }
        return false;
    }
}
