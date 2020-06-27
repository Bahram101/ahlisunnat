<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\SendnewsletterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Send newsletter';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sendnewsletter-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Send newsletter', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'format'=>'text',
                'attribute'=> 'newsletter_id',
                'value'=> function($data){
                    return $data->newsletter->title;
                },
            ],
            [
                'format'=>'text',
                'attribute'=> 'category_id',
                'value'=> function($data){
                    return $data->newsletter->category->title;
                },
            ],
            'date',
            [
                'attribute'=> 'status',
                'value'=> function ($data)
                {
                    return $data->status ? '<span class="text-success">Отправлено</span>' : '<span class="text-danger">Не отправлено</span>';
                },
                'format'=>'html'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
