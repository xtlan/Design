<?php
namespace Xtlan\Design\Asset;

use yii\web\AssetBundle;

/**
* ChosenAsset
*
* @version 1.0.0
* @author Kirya <cloudkserg11@gmail.com>
*/
class ChosenAsset extends AssetBundle
{ 
    public $sourcePath = '@vendor/xtlan/design/web';

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
