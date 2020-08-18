<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\ContactForm */

use app\widgets\HitArticles;
use app\widgets\Subscribe;
use app\widgets\Tags;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Саволингиз';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main">
    <div id="content">
        <div class="site-contact container">
            <div class="row">
                <div class="col-md-9 posts-archive">
                    <h1><?= Html::encode($this->title) ?></h1>

                        <? if(Yii::$app->session->hasFlash('success')):?>
                            <div class="alert alert-success alert-dismissable">
                                <?php echo Yii::$app->session->getFlash('success'); ?>
                            </div>
                        <? endif;?>
                        <div class="row">
                            <div class="col-lg-5">

                                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                                <?= $form->field($model, 'email') ?>
                                <span style="margin-bottom: 20px; display: block;color:#e74c3c">Ҳурматли ўқувчи! Савол юбораётганингизда ўз Email адресингизни ёзишни унутманг. Акс ҳолда биз сизга жавобни юбора олмаймиз.</span>

                                <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

                                <?/*= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                                ]) */?>

                                <div class="form-group">
                                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                                </div>

                                <?php ActiveForm::end(); ?>

                            </div>
                        </div>


<!--                    --><?php //endif; ?>
                </div>
                <? echo $this->render('/partials/sidebar.php')?>
            </div>


        </div>
    </div>
</div>

