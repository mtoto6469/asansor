<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAssetProfile extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/profile.css',

        'font-awesome-4.6.3/css/font-awesome.min.css',
        'css/boot.css',
        'css/bootstrap.css',
        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/magnific-popup.css',
        'css/style.css',
        'css/style1.css',
        'css/style_common.css',
        'css/templatemo-style.css',
        
    ];
    public $js = [

        'js/bootstrap.min.js',
        'js/jquery.hoverfold.js',
        'js/jquery-1.10.1.min.js',
        'js/modernizr.custom.69142.js',
        'js/myjs.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',


//

    ];
}
