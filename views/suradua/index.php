<?php



use app\widgets\HitArticles;
use app\widgets\Subscribe;
use app\widgets\Tags;
use yii\helpers\Html;

$this->title = 'Суралар ва Дуолар';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main">
    <div id="content">
        <div class="site-about container">
            <div class="row">
                <div class="col-md-9 posts-archive">
                    <h3 class="text-center mainColor">Суралар ва Дуолар</h3>
                    <hr>
                    <? foreach($suraDua as $item):?>
                        <a href="/suradua/<?=$item['id']?>"><p style="font-size:20px"><? echo $item['title']?></p></a>
                    <? endforeach;?>

                </div>
                <? echo $this->render('/partials/sidebar.php')?>
            </div>

        </div>
    </div>
</div>


