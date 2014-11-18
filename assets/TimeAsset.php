<?php
namespace app\lib\design\assets;

use yii\web\AssetBundle;

/**
* TimeAsset
*
* @version 1.0.0
* @author Kirya <cloudkserg11@gmail.com>
*/
class TimeAsset extends AssetBundle
{
    public $sourcePath = '@app/lib/Design/web';

    public $css = [
        'css/timepicker/style.css'
    ];

    public $js = [
        'js/timepicker/jquery.maskedinput.js',
        'js/timepicker/jquery.mousewheel.js',
        'js/timepicker/load.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];

}
