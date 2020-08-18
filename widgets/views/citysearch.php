<?php

use kartik\select2\Select2;
Use yii\helpers\Html;
use yii\web\JsExpression;

?>

<!--<form action="/site/abc" role="form" class="notopmargin nobottommargin" style="padding-bottom: 10px;width:90%; margin:0 auto; margin-bottom: 10px;">
    <div class="input-group divcenter">
        <input type="text" class="form-control" placeholder="Шаҳар танланг" required="">
        <div class="input-group-append">
            <button class="btn btn-success" type="submit"><i class="icon-search"></i></button>
        </div>
    </div>
</form>-->


<form onsubmit="return false" style="display:inline-block;width:90%;">
    <div class="col-11 col-lg-11 col-md-11 float-left">
        <?
        $lang = Yii::$app->language;
//        if($lang == 'uz'){
            $url = '/json/city';
//        }

        echo Select2::widget( [
            'name' => 'city_id',
            'initValueText' =>Yii::t('app', 'Шаҳар номини ёзинг...'),
            'language' => 'uz-UZ',
            'options' => ['placeholder' => Yii::t('app', 'Шаҳар номи...')],
            'pluginOptions' => [
                'allowClear' => false,
                'minimumInputLength' => 1,
                'ajax' => [
                    'url' => $url,
                    'dataType' => 'json',
                    'data' => new JsExpression('function(params) { return {q:params.term}; }')
                ],
                'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                'templateResult' => new JsExpression('function(city) { return city.text; }'),
                'templateSelection' => new JsExpression('function (city) { return city.text; }'),
            ],
        ])?>

    </div>
    <div class="col-1 col-lg-1 col-md-1 float-left pb-1" style="padding-left: 0px;">
        <?= Html::input(
            'submit',null,'OK',
            [
                'class' => 'btn btn-success',
                'id' => 'ok',
                'onclick' => 'getValue()',
                'style' => 'padding: .22rem .75rem;'
            ])
        ?>
    </div>
</form>




