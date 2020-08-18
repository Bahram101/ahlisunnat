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
                                <h4>
                                    <a href="">Қибла истиқоматини аниқлаш</a>
                                </h4>

                                <p class="justify-content" style="text-align: justify"><div class="text" >
                                <p>Қуйидаги дастур ёрдами билан ўзингиз турган шаҳарнинг қибла истиқоматини осон аниқлашингиз мумкин. Харитадаги <strong>яшил чизиқ</strong> қибла   йўналишини кўрсатмоқда. Қидирув (loсate) воситасида истаган шаҳар   харитасини очиб, шу шаҳарнинг қибла йўналишини аниқлай оласиз.</p>
                                <p><strong>        (+)</strong> ва <strong>(-)</strong> тугмачаларини босиш орқали хаританинг масштабини каттайтириб,   кичрайтириш мумкин. Сичқонча (Mouse) ёрдами билан харитани хоҳлаган   йўналишда силжитиш имконингиз бор. Харитани хоҳлаган кўчага, ҳатто уйга   ёки иш жойигача масштабини яқинлаштириб, шу маконнинг қибла йўналишини   аниқлаш мумкин. Хаританинг ўнг тараф юқори бурчагидаги бўлимчага ўз   хоҳишингизга кўра <strong> Xarita </strong> ёки <strong>Sputnik (спутник)</strong> хоссаларини ҳам танлаб қўлланиш имконига эгасиз.</p>
                                </br>
                                <p align="center">
                                    <iframe
                                        style="
			BORDER-RIGHT: 0px; text-align:center;
			BORDER-TOP: 0px; BORDER-LEFT: 0px; BORDER-BOTTOM: 0px
			"
                                        src="https://qibla.namaztimes.kz?&lat=41.28333333333333&lon=69.23333333333333&cord=2&language=uz"
                                        scrolling="no" height="700px" width="100%">
                                <p>Your browser does not support iframes.</p>
                                </iframe>

                                </p>
                            </div></p>

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