<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
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
        'asset/css/style.default.css',
        'asset/css/fontastic.css',
        'asset/css/grasp_mobile_progress_circle-1.0.0.min.css',
        'asset/css/custom.css',
        'asset/css/jquery.mCustomScrollbar.css',
    ];
    public $js = [
        'asset/js/popper.min.js',
        'asset/js/grasp_mobile_progress_circle-1.0.0.min.js',
        'asset/js/jquery.cookie.js',
        'asset/js/jquery.validate.min.js',
        'asset/js/jquery.mCustomScrollbar.concat.min.js',
        'asset/js/charts-home.js',
        'asset/js/js/front.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'rmrevin\yii\fontawesome\CdnProAssetBundle',
        'dosamigos\chartjs\ChartJsAsset',
    ];
}
