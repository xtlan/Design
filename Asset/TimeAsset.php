<?php
namespace Xtlan\Design\Asset;

use yii\web\AssetBundle;

/**
* TimeAsset
*
* @version 1.0.0
* @author Kirya <cloudkserg11@gmail.com>
*/
class TimeAsset extends AssetBundle
{
    public $sourcePath = '@vendor/xtlan/design/web';

    public $css = [
        'css/timepicker/style.css'
    ];

    public $js = [
        'js/timepicker/jquery.maskedinput.js',
        'js/timepicker/jquery.mousewheel.js',
        'js/timepicker/load.js'
    ];

    public $depends = [
        'Xtlan\Design\Asset\JqueryAsset'
    ];

}
