<?php

use app\modules\admin\models\Category;
use app\modules\admin\models\Newsletters;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Sendnewsletter */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sendnewsletter-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'newsletter_id')->dropDownList(ArrayHelper::map(Newsletters::find()->where(['status'=>0])->all(), 'id', 'title')) ?>

    <?/*= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->where(['id' => [34, 35,]])->all(), 'id', 'title')) */?>

    <?//= $form->field($model, 'category_id')->checkbox(['1'=>'Да', '0'=> 'Нет']) ?>

    <?= $form->field($model, 'category_id')
        ->radioList(ArrayHelper::map(Category::find()->where(['id' => [34, 35,]])->all(), 'id', 'title')) ?>

    <?= $form->field($model, 'date')->textInput() ?>

<!--    --><?//= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Send', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
