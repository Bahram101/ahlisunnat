<?php

/* @var $this yii\web\View */

use app\widgets\HitArticles;
use app\widgets\Subscribe;
use app\widgets\Tags;
use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main">
    <div id="content">
        <div class="site-about container">
            <div class="row">
                <div class="col-md-9 posts-archive">
                    <h3 class="text-center mainColor">Ислом дини ҳақида аҳли суннат эътиқоди (тўрт мазҳаб) бўйича маълумот берадиган сунний сайтлар:</h3>
                    <hr>
                    <p>Инглиз тилидаги сайт - WWW.MYRELIGIONISLAM.COM</p>
                    <p>Турк тилидаги сайт - WWW.DINIMIZISLAM.COM</p>
                    <p>Рус тилидаги сайт - WWW.VERAISLAM.RU</p>
                    <p>Намоз вақтлари сайти - WWW.NAMAZTIMES.KZ</p>
                    <p>Намоз вақтлари сайти - WWW.NAMAZTIMES.COM</p>
                    <p>Қозоқ тилидаги сайт - WWW.ISLAMDINI.KZ</p>
                    <p>Қозоқ тилидаги сайт - WWW.AHLISUNNET.KZ</p>
                    <p>Қирғиз тилидаги сайт - WWW.ISLAMDINI.KG</p>
                </div>
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
                    <? echo HitArticles::widget()?>

                    <? echo Subscribe::widget()?>

                    <? echo Tags::widget()?>
                </div>
            </div>

        </div>
    </div>
</div>


