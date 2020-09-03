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
                            <input type="text" class="form-control" placeholder="Қидиринг...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="fa fa-search fa-lg" style="transform: translate(0, -26%);"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                    <article class="post ">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                 <span class="post-meta meta-data">
                                    <span>
                                        <a href="/">Бош саҳифа</a>
                                    </span><span style="margin-right:10px">/</span>
                                     <span>
                                        <a href="/category/<?=$article['category']['id']?>"><?= $article['category']['title'] ?></a>
                                    </span><span style="margin-right:10px">/</span>
                                    <span>
                                        <a href=""><? echo $article['title']?></a>
                                    </span>
                                </span>
                                <h4>
                                    <a href="/article/<?= Html::encode($article['id']) ?>"><?= Html::encode($article['title']) ?></a>
                                </h4>
                                <span class="post-meta meta-data" style="background: none; border-bottom:none;padding:0">
                                    <span><i class="fa fa-archive"></i> <a
                                                href="#"><?= $article['category']['title'] ?></a></span>
<!--                                    <span><i class="fa fa-calendar"></i> --><?//= $article['created'] ?><!--</span>-->
                                    <span><i class="fa fa-eye"></i> <?= $article->hits ?></span>
                                </span>
                                <p class="justify-content" style="text-align: justify"><?= $article['fulltext'] ?></p>

                                <!--<div class="widget sidebar-widget tags" style="margin-bottom:0">
                                    <div class="tag-cloud">
                                        <?/* if($article['tags']):*/?>
                                        <?/*foreach($article['tags'] as $tag):*/?>
                                            <a href="/tag/article?tag=<?/*=$tag['title']*/?>"><?/*=$tag['title']*/?></a>
                                        <?/* endforeach;*/?>
                                        <?/* endif;*/?>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                    </article>


                </div>
                <!-- Start Sidebar -->
                <? echo $this->render('/partials/sidebar')?>
            </div>
        </div>
    </div>
</div>