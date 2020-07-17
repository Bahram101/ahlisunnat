<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Article', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
//            'introtext:ntext',
//            'text:ntext',
//            'catalog_id',
            [
                'format'=>'text',
                'attribute'=> 'catalog_id',
                'value'=> function($data){
                    return $data->category->title;
                },
            ],
            'created',
            //'modified',
            'hits',
            //'on_main_page',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
