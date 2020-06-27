<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\NewslettersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Newsletters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="newsletters-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Newsletters', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
//            'category_id',
            [
                'format'=>'text',
                'attribute'=> 'category_id',
                'value'=> function($data){
                    return $data->category->title;
                },
            ],
//            'status',
            [
                'attribute'=> 'status',
                'value'=> function ($data)
                {
                    return $data->status ? '<span class="text-success">Отправлено</span>' : '<span class="text-danger">Не отправлено</span>';
                },
                'format'=>'html'
            ],
            'created_at',
//            'content:ntext',


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
