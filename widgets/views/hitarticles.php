
<div class="widget sidebar-widget">
    <div class="sidebar-widget-title">
        <h3>Кўп ўқилганлар</h3>
    </div>
    <ul class="hits">
        <?  foreach($hitArticles as $article): ?>
            <li><a href="/article/<?=$article['id']?>"><?=$article['title'] ?></a></li>
        <? endforeach; ?>
    </ul>
</div>

