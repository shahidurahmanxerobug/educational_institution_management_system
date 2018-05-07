<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/adminnine.css',
		'vendor/font-awesome/css/font-awesome.min.css',
		'css/site.css',
		
    ];
    public $js = [
		'js/loadingoverlay.min.js',
		'js/loadingoverlay_progress.min.js',
		'js/adminnine.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
