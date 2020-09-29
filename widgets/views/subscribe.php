<div class="widget sidebar-widget subscribe">
    <div class="sidebar-widget-title">
        <h3>Аъзо бўлиш</h3>
    </div>
    <? use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;

    if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissable"
             style="padding-top:10px;padding-bottom: 10px;">
            <?php echo Yii::$app->session->getFlash('success'); ?>
        </div>
    <? endif; ?>

    <?php $form = ActiveForm::begin([
            'id' => 'contact-form',
//            'action' => ['/subscribe'],
    ]); ?>

    <?= $form->field($subscriber, 'email')->textInput(['class' => 'form-control', 'placeholder' => 'Email...'])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('OK', ['class' => 'btn btn-primary ', 'name' => 'contact-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>