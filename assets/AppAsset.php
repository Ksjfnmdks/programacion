<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/UsuariosForm.css',
        'css/estilos.css',
        'css/bootstrap.min.css',
        'css/jquery.mCustomScrollbar.css',
        'css/material-design-iconic-font.min.css',
        'css/normalize.css',
        'css/style.css',
        'css/sweet-alert.css',
        'css/timeline.css'
        
    ];
    public $js = [
        'js/bootstrap.min.js',
        'js/jquery-1.11.2.min.js',
        'js/jquery.mCustomScrollbar.concat.min.js',
        'js/main.js',
        'js/modernizr.js',
        'js/sweet-alert.min.js',
        'js/bootstrap.bundle.min.js'

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];

    public $img = [
        'img/icons',
        'img/img'
    ];
    public $fonts = [
        'fonts/AlegreyaSansSC-Regular.eot',
        'fonts/AlegreyaSansSC-Regular.svg',
        'fonts/AlegreyaSansSC-Regular.ttf',
        'fonts/AlegreyaSansSC-Regular.woff',
        'fonts/AlegreyaSansSC-Regular.woff2',
        'fonts/glyphicons-halflings-regular.eot',
        'fonts/glyphicons-halflings-regular.svg',
        'fonts/glyphicons-halflings-regular.ttf',
        'fonts/glyphicons-halflings-regular.woff',
        'fonts/glyphicons-halflings-regular.woff2',
        'fonts/Material-Design-Iconic-Font.eot',
        'fonts/Material-Design-Iconic-Font.svg',
        'fonts/Material-Design-Iconic-Font.ttf',
        'fonts/Material-Design-Iconic-Font.woff',
        'fonts/Material-Design-Iconic-Font.woff2',
        'fonts/OpenSans-CondLight.eot',
        'fonts/OpenSans-CondLight.svg',
        'fonts/OpenSans-CondLight.ttf',
        'fonts/OpenSans-CondLight.woff',
        'fonts/OpenSans-CondLight.woff2'
    ];
}
