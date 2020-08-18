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
                                        <a href="#">Главная </a>
                                    </span>
                                    <span>
                                        <a href="">asdf</a>
                                    </span>
                                </span>
                                <div class="entry-title text-center" >
                                    <h2><a  style="text-transform: none"><?= $suraDua[0]['title']?></a></h2>
                                </div>

                                <br>
                                <div>
                                    <audio controls style="width:100%">
                                        <source src="/upload/suradua/audio/<?= $suraDua[0]['id']?>.mp3" type="audio/mpeg">
                                    </audio>
                                </div>

                                <br>

                                <div >
                                    <img src="/upload/suradua/img/<?= $suraDua[0]['id']?>.jpg" alt="" style="border:3px solid #1abc9c; display:flex; margin:15px auto">
                                </div>


                                <div class="entry-content">
                                    <p style="text-align: justify; margin-bottom: 20px;">Ўқилиши: <?= $suraDua[0]['text']?></p>
                                </div>
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