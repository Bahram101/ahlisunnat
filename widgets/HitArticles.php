<?php
/**
 * Created by PhpStorm.
 * User: Bahram
 * Date: 13.07.2020
 * Time: 12:52
 */

namespace app\widgets;

use app\models\Article;
use yii\base\Widget;

class HitArticles extends Widget{

    public function run(){
        $hitArticles = Article::getHitArticles();

        return $this->render('hitarticles',[
            'hitArticles' =>$hitArticles
        ]);
    }

}