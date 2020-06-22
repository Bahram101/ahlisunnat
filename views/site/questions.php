<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\ContactForm */

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
                <div class="col-md-3 sidebar" >
                    <div class="widget sidebar-widget search-form-widget hidden-sm hidden-xs ">
                        <div class="input-group input-group-lg">
                            <input type="text" class="form-control" placeholder="Search Posts...">
                            <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" >
                                        <i class="fa fa-search fa-lg" ></i>
                                    </button>
                                </span>
                        </div>
                    </div>
                    <div class="widget sidebar-widget">
                        <div class="sidebar-widget-title">
                            <h3>Бу ойда кўп ўқилганлар</h3>
                        </div>
                        <ul>
                            <li><a href="#">Faith</a> (10)</li>
                            <li><a href="#">Missions</a> (12)</li>
                            <li><a href="#">Salvation</a> (34)</li>
                            <li><a href="#">Worship</a> (14)</li>
                        </ul>
                    </div>
                    <div class="widget sidebar-widget subscribe">
                        <div class="sidebar-widget-title">
                            <h3>Аъзо бўлиш</h3>
                        </div>
                        <div class="input-group input-group-lg">
                            <input type="text" class="form-control subInput" placeholder="Email...">
                            <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" >
                                         OK
                                    </button>
                                </span>
                        </div>

                    </div>
                    <div class="widget sidebar-widget tags">
                        <div class="sidebar-widget-title">
                            <h3>Теглар</h3>
                        </div>
                        <div class="tag-cloud">
                            <a href="#">Faith</a> <a href="#">Heart</a> <a href="#">Love</a> <a href="#">Praise</a> <a href="#">Sin</a> <a href="#">Soul</a> <a href="#">Missions</a> <a href="#">Worship</a> <a href="#">Faith</a> <a href="#">Heart</a> <a href="#">Love</a> <a href="#">Praise</a> <a href="#">Sin</a> <a href="#">Soul</a> <a href="#">Missions</a> <a href="#">Worship</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

