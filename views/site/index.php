<?

use app\widgets\HitArticles;
use app\widgets\Subscribe;
use app\widgets\Tags;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\widgets\LinkPager;

?>


<div class="main" role="main">
    <div id="content" class="content full">
        <div class="container">
            <div class="row ">
                <div class="col-md-9 posts-archive">
                    <div class="widget sidebar-widget search-form-widget hidden-lg hidden-md">
                        <div class="input-group input-group-lg">
                            <input type="text" class="form-control" placeholder="Қидиринг...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="fa fa-search fa-lg" style="vertical-align: 0px;"></i>
                                </button>
                            </span>
                        </div>
                    </div>

                    <? if (isset($articlesForMainPage)): ?>
                        <? foreach ($articlesForMainPage as $article): ?>
                            <article class="post ">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <h4>
                                            <a href="/article/<?= Html::encode($article['id']) ?>"><?= Html::encode($article['title']) ?></a>
                                        </h4>
                                        <span class="post-meta meta-data">
                                        <span><i class="fa fa-archive"></i> <a href="/category/<?=$article['category']['id']?>"><?= $article['category']['title'] ?></a></span>
<!--                                        <span><i class="fa fa-calendar"></i> --><?//= $article['created'] ?><!--</span>-->
                                        <span><i class="fa fa-eye"></i> <?= $article['views'] ?></span>
                                    </span>
                                        <p class="justify-content"
                                           style="text-align: justify"><?= $article['introtext'] ?></p>
                                        <p style="float:right"><a href="/article/<?=$article['id']?>" class="btn btn-primary batafsil">Батафсил <i class="fa fa-long-arrow-right"></i></a></p>
                                    </div>
                                </div>
                            </article>
                        <? endforeach ?>
                    <? endif ?>

                    <? foreach ($articles as $article): ?>
                        <article class="post ">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <h4>
                                        <a href="/article/<?= Html::encode($article['id']) ?>"><?= Html::encode($article['title']) ?></a>
                                    </h4>
                                    <span class="post-meta meta-data">
                                        <span><i class="fa fa-archive"></i> <a href="/category/<?=$article['category']['id']?>"><?= $article['category']['title'] ?></a></span>
<!--                                        <span><i class="fa fa-calendar"></i> --><?//= $article['created'] ?><!--</span>-->
                                        <span><i class="fa fa-eye"></i> <?= $article['views'] ?></span>
                                    </span>
                                    <p class="justify-content"
                                       style="text-align: justify"><?= $article['introtext'] ?></p>
                                    <p style="float:right"><a href="/article/<?=$article['id']?>" class="btn btn-primary batafsil">Батафсил <i class="fa fa-long-arrow-right"></i></a></p>
                                </div>
                            </div>
                        </article>
                    <? endforeach ?>

                    <?=
                    LinkPager::widget([
                        'pagination' => $pages
                    ])
                    ?>
                </div>
                <!-- Start Sidebar -->
                <? echo $this->render('/partials/sidebar.php')?>

            </div>
        </div>
    </div>
</div>