<?php
$request = Yii::$app->request;
$dwn_year = $request->get('dwn_year', date("Y"));
$dwn_month = $request->get('dwn_month', date("n"));
?><div class="admin-default-index">
    <div class="col-sm-12">

        <ul class="nav nav-pills">
            <li class="active"><a data-toggle="pill" href="#downloads" >Скачивания</a></li>
            <li><a data-toggle="pill" href="#counter">Просмотры</a></li>

        </ul>

        <div class="row">
            <form method="post" action="">
                <?//print_r ($_GET)?>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="sel1">Выбрать год:</label>
                        <select name="dwn_year" class="form-control" id="sel1">
                            <?
                            $o = 2018;
                            if(!$_POST['dwn_year']){
                                $dwn_year = date("Y");
                            }else{
                                $dwn_year = $_POST['dwn_year'];
                            }
                            //$o = date("Y");
                            while ($o <= date("Y")) {
                                if($dwn_year==$o){
                                    echo '<option value="'.$o.'" selected>'.$o.'</option>';
                                }else{
                                    echo '<option value="'.$o.'">'.$o.'</option>';
                                }
                                $o++;
                            }
                            ?>

                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="sel1">Выбрать месяц:</label>
                        <select name="dwn_month"class="form-control" id="sel1">
                            <?
                            $monthes =[
                                1 => 'Январь',
                                2 => 'Февраль',
                                3 => 'Март',
                                4 => 'Апрель',
                                5 => 'Май',
                                6 => 'Июнь',
                                7 => 'Июль',
                                8 => 'Август',
                                9 => 'Сентябрь',
                                10 => 'Октябрь',
                                11 => 'Ноябрь',
                                12 => 'Декабрь',
                            ];

                            $i = 1;
                            if(!$_POST['dwn_month']){
                                $dwn_month = date("n");
                            }else{
                                $dwn_month = $_POST['dwn_month'];
                            }
                            while ($i <= 12) {
                                if($dwn_month==$i){
                                    echo '<option value="'.$i.'" selected>'.$monthes[$i].'</option>';
                                }else{
                                    echo '<option value="'.$i.'">'.$monthes[$i].'</option>';
                                }
                                $i++;
                            }

                            ?>

                        </select>

                        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <br>
                        <button type="submit" class="btn btn-success">Ok</button>
                    </div>
                </div>

            </form>
        </div>

        <div class="tab-content">
            <div id="downloads" class="tab-pane fade in active">

                <h3><strong>Скачивания книг</strong> за месяц - <?=$monthes[$dwn_month]?></h3>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Название книги</th>
                            <th>Скачивания</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?foreach ($downloads as $download){?>
                            <tr>
                                <td><?=$download['name']?></td>
                                <td><?=$download['count']?></td>
                            </tr>
                        <?}?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="counter" class="tab-pane fade">
                <h3><strong>Просмотр страниц сайта</strong> за месяц - <?=$monthes[$dwn_month]?></h3>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID статьи</th>
                            <th>Название статьи</th>
                            <th>Просмотры</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?/*foreach ($counters as $counter){*/?><!--
                            <tr>
                                <td><a href="/admin/article/view?id=<?/*=$counter['article_id']*/?>" target="_blank"><?/*=$counter['article_id']*/?></a></td>
                                <td><a href="/admin/article/view?id=<?/*=$counter['article_id']*/?>" target="_blank"><?/*=$counter['article_name']*/?></a></td>
                                <td><?/*=$counter['count']*/?></td>
                            </tr>
                        --><?/*}*/?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
