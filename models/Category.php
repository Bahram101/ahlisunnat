<?php

namespace app\models;

use Yii;


class Category extends \yii\db\ActiveRecord{

    public static function tableName(){
        return 'category';
    }

    public function getArticle(){
        return $this->hasMany(Article::class, ['catalog_id' => 'id']);
    }

    public function rules(){
        return [
            [['title', 'parent_id'], 'string', 'max' => 250],
            [['link'], 'string', 'max' => 300],
        ];
    }


    public function attributeLabels(){
        return [
            'id' => 'ID',
            'title' => 'Title',
            'parent_id' => 'Parent ID',
            'link' => 'Link',
        ];
    }


}
