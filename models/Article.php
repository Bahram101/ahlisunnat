<?php

namespace app\models;
use Yii;


class Article extends \yii\db\ActiveRecord{

    public static function tableName(){
        return 'article';
    }

    public function getCategory(){
        return $this->hasOne(Category::class, ['id' => 'catalog_id']);
    }


    public function rules(){
        return [
            [['introtext', 'text', 'catalog_id'], 'required'],
            [['introtext', 'text'], 'string'],
            [['catalog_id', 'hits', 'on_main_page'], 'integer'],
            [['created', 'modified'], 'safe'],
            [['title'], 'string', 'max' => 255],
        ];
    }


    public function attributeLabels(){
        return [
            'id' => 'ID',
            'title' => 'Title',
            'introtext' => 'Introtext',
            'text' => 'Text',
            'catalog_id' => 'Catalog ID',
            'created' => 'Created',
            'modified' => 'Modified',
            'hits' => 'Hits',
            'on_main_page' => 'On Main Page',
        ];
    }

    public static function articlesForMainPage($limit = 3){
        return Article::find()->where(['on_main_page'=>1])->with('category')->orderBy('modified desc')->limit($limit)->asArray()->all();
    }


}
