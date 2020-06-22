<?

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
                            <h4 class="text-center" style="color:#142C4C;font-weight: bold">Мусхоф тартибида</h4>
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
                        <div class="input-group input-group-lg">
                            <input type="text" class="form-control subInput" placeholder="Email...">
                            <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                         OK
                                    </button>
                                </span>
                        </div>

                    </div>
                    <div class="widget sidebar-widget tags">
                        <div class="sidebar-widget-title">
                            <h3>Теглар</h3>
                        </div>
                        <div class="tag-cloud">
                            <a href="#">Faith</a> <a href="#">Heart</a> <a href="#">Love</a> <a href="#">Praise</a> <a
                                href="#">Sin</a> <a href="#">Soul</a> <a href="#">Missions</a> <a
                                href="#">Worship</a> <a href="#">Faith</a> <a href="#">Heart</a> <a
                                href="#">Love</a> <a href="#">Praise</a> <a href="#">Sin</a> <a href="#">Soul</a> <a
                                href="#">Missions</a> <a href="#">Worship</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>