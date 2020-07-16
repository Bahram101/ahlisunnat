<?php

namespace app\widgets;

use app\models\Tag;
use yii\base\Widget;

class Tags extends Widget{

    public function run(){
        $tags = Tag::getTags();
        return $this->render('tags',compact('tags'));
    }

}