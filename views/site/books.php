<?php

/* @var $this yii\web\View */

use app\widgets\HitArticles;
use app\widgets\Subscribe;
use app\widgets\Tags;
use yii\helpers\Html;


$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main">
    <div id="content">
        <div class="site-books container">
            <div class="row">
                <div class="col-md-9 posts-archive">
                    <article class="post cause-item">
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <a href="single-cause.html"> <img src="/images/paygambar.jpg" alt="" class="img-thumbnail"></a>
                                <a href="#" class="btn btn-primary btn-block donate-paypal" data-toggle="modal"
                                   data-target="#PaymentModal" style="font-size: 16px">Юклаш</a>
                            </div>
                            <div class="col-md-8 col-sm-8 ">
                                <h3 style="font-size: 23px;"><a href="single-cause.html">Ҳазрати Муҳаммад (алайҳиссалом) ҳаёти</a></h3>
                                <hr>
                                <!--<div class="progress">
                                    <div class="progress-bar progress-bar-success" data-appear-progress-animation="80%"
                                         data-appear-animation-delay="200"></div>
                                    Upto 30% use class progress-bar-danger , upto 70% use class progress-bar-warning , afterwards use class progress-bar-success
                                </div>-->
                                <p>Икки жаҳон қуёши - Муҳаммад (алайҳиссалом), Аллоҳу таолонинг ҳабиби, севгилиси, яратилган бутун инсоният ва махлуқотнинг ҳар тарафлама энг юксаги, энг чиройлиси, гўзали ва шарафлисидирлар. Ул зот, Аллоҳу таолонинг ўзи мадҳ этган, жамики инсониятга ва жинларга пайғамбар қилиб танлаган, сўнгги ва энг юксак пайғамбаридир. Икки жаҳон қуёши - Муҳаммад (алайҳиссалом), Аллоҳу таолонинг ҳабиби, севгилиси, яратилган бутун инсоният ва махлуқотнинг ҳар тарафлама энг юксаги, энг чиройлиси, гўзали ва шарафлисидирлар. Ул зот, Аллоҳу таолонинг ўзи мадҳ этган, жамики инсониятга ва жинларга пайғамбар қилиб танлаган, сўнгги ва энг юксак пайғамбаридир.</p>

                            </div>
                        </div>
                    </article>
                </div>
                <? echo $this->render('/partials/sidebar.php')?>
            </div>

        </div>
    </div>
</div>


