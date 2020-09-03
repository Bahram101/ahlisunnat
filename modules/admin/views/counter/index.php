<?php

use app\modules\admin\models\Article;
use app\modules\admin\models\Counter;
use yii\helpers\Html;
use yii\grid\GridView;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\CounterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Counters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="counter-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create Counter', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'article_id',
                'value' =>function($data){
                    return $data->article->title;
                },
                'filter' =>function($data){
                    return Article::getArticleTitle($searchModel->attributes['article_id']);
                },
            ],
            [
                'attribute' => 'created',
                'value' =>function($data){
                    return $data->RDate($data->created);
                },
                'filter' =>   DatePicker::widget([
                    'name' => 'CounterSearch[created]',
                    'value' => Counter::RDate($searchModel->attributes['created'] ),
                    'language' => 'ru',
                    'pluginOptions' => [
                        'format' => 'yyyym',
                        'minViewMode' => 'months',
                    ],
                    'convertFormat' => false,
                ]),
                'format' => 'html'
            ],
            'hit',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => ''
            ],
        ],
    ]); ?>


</div>
