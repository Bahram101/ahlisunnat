<? use app\widgets\HitArticles;
use app\widgets\Subscribe;
use app\widgets\Tags;?>

<div class="col-md-3 sidebar">
    <div class="widget sidebar-widget search-form-widget hidden-sm hidden-xs ">
        <div class="input-group input-group-lg" style="z-index:0;"
        >
            <input type="text" class="form-control" placeholder="Қидиринг...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">
                    <i class="fa fa-search fa-lg" style="transform: translate(0, -26%);"></i>
                </button>
            </span>
        </div>
    </div>

    <? echo HitArticles::widget()?>

    <div class="widget sidebar-widget">
        <div class="paygambar">
            <div class="sidebar-widget-title">
                <h3>М.Саид Арвос устоз ила</h3>
            </div>
            <div class="img">
                <a href="/category/30"><img src="/images/03.png" alt="Logo"></a>
            </div>
        </div>
    </div>
    <div class="widget sidebar-widget">
        <div class="suradua">
            <div class="sidebar-widget-title">
                <h3>Суралар ва дуолар</h3>
            </div>
            <div class="img">
                <a href="/suradua"><img src="/images/02.png" alt="Logo"></a>
            </div>
        </div>
    </div>
    <div class="widget sidebar-widget">
        <div class="caaba">
            <div class="sidebar-widget-title">
                <h3>Қибла истиқомати</h3>
            </div>
            <div class="img">
                <a href="/qibla"><img src="/images/01.png" alt="Logo"></a>
            </div>
        </div>
    </div>



</div>