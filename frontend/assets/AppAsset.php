<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'styles/site.css',
        'styles/bootstrap4/bootstrap.min.css',
        'plugins/font-awesome-4.7.0/css/font-awesome.min.css',
        'plugins/OwlCarousel2-2.2.1/owl.carousel.css',
        'plugins/OwlCarousel2-2.2.1/owl.theme.default.css',
        'plugins/OwlCarousel2-2.2.1/animate.css',
        'styles/main_styles.css',
        'styles/responsive.css',
    ];
    public $js = [
        'js/jquery-3.2.1.min.js',
        'styles/bootstrap4/popper.js',
        'styles/bootstrap4/bootstrap.min.js',
        'plugins/Isotope/isotope.pkgd.min.js',
        'plugins/OwlCarousel2-2.2.1/owl.carousel.js',
        'plugins/easing/easing.js',
        'js/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
