<div class="widget sidebar-widget tags">
    <div class="sidebar-widget-title">
        <h3>Теглар</h3>
    </div>
    <div class="tag-cloud">
        <?foreach($tags as $tag):?>
        <a href="/tag/article?tag=<?=$tag['title']?>"><?=$tag['title']?></a>
        <? endforeach;?>
    </div>
</div>