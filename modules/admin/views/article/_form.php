<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'introtext')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'catalog_id')->textInput() ?>

<!--    --><?//= $form->field($model, 'created')->textInput() ?>

<!--    --><?//= $form->field($model, 'modified')->textInput() ?>

<!--    --><?//= $form->field($model, 'hits')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'on_main_page')->dropDownList(['1'=>'Да', '0'=>'Нет']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
