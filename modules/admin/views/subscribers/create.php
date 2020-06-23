<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Subscribers */

$this->title = 'Create Subscribers';
$this->params['breadcrumbs'][] = ['label' => 'Subscribers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subscribers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
