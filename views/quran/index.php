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
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-4">
                            <h4 class="text-center" style="color:#142C4C;font-weight: bold">Мусҳаф тартибида</h4>
                            <table style="margin-right: 0 !important; display: block;">
                                <tr>
                                    <td><h4 style="text-decoration: underline;color:#142C4C;">Сура номи</h4></td>
                                    <td><h4 style="text-decoration: underline;color:#142C4C; text-align: right">Саҳифа рақами</h4></td>
                                </tr>
                                <? foreach($allSuraByMushaf as $suraKey => $suraVal):?>
                                    <tr>
                                        <td><h4><a href="/quran/<?= $suraVal;?>" style="text-decoration: none;color:#142c4c"><?= $suraKey;?></a></h4></td>
                                        <td align="right"><h5><?= $suraVal;?></h5></td>
                                    </tr>
                                <? endforeach; ?>
                            </table>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <h4 class="text-center" style="color:#142C4C;">Алифбо тартибида</h4>
                            <table>
                                <tr>
                                    <td><h4 style="text-decoration: underline;color:#142C4C;">Сура номи</h4></td>
                                    <td><h4 style="text-decoration: underline;color:#142C4C; text-align: right">Саҳифа рақами</h4></td>
                                </tr>
                                <? foreach($allSuraByAlphabet as $key => $val):?>
                                    <tr>
                                        <td><h4><a href="/quran/<?= $val;?>" style="text-decoration: none;color:#142c4c"><?= $key;?></a></h4></td>
                                        <td align="right"><h5><?= $val;?></h5></td>
                                    </tr>
                                <? endforeach; ?>
                            </table>
                        </div>
                        <div class="col-md-1"></div>
                    </div>

                </div>
                <!-- Start Sidebar -->
                <? echo $this->render('/partials/sidebar.php')?>
            </div>
        </div>
    </div>
</div>