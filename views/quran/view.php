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

                    <article class="post ">
                        <div class="row">

                            <div class="col-md-12 col-sm-12">
                                 <span class="post-meta meta-data">
                                    <span>
                                        <a href="/">Главная / </a>
                                    </span>
                                    <span>
                                        <a href="/quran/">Қурони Карим / </a>
                                    </span>
                                     <span>
                                        <a href=""><?
                                                foreach($currentSura as $sura){
                                                    echo $sura. " ";
                                                }
                                            ?></a>
                                    </span>
                                </span>
                                <div class="entry-title text-center" >
                                    <h2><a  style="text-transform: none"><?= $suraDua[0]['title']?></a></h2>
                                </div>

                                <br>

                                <a class="sura">
                                    <audio controls style="width:100%" class="mb-3">
                                        <source src="/images/quran/audio/<?
                                        if(strlen($id) == 1){
                                            echo "00".$id;
                                        }elseif(strlen($id) == 2){
                                            echo "0".$id;
                                        }else{
                                            echo $id;
                                        }
                                        ?>.mp3" type="audio/mpeg">
                                    </audio>
                                    <br>

                                    <div class="col-lg-12" style="margin-top:10px;display: flex;justify-content: space-around;">
                                        <? if($id > 1):?>
                                            <a href="/quran/<?= $id-1?>" class="btn btn-outline-secondary float-left">&larr; Олдинги бет</a>
                                        <? endif;?>

                                        <? if($id < 604):?>
                                            <a href="/quran/<?= $id+1?>" class="btn btn-outline-dark float-right">Келаси бет &rarr;</a>
                                        <? endif;?>
                                    </div>
                                    <br>
                                    <br>

                                    <a data-fancybox="gallery" href="/images/quran/img/<?
                                    if(strlen($id) == 1){
                                        echo "00".$id;
                                    }elseif(strlen($id) == 2){
                                        echo "0".$id;
                                    }else{
                                        echo $id;
                                    }
                                    ?>.jpg"><img src="/images/quran/img/<?
                                    if(strlen($id) == 1){
                                        echo "00".$id;
                                    }elseif(strlen($id) == 2){
                                        echo "0".$id;
                                    }else{
                                        echo $id;
                                    }
                                    ?>.jpg" alt="<?= $id."jpg"?>" width="80%" style="display: flex;margin:0 auto;" ></a>

                            </div>
                            <div class="col-lg-12" style="margin-top:10px;display: flex;justify-content: space-around;">
                                <? if($id > 1):?>
                                    <a href="/quran/<?= $id-1?>" class="btn btn-outline-secondary float-left">&larr; Олдинги бет</a>
                                <? endif;?>

                                <? if($id < 604):?>
                                    <a href="/quran/<?= $id+1?>" class="btn btn-outline-dark float-right">Келаси бет &rarr;</a>
                                <? endif;?>
                            </div>
                        </div>
                    </article>
                </div>
                <!-- Start Sidebar -->
                <? echo $this->render('/partials/sidebar')?>
            </div>
        </div>

</div>