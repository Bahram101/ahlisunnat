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
//            'newsletter_id',
            [
                'format'=>'text',
                'attribute'=> 'newsletter_id',
                'value'=> function($data){
                    return $data->newsletter->title;
                },
            ],
//            'category_id',
            [
                'format'=>'text',
                'attribute'=> 'category_id',
                'value'=> function($data){
                    return $data->newsletter->category->title;
                },
            ],
            'date',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
