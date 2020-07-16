<?php

namespace app\controllers;

use app\models\Article;
use yii\web\Controller;

class TagController extends Controller {

    public function actionArticle($tag){
        $articles = Article::getArticlesByTagName($tag);
        return $this->render('article', compact('articles'));
    }

}