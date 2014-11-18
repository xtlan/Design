<?php
namespace app\lib\design\assets;

use yii\web\AssetBundle;

/**
* ChosenAsset
*
* @version 1.0.0
* @author Kirya <cloudkserg11@gmail.com>
*/
class ChosenAsset extends AssetBundle
{ 
    public $sourcePath = '@app/lib/Design/web';

    public $css = [
    ];

    public $js = [
        '@bower/jquery',
        'js/lib/chosen.jquery.min.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];

}
