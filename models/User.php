<?php

namespace app\models;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

    private static $users = [
        '1' => [
            'id' => '1',
            'username' => '',
            'password' => '',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ]
    ];


    public static function findIdentity($id){
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }


    public static function findIdentityByAccessToken($token, $type = null){
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }
        return null;
    }


    public static function findByUsername($username){
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }
        return null;
    }


    public function getId(){
        return $this->id;
    }


    public function getAuthKey(){
        return $this->authKey;
    }


    public function validateAuthKey($authKey){
        return $this->authKey === $authKey;
    }


    public function validatePassword($password){
        return $this->password === $password;
    }
}
