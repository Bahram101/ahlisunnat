<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search.."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
//                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Статьи', 'icon' => 'file-code-o', 'url' => ['article/index']],
                    ['label' => 'Категории', 'icon' => 'dashboard', 'url' => ['category/index']],
                    ['label' => 'Вопросы', 'icon' => 'dashboard', 'url' => ['questions/index']],
                    ['label' => 'Книги', 'icon' => 'dashboard', 'url' => ['books/index']],
                    ['label' => 'Просмотры', 'icon' => 'dashboard', 'url' => ['counter/index']],
//                    ['label' => 'Теги', 'icon' => 'dashboard', 'url' => ['tag/index']],
//                    [
//                        'label' => 'Рассылки',
//                        'icon' => 'share',
//                        'url' => '#',
//                        'items' => [
//                            ['label' => 'Создать рассылку', 'icon' => 'file-code-o', 'url' => ['newsletters/index'],],
//                            ['label' => 'Отправить рассылку', 'icon' => 'dashboard', 'url' => ['sendnewsletter/index'],],
//                            /*[
//                                'label' => 'Level One',
//                                'icon' => 'circle-o',
//                                'url' => '#',
//                                'items' => [
//                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
//                                    [
//                                        'label' => 'Level Two',
//                                        'icon' => 'circle-o',
//                                        'url' => '#',
//                                        'items' => [
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                        ],
//                                    ],
//                                ],
//                            ],*/
//                        ],
//                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
