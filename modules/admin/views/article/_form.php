<?php

use app\modules\admin\models\Category;
use yii\helpers\ArrayHelper;
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

    <?= $form->field($model, 'fulltext')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'keywords')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'catalog_id')->dropDownList(
            ArrayHelper::map(Category::find()->all(), 'id', 'title')
    ) ?>

    <?= $form->field($model, 'on_main_page')->dropDownList(['1'=>'Да', '0'=>'Нет']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
