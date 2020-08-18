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


    <div class="widget widget_links clearfix">
        <div class="sbody" align="center">
            <a href="https://s04.flagcounter.com/more/KOe">
                <img src="https://s04.flagcounter.com/count/KOe/bg_ffffff/txt_080808/border_ffffff/columns_2/maxflags_30/viewers_3/labels_0/pageviews_1/flags_0/" alt="free counters" border="0"></a>
        </div>
        <div class="s_shadow"></div>
        <!-- HotLog -->
        <div class="text-center pt-4" style="margin-top:15px;">
            <span id="hotlog_counter"></span>
            <span id="hotlog_dyn"></span>
            <script type="text/javascript"> var hot_s = document.createElement('script');
                hot_s.type = 'text/javascript'; hot_s.async = true;
                hot_s.src = 'http://js.hotlog.ru/dcounter/2585088.js';
                hot_d = document.getElementById('hotlog_dyn');
                hot_d.appendChild(hot_s);
            </script>
            <noscript>
                <a href="http://click.hotlog.ru/?2585088" target="_blank">
                    <img src="http://hit5.hotlog.ru/cgi-bin/hotlog/count?s=2585088&im=307" border="0"
                         title="HotLog" alt="HotLog"></a>
            </noscript>
        </div>

        <!-- /HotLog -->
    </div>

<!--    <?/* echo Subscribe::widget()*/?>

    --><?/* echo Tags::widget()*/?>

</div>