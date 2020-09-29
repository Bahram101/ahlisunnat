<?php

/* @var $this yii\web\View */

use app\widgets\HitArticles;
use app\widgets\Subscribe;
use app\widgets\Tags;
use yii\helpers\Html;


//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main">
    <div id="content">
        <div class="site-subscribe container">
            <div class="row">
                <div class="col-md-9 posts-archive">
                    <? if (Yii::$app->session->hasFlash('success')): ?>
                        <div class="alert alert-success alert-dismissable"
                             style="padding-top:10px;padding-bottom: 10px;">
                            <?php echo Yii::$app->session->getFlash('success'); ?>
                        </div>
                    <? endif; ?>
                </div>
                <? echo $this->render('/partials/sidebar.php')?>
            </div>

        </div>
    </div>
</div>



