<?php

namespace app\models;
use Yii;
use yii\data\Pagination;


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

    public static function getLatestArticles($pageSize = 5){
        $query = Article::find();
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => $pageSize,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $articles = $query->offset($pages->offset)->limit($pages->limit)->orderBy(['id' => SORT_DESC])->asArray()->with('category')->all();
        $datas = ['pages' => $pages, 'articles'=>$articles];

        return  $datas;
    }

    public static function getArticle($id){
        $id = (int)$id;
        $article = Article::find()->where(['id'=>$id])->asArray()->one();
        return $article;
    }

    public static function getArticlesByCategory($id){
        $id = (int)$id;
        $query = Article::find()->where(['catalog_id'=>$id]);
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 10,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $articles = $query->offset($pages->offset)->limit($pages->limit)->orderBy(['id' => SORT_DESC])->asArray()->with('category')->all();
        $datas = ['pages' => $pages, 'articles'=>$articles];

        return $datas;
    }


}
