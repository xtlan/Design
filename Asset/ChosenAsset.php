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
    public $sourcePath = '@vendor/xtlan/design/resources';

    public $css = [
    ];

    public $js = [
        'js/libs/chosen.jquery.min.js',
    ];

    public $depends = [
        'Xtlan\Design\Asset\JqueryAsset',
    ];

}
