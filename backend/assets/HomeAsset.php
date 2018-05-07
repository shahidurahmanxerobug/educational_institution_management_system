<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class HomeAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'vendor/masonry_swipebox/swipebox.min.css',
		'css/adminnine_classic.css',
		'vendor/font-awesome/css/font-awesome.min.css',
		'css/site.css',
		
    ];
    public $js = [
		'js/loadingoverlay.min.js',
		'js/loadingoverlay_progress.min.js',
		'vendor/masonry_swipebox/jquery.swipebox.js',
		'vendor/masonry_swipebox/masonry.pkgd.min.js',
		'js/adminnine.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
