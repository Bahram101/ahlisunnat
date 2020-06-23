<?

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<div class="main" role="main">
    <div id="content" class="content full" >
        <div class="container">
            <div class="row ">
                <div class="col-md-9 posts-archive" >
                    <div class="widget sidebar-widget search-form-widget hidden-lg hidden-md">
                        <div class="input-group input-group-lg">
                            <input type="text" class="form-control" placeholder="Search Posts...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="fa fa-search fa-lg"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                    <? if(isset($articlesForMainPage)):?>
                        <? foreach ($articlesForMainPage as $article):?>
                        <article class="post ">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <h4><a href="/article/<?=Html::encode($article['id'])?>"><?= Html::encode($article['title'])?></a></h4>
                                    <span class="post-meta meta-data">
                                        <span><i class="fa fa-archive"></i> <a href="#"><?=$article['category']['title']?></a></span>
                                        <span><i class="fa fa-calendar"></i> <?= $article['created']?></span>

                                        <!--<span><a href="#"><i class="fa fa-comment"></i> 12</a></span>-->
                                    </span>
                                    <p class="justify-content" style="text-align: justify"><?= $article['introtext']?></p>

                                    <p style="float:right"><a href="#" class="btn btn-primary batafsil">Батафсил <i class="fa fa-long-arrow-right"></i></a></p>
                                </div>
                            </div>
                        </article>
                        <? endforeach ?>
                    <? endif ?>

                    <? foreach ($articles as $article):?>
                    <article class="post ">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <h4><a href="/article/<?=Html::encode($article['id'])?>"><?= Html::encode($article['title'])?></a></h4>
                                <span class="post-meta meta-data">
                                    <span><i class="fa fa-archive"></i> <a href="#"><?=$article['category']['title']?></a></span>
                                    <span><i class="fa fa-calendar"></i> <?= $article['created']?></span>

<!--                                    <span><a href="#"><i class="fa fa-comment"></i> 12</a></span>-->
                                </span>
                                <p class="justify-content" style="text-align: justify"><?= $article['introtext']?></p>

                                <p style="float:right"><a href="#" class="btn btn-primary batafsil">Батафсил <i class="fa fa-long-arrow-right"></i></a></p>
                            </div>
                        </div>
                    </article>
                    <? endforeach?>

                    <?=
                        LinkPager::widget([
                            'pagination' => $pages
                        ])
                    ?>
                </div>
                <!-- Start Sidebar -->
                <div class="col-md-3 sidebar" >
                    <div class="widget sidebar-widget search-form-widget hidden-sm hidden-xs ">
                        <div class="input-group input-group-lg">
                            <input type="text" class="form-control" placeholder="Search Posts...">
                            <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" >
                                        <i class="fa fa-search fa-lg" ></i>
                                    </button>
                                </span>
                        </div>
                    </div>
                    <div class="widget sidebar-widget">
                        <div class="sidebar-widget-title">
                            <h3>Бу ойда кўп ўқилганлар</h3>
                        </div>
                        <ul>
                            <li><a href="#">Faith</a> (10)</li>
                            <li><a href="#">Missions</a> (12)</li>
                            <li><a href="#">Salvation</a> (34)</li>
                            <li><a href="#">Worship</a> (14)</li>
                        </ul>
                    </div>
                    <div class="widget sidebar-widget subscribe">
                        <div class="sidebar-widget-title">
                            <h3>Аъзо бўлиш</h3>
                        </div>
                        <? if(Yii::$app->session->hasFlash('success')):?>
                            <div class="alert alert-success alert-dismissable" style="padding-top:10px;padding-bottom: 10px;">
                                <?php echo Yii::$app->session->getFlash('success'); ?>
                            </div>
                        <? endif;?>

                        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                        <?= $form->field($subscriber, 'email')->textInput(['autofocus' => true, 'class'=>'form-control subInput']) ?>

                        <div class="form-group">
                            <?= Html::submitButton('OK', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

                        <!--<div class="input-group input-group-lg">
                            <input type="text" class="form-control subInput" placeholder="Email...">
                            <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" >
                                         OK
                                    </button>
                                </span>
                        </div>-->

                    </div>
                    <div class="widget sidebar-widget tags">
                        <div class="sidebar-widget-title">
                            <h3>Теглар</h3>
                        </div>
                        <div class="tag-cloud">
                            <a href="#">Faith</a> <a href="#">Heart</a> <a href="#">Love</a> <a href="#">Praise</a> <a href="#">Sin</a> <a href="#">Soul</a> <a href="#">Missions</a> <a href="#">Worship</a> <a href="#">Faith</a> <a href="#">Heart</a> <a href="#">Love</a> <a href="#">Praise</a> <a href="#">Sin</a> <a href="#">Soul</a> <a href="#">Missions</a> <a href="#">Worship</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>