<?php
namespace Xtlan\Design\Asset;

use yii\web\AssetBundle;

/**
* ChosenAsset
*
* @version 1.0.0
* @author Kirya <cloudkserg11@gmail.com>
*/
class YiiAsset extends AssetBundle
{ 
    public $sourcePath = '@yii/assets';
    public $js = [
        'yii.js',
    ];
 

}
