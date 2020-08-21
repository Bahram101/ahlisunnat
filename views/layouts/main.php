<?
use app\models\Praytimes;
use app\models\Cities;
use yii\helpers\Json;


$city_id = $_COOKIE['city_id'] ? $_COOKIE['city_id'] : '20720';

$city = Cities::find()->where(['id'=>$city_id])->asArray()->one();

$json = file_get_contents(
//    'https://namaztimes.kz/api/praytimes?id=20720&type=json'
    'https://namaztimes.kz/api/praytimes?id='.$city['id'].'&type=json'
);

$months = [
    'islamic' => [
        'ЗУЛ-ҲИЖЖА','МУҲАРРАМ','САФАР','РАБИУЛ-АВВАЛ','РАБИУЛ-ОХИР',
        'ЖУМОДИЛ-АВВАЛ','ЖУМОДИЛ-ОХИР','РАЖАБ','ШАЪБОН','РАМАЗОН',
        'ШАВВОЛ','ЗУЛ-ҚАЪДА'
    ],
    'ru' => [
        'Январь', 'Февраль', 'Март', 'Апрель',
        'Май', 'Июнь', 'Июль', 'Август',
        'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'
    ]
];

$jsonN = json_decode($json,true);
date_default_timezone_set('Asia/Almaty');
//Islamic Date
$date = strip_tags($jsonN['islamic_date']);
$chunks = explode("-", $date, 3);

if($chunks[1][0] == '0'){
    $chunks[1] = substr($chunks[1], 1, 1);
}

$islamic_date =  $chunks[2].' - '.$months['islamic'][$chunks[1]].', '.$chunks[0].'';
//debug($islamic_date);die;
//Date
$month = date("n")-1;
$day = date("j");
$year = date("Y");
$Date = $day.' - '.$months['ru'][$month].', '.$year.'';

$array = [
    0 =>'imsak',
    1 =>'kun',
    2 =>'besin',
    3 =>'ekindi',
    4 =>'aqsham',
    5 =>'quptan'
];
$arrays = [
    0 =>'imsok',
    1 =>'kuesh',
    2 =>'peshin',
    3 =>'asr',
    4 =>'shom',
    5 =>'huftan'
];

foreach ($array as $key => $value) {
    $time = strtotime(date('G:i'));
    $Atime = strtotime($jsonN['praytimes'][$value]);
    $Btime = strtotime($jsonN['praytimes'][$array[$key+1]]);
    $Ctime = strtotime("+1 day",strtotime( $jsonN['praytimes'][$array[0]]));

    $Ctime = !empty($array[$key+1]) ? $Btime : $Ctime;
    //*Check
    // echo date('Y-n-d H:i',$Atime).'  - '.date('Y-n-d H:i',$time).'  -  '.date('Y-n-d H:i',$Ctime).'<br>';
    if($time >= $Atime and $time <= $Btime){
        //echo $Atime.'  - '.$time.' -  '.$Btime.'<br>';
        $serverDate =  $arrays[$key];
    }
}


use app\widgets\Alert;
use app\widgets\CitySearchWidget;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
AppAsset::register($this);

$this->beginPage()
?>
<!DOCTYPE HTML>
<html class="<?= Yii::$app->language ?>">
<head>
    <!-- Basic Page Needs
      ================================================== -->
    <meta charset="<?= Yii::$app->charset ?>">

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <!-- Mobile Specific Metas
      ================================================== -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" id="real-accessability-css" href="/css/real-accessability.css?ver=1.0" type="text/css" media="all">
    <link rel="shortcut icon" href="/images/favicon.ico" />
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>
</head>
<body class="real-accessability-body">
<?php $this->beginBody() ?>
<!--[if lt IE 7]>
<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
<div class="body" style="background: url(/images/uzor.png);">
    <!-- Start Site Header -->
    <header class="site-header" style="background: #F8F7F3;">
        <div class="notice-bar" style="background: #142C4C">
            <div class="container">
                <div class="row" style="display: flex;align-items: center; flex-wrap:wrap; justify-content: space-around">
                    <div class="col-md-12 hidden-lg hidden-md site-name">
                        <a href="/"><h3 style="color:white;text-transform: uppercase;font-family: Calibri;text-align: center;font-weight: bold">ahlisunnat</h3></a>
                    </div>

                    <div class="col-md-3 notice-bar-title date-col" >
                        <!--<span class="notice-bar-title-icon hidden-xs">
                            <i class="fa fa-calendar fa-3x" style="color:white"></i>
                        </span>-->
                        <h6 class="date date1 text-white"><?=$islamic_date?> йил</h6>
                        <h6 class="date date1" style="color:#F69C1F" id="date"><?=$Date?> йил</h6>
                        <h6 class="date date2 text-white"><?=$islamic_date?> й</h6>
                        <h6 class="date date2" style="color:#F69C1F" id="date"><?=$Date?> й</h6>
                    </div>

                    <div class="col-md-3 city-col"  >
                        <div class="text-center" id="shahar" style="color:white; font-size:20px" >
                            <?=$city['name_uz']?><i class=" fa fa-search" id="searchIcon"></i>
                        </div>

                        <div class="form-group none" id="citySearch"  style="margin-bottom: 0; width: 100%;">
                            <? echo CitySearchWidget::widget(); ?>
                        </div>

                    </div>

                    <div id="counter" class="col-md-4 counter time-col">
                        <!--<div class="text-center" id="shahar" style="color:white;font-weight:bold ;" ><?/*=$city['name_uz']*/?></div>-->
                        <div class="timer-col">
                            <span class="timer-type time" >Имсок</span>
                            <span id="imsok" class="Islamic_t">00:00</span>
                        </div>
                        <div class="timer-col">
                            <span class="timer-type time">Қуёш</span>
                            <span id="kuesh" class="Islamic_t">00:00</span>
                        </div>
                        <div class="timer-col">
                            <span class="timer-type time" >Пешин</span>
                            <span id="peshin" class="Islamic_t">00:00</span>
                        </div>
                        <div class="timer-col">
                            <span class="timer-type time">Аср</span>
                            <span id="asr" class="Islamic_t">00:00</span>
                        </div>
                        <div class="timer-col">
                            <span class="timer-type time">Шом</span>
                            <span id="shom" class="Islamic_t">00:00</span>
                        </div>
                        <div class="timer-col">
                            <span class="timer-type time">Хуфтон</span>
                            <span id="hufton" class="Islamic_t">00:00</span>
                        </div>
                    </div>

                    <div class="col-md-2 icons-col" style="padding:0">
                        <div id="real-accessability" style="display:inherit;">
                            <ul>
                                <li><a href="#" id="real-accessability-biggerFont"></a></li>
                                <li><a href="#" id="real-accessability-smallerFont"></a></li>
                                <li><a href="#" id="real-accessability-grayscale" class="real-accessability-effect"></a></li>
                                <li><a href="#" id="real-accessability-invert" class="real-accessability-effect"></a></li>
                                <li><a href="#" id="real-accessability-linkHighlight"></a></li>
<!--                                <li><a href="#" id="real-accessability-regularFont"></a></li>-->
                                <li><a href="#" id="real-accessability-reset"></a></li>

                            </ul>

                        </div>
                    </div>

                    <a href="#" class="visible-sm visible-xs menu-toggle" style="position: absolute;right: 10px;top: 0; z-index:10"><i class="fa fa-bars" style="color:white;"></i></a> </div>
            </div>
        </div>

    </header>
    <!-- End Site Header -->

    <!-- Start Nav Backed Header -->
    <style>
        @keyframes animatedBackground {
        0 {
            background-position: 100% 0
        }
        100% {
            background-position:  -100px 0 /* анимируем свойство background-position */
        }
        }


        /* Safari 4.0+, Chrome 4.0+ */
        @-webkit-keyframes animatedBackground {
        0 {
            background-position: 100% 0
        }
        100% {
            background-position:  -100px 0
        }
        }

        /* не нужно использовать префикс -ms, так как свойства keyframes и animation поддерживаются с версии IE10 без префикса */
        #fon{
            height: 100%;
            width:100%;
            background-image: url('/images/header_bg_uzor.png');
            animation: animatedBackground 20s  linear 0s normal none infinite;
            -moz-animation: animatedBackground 20s  linear 0s normal none infinite;
            -webkit-animation: animatedBackground 20s  linear 0s normal none infinite;
            -o-animation: animatedBackground 20s  linear 0s normal none infinite;

            /* так же, как и с @keyframes, префикс -ms тут ни к чему */
        }


        .v-center {
            position: relative;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }
        .plr-5{
            padding-left: 5px;
            padding-right: 5px;
        }

        @keyframes shake {
            0% {
                transform: translate(0px, 0px) rotate(0deg);

            }
            25% {
                transform: translate(-3px, 0px) rotate(0deg);

            }
            50% {
                transform: translate(3px, 0px) rotate(0deg);

            }
            75% {
                transform: translate(-3px, 0px) rotate(0deg);

            }

            100% {
                transform: translate(0px, 0px) rotate(0deg);

            }
        }
        @keyframes shakes {
            0% {
                transform: translate(0px, 0px) rotate(0deg);

            }
            25% {
                transform: translate(3px, 0px) rotate(0deg);

            }
            50% {
                transform: translate(-3px, 0px) rotate(0deg);

            }
            75% {
                transform: translate(3px, 0px) rotate(0deg);

            }

            100% {
                transform: translate(0px, 0px) rotate(0deg);

            }
        }
        @keyframes shakess {
            0% {
                transform: translate(0px, 0px) rotate(0deg);

            }
            25% {
                transform: translate(0px, 3px) rotate(0deg);

            }
            50% {
                transform: translate(0px, -3px) rotate(0deg);

            }
            75% {
                transform: translate(0px, 3px) rotate(0deg);

            }

            100% {
                transform: translate(0px, 0px) rotate(0deg);

            }
        }
        @keyframes shakesss {
            0% {
                transform: translate(0px, 0px) rotate(0deg);

            }
            25% {
                transform: translate(0px, -3px) rotate(0deg);

            }
            50% {
                transform: translate(0px, 3px) rotate(0deg);

            }
            75% {
                transform: translate(0px, -3px) rotate(0deg);

            }

            100% {
                transform: translate(0px, 0px) rotate(0deg);

            }
        }

        @keyframes animatedBackgrounds {
        0 {
            background-position-x: 100%
        }
        100% {
            background-position-x:  2000px  /* анимируем свойство background-position */
        }
        }

        @keyframes animatedBackgroundss {
        0 {
            background-position-x: 100%
        }
        100% {
            background-position-x:  2000px  /* анимируем свойство background-position */
        }
        }
        #cloud{
            position: absolute;
            height: 250px;
            width: 100%;
            background-image: url(/images/cloud.png);
            /*background-repeat: no-repeat;*/
            background-size: 655px;
            background-position-y: 5px;
            /* top: 30px; */
            z-index: 1;
            animation: animatedBackgrounds 101s  linear 0s normal none infinite;
        }
        #clouds{
            /* opacity: 0.77; */
            position: absolute;
            height: 250px;
            width: 100%;
            background-image: url(/images/cloud.png);
            /* background-repeat: no-repeat; */
            background-size: 510px;
            background-position-y: -145px;
            background-repeat: repeat-x;
            /* top: 30px; */
            /* z-index: 1; */
            animation: animatedBackgroundss 201s linear 0s normal none infinite;
        }
        .dva {
            content: "";
            position: absolute;
            top: 50px;
            left: 45px;
            width: 65%;
            height: 65%;
            background: linear-gradient(to left, rgba(255,255,255,.0), rgba(255,255,255,.8), rgba(255,255,255,.0)) no-repeat -2em 0%;
            background-size: 2em 100%;

            animation: 2s animatd infinite;
            /*animation-delay: 10s;*/
            filter: blur(14px);
        }
        @keyframes animatd {
        0 {
            background-position-x: 100%
        }
        100% {
            background-position-x:  250%  /* анимируем свойство background-position */
        }
    </style>
    <!--<div class="parallax" >
        <img src="images/header2.png"  alt="" style="width:100%" class="">
    </div>-->
    <div class="parallax" style="height: 250px; overflow: hidden">
        <div id="fon">
            <div id="cloud"></div>
            <div id="clouds"></div>
            <div class="container">

                <!-- <img src="/images/cloud.png">-->
                <div class="row" style="height: 235px;">
                    <div class="col-md-2 v-center plr-5" style="padding: 15px">
                        <img src="/images/1.png" class="img-fluid" style="animation: shake 9s;animation-iteration-count: infinite;">
                    </div>
                    <div class="col-md-1 v-center plr-5">
                        <img src="/images/2.png" class="img-fluid" style="animation: shakess 13s;animation-iteration-count: infinite;">
                    </div>
                    <div class="col-md-1 v-center plr-5">
                        <img src="/images/3.png" class="img-fluid" style="animation: shakesss 13s;animation-iteration-count: infinite;">
                    </div>
                    <div class="col-md-3 v-center plr-5" style="padding: 20px">
                        <div id="dva" class=""></div>
                        <img src="/images/4.png" class="">
                    </div>
                    <div class="col-md-1 v-center plr-5">
                        <img src="/images/5.png" class="img-fluid" style="animation: shakesss 13s;animation-iteration-count: infinite;">
                    </div>
                    <div class="col-md-1 v-center plr-5">
                        <img src="/images/6.png" class="img-fluid" style="animation: shakess 13s;animation-iteration-count: infinite;">
                    </div>
                    <div class="col-md-2 v-center plr-5" style="padding: 15px">
                        <img src="/images/7.png" class="img-fluid" style="animation: shakes 9s;animation-iteration-count: infinite;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-menu-wrapper">
        <!--<div class="container">-->
        <div class="row" style="width:100%">
            <div class="col-md-12">
                <nav class="navigation"  >
                    <ul class="sf-menu">
                        <li><a href="/" class="whiteFont">Бош саҳифа</a> </li>
                        <li><a href="/quran" class="whiteFont">Қуръони карим</a></li>
                        <li class="megamenu mundarija"><a href="" class="whiteFont">Мундарижа</a>
                            <ul class="dropdown">
                                <li>
                                    <div class="megamenu-container container">
                                        <div class="row">
                                            <div class="col-md-3"> <span class="megamenu-sub-title"><a href="/category/1">Иймон ва Ислом</a></span>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <span class="megamenu-sub-title"><a href="/category/2">Намоз</a></span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span class="megamenu-sub-title"><a href="/category/3">Қуръони Карим</a></span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span class="megamenu-sub-title"><a href="/category/4">Пайғамбаримиз</a></span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span class="megamenu-sub-title"><a href="/category/5">Бошқа динлар</a></span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span class="megamenu-sub-title"><a href="/category/6">Мазҳаб ва мазҳабсизлик</a></span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span class="megamenu-sub-title"><a href="/category/7">Суннат - Бидъат</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3"> <span class="megamenu-sub-title"><a href="/category/8">Адашган оқимлар</a></span>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <span class="megamenu-sub-title"><a href="/category/9">Суҳбатлар</a></span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span class="megamenu-sub-title"><a href="/category/10">Таҳорат - Ғусл</a></span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span class="megamenu-sub-title"><a href="/category/11">Одоб-Ахлоқ</a></span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span class="megamenu-sub-title"><a href="/category/12">Ҳайз</a></span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span class="megamenu-sub-title"><a href="/category/13">Ибратли воқеалар</a></span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span class="megamenu-sub-title"><a href="/category/14">Рўза</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3"> <span class="megamenu-sub-title"><a href="/category/15">Закот - Ушр - Садақа</a></span>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <span class="megamenu-sub-title"><a href="/category/16">Ҳаж</a></span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span class="megamenu-sub-title"><a href="/category/17">Қурбонлик</a></span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span class="megamenu-sub-title"><a href="/category/18">Савдо-Сотиқ</a></span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span class="megamenu-sub-title"><a href="/category/19">Ҳалол - Ҳаром</a></span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span class="megamenu-sub-title"><a href="/category/20">Никоҳ ва Оила</a></span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span class="megamenu-sub-title"><a href="/category/21">Қийматли вақтлар</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3"> <span class="megamenu-sub-title"><a href="/category/22">Керакли дуолар</a></span>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <span class="megamenu-sub-title"><a href="/category/23">Ислом олимлари</a></span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span class="megamenu-sub-title"><a href="/category/24">Бошқа мавзулар</a></span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span class="megamenu-sub-title"><a href="/category/29">Рамазон жадваллари</a></span>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li><a href="/sources" class="whiteFont">Манбалар</a></li>
                        <li><a href="/questions" class="whiteFont">Боғланиш</a></li>
                        <li><a href="/books" class="whiteFont">Юклаш</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <!--</div>-->
    </div>
    <!-- End Hero Slider -->
    <?//= Alert::widget() ?>
    <!-- Start Content -->
    <?=$content;?>
    <!-- Start Featured Gallery -->


    <!-- Start Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="row">
               <p style="color:white;text-align: center">Сайтимиздаги маълумотлар барча инсонлар фойдаланиши учун тайёрланган. Асл нусхасини ўзгартирмаслик шарти билан рухсат олмасдан фойдаланиш мумкин.
                   <!--www.ahlisunnat.com ® 2011---><?/*=date('Y')*/?></p>
            </div>
        </div>
    </footer>

    <!-- End Footer -->
<!--    <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a> </div>-->
<!-- SCRIPTS
      ================================================== -->

<!--<script src="/js/jquery-2.0.0.min.js"></script>-->
<script src="/js/jquery-3.5.1.min.js"></script>

<script type='text/javascript' src='/js/real-accessability.js?ver=1.0'></script>

<div id="real-accessability">
    <a href="#" id="real-accessability-btn"><i class="real-accessability-loading"></i><i class="real-accessability-icon"></i></a>
    <ul>
        <li><a href="#" id="real-accessability-biggerFont">Increase Font</a></li>
        <li><a href="#" id="real-accessability-smallerFont">Decrease Font</a></li>
        <li><a href="#" id="real-accessability-grayscale" class="real-accessability-effect">Black & White</a></li>
        <li><a href="#" id="real-accessability-invert" class="real-accessability-effect">Inverse Colors</a></li>
        <li><a href="#" id="real-accessability-linkHighlight">Highlight Links</a></li>
        <li><a href="#" id="real-accessability-regularFont">Regular Font</a></li>
        <li><a href="#" id="real-accessability-reset">Reset</a></li>
    </ul>
</div>
<!-- Init Real Accessability Plugin -->
<script type="text/javascript">


    jQuery( document ).ready(function() {
        jQuery.RealAccessability({
            hideOnScroll: false
        });
    });
    <!-- /END -->
</script>

<script>

    /*
    jsonurl = 'https://namaztimes.kz/api/praytimes?id=20720&type=json';
    $.ajax({
        url: jsonurl,
        async: false,
        dataType: 'json',
        success: function (json) {
            mydata = json;
        }
    });
    */
    mydata = JSON.parse('<?=$json?>');

    if(mydata){
        //tt = mydata;

        document.getElementById("imsok").innerHTML = mydata.praytimes.imsak.replace("*", '');
        document.getElementById("kuesh").innerHTML = mydata.praytimes.kun.replace("*", '');
        document.getElementById("peshin").innerHTML = mydata.praytimes.besin.replace("*", '');
        document.getElementById("asr").innerHTML = mydata.praytimes.ekindi.replace("*", '');
        document.getElementById("shom").innerHTML = mydata.praytimes.aqsham.replace("*", '');
        document.getElementById("hufton").innerHTML = mydata.praytimes.quptan.replace("*", '');

        document.getElementById("<?= $serverDate ?>").classList.add("activeTime");

        //document.getElementsById('islamic-date').innerHTML = ;
        //alert(mydata.islamic_date);


    }
    //  https://namaztimes.kz/api/praytimes?id=20720&type=json

    setInterval(alertFunc, 10000);
    function alertFunc() {
        document.getElementById("dva").classList.add("dva");
        setTimeout(alertFuncs,1000);
        //document.getElementById("dva").classList.add("dva");
    }
    function alertFuncs() {
        document.getElementById("dva").classList.remove("dva");
    }

</script>
<script type="text/javascript">
    function getValue() {
        var G = $('#w0').val();
        if( G != ""){
            jsonurl = '/json/times?id=' + G;

            var mydata = [];

            $.ajax({
                url: jsonurl,
                async: false,
                dataType: 'json',
                success: function (json) {
                    mydata = json;
                }
            });
            if(mydata){
                tt = mydata;

                // var newstr = str.replace("*", '');
                document.cookie = "city_id="+mydata.attributes.ID;


                document.getElementById("imsok").innerHTML= mydata.praytimes.imsak.replace("*", '');
                document.getElementById("kuesh").innerHTML= mydata.praytimes.kun.replace("*", '');
                document.getElementById("peshin").innerHTML= mydata.praytimes.besin.replace("*", '');
                document.getElementById("asr").innerHTML= mydata.praytimes.ekindi.replace("*", '');
                document.getElementById("shom").innerHTML= mydata.praytimes.aqsham.replace("*", '');
                document.getElementById("hufton").innerHTML= mydata.praytimes.quptan.replace("*", '');

                document.getElementById("shahar").innerHTML= mydata.attributes.CityName+" <i class='fa fa-search'  id='search2' style='font-size:16px'></i>";

            }
        }

    }
    $(document).ready(function(){
        $("#menu").on("click","a", function (event) {
            event.preventDefault();
            var id  = $(this).attr('href'),
                top = $(id).offset().top;
            $('body,html').animate({scrollTop: top}, 1500);
        });
    });
    $(document).ready(function(){
        $('body').append('<div id="toTop" class="btn btn-primary d-print-none"><span class="glyphicon glyphicon-chevron-up"></span>⇑</div>');
        $(window).scroll(function () {
            if ($(this).scrollTop() != 0) {
                $('#toTop').fadeIn();
            } else {
                $('#toTop').fadeOut();
            }
        });
        $('#toTop').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>