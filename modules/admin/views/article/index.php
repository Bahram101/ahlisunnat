<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\jui\Autocomplete;


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
            [
                'attribute' => 'project_status',
                'filter' => yii\jui\Autocomplete::widget([
                    'model' => $filterModel,
                    'attribute' => 'project_status',
                    'clientOptions' => [
                        'source' => ['USA', 'RUS'],
                    ],
                ]),
                'value' => 'projectstatus.name'
            ],

//            'introtext:ntext',
//            'text:ntext',
//            'catalog_id',
            [
                'format'=>'text',
                'attribute'=> 'catalog_id',
                'value'=> function($data){
                    return $data->category->title;
                },
                'filter' => Html::activeDropDownList($searchModel, 'catalog_id', \yii\helpers\ArrayHelper::map(\app\modules\admin\models\Category::find()->asArray()->all(), 'id', 'title'),['class'=>'form-control','prompt' => 'Select Category']),
            ],
            'created',
            'hits',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
