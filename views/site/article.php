<?

use app\widgets\HitArticles;
use app\widgets\Subscribe;
use app\widgets\Tags;
use yii\helpers\Html;

?>
<div class="main" role="main">
    <div id="content" class="content full">
        <div class="container">
            <div class="row ">
                <div class="col-md-9 posts-archive">
                    <div class="widget sidebar-widget search-form-widget hidden-lg hidden-md">
                        <div class="input-group input-group-lg">
                            <input type="text" class="form-control" placeholder="Search Posts...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="fa fa-search fa-lg"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                    <article class="post ">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <h4>
                                    <a href="/article/<?= Html::encode($article['id']) ?>"><?= Html::encode($article['title']) ?></a>
                                </h4>
                                <span class="post-meta meta-data">
                                    <span><i class="fa fa-archive"></i> <a
                                                href="#"><?= $article['category']['title'] ?></a></span>
                                    <span><i class="fa fa-calendar"></i> <?= $article['created'] ?></span>
                                </span>
                                <p class="justify-content" style="text-align: justify"><?= $article['fulltext'] ?></p>

                                <div class="widget sidebar-widget tags" style="margin-bottom:0">
                                    <div class="tag-cloud">
                                        <? if($article['tags']):?>
                                        <?foreach($article['tags'] as $tag):?>
                                            <a href="/tag/article?tag=<?=$tag['title']?>"><?=$tag['title']?></a>
                                        <? endforeach;?>
                                        <? endif;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>


                </div>
                <!-- Start Sidebar -->
                <div class="col-md-3 sidebar">
                    <div class="widget sidebar-widget search-form-widget hidden-sm hidden-xs ">
                        <div class="input-group input-group-lg">
                            <input type="text" class="form-control" placeholder="Search Posts...">
                            <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search fa-lg"></i>
                                    </button>
                                </span>
                        </div>
                    </div>

                    <?=HitArticles::widget()?>

                    <?=Subscribe::widget()?>

                    <?=Tags::widget()?>
                </div>
            </div>
        </div>
    </div>
</div>