<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class BootflatAsset extends AssetBundle
{
     public $sourcePath = '@themes/bootflat';
    public $baseUrl = '@web';
    public $css = [
        'css/bootflat.css',
        'css/bootflat.min.css',
        //'css/style1.css',

        
    ];
    public $js = [
        'js/icheck.min.js',
        'js/jquery.fs.selecter.min.js',
        'js/jquery.fs.stepper.min.js',
        
      
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
