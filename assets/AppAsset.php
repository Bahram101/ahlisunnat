<?php


namespace app\assets;
use yii\web\AssetBundle;


class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "css/bootstrap.css",
        "plugins/mediaelement/mediaelementplayer.css",
        "css/style.css",
        "css/style2.css",
        "css/font-awesome.css",
        "plugins/prettyphoto/css/prettyPhoto.css",
        "css/ie8.css",
        "colors/color1.css",
        "css/custom.css",
    ];
    public $js = [
//            "js/jquery-2.0.0.min.js",
        "js/modernizr.js",
        "plugins/prettyphoto/js/prettyphoto.js",
        "js/helper-plugins.js",
        "js/bootstrap.js",
        "js/waypoints.js",
        "plugins/mediaelement/mediaelement-and-player.min.js",
        "js/init.js",
        "plugins/flexslider/js/jquery.flexslider.js",
        "plugins/countdown/js/jquery.countdown.min.js",
        'js/real-accessability.js?ver=1.0',
        'js/main.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
