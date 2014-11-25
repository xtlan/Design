<?php
namespace Xtlan\Design\Asset;

use yii\web\AssetBundle;

/**
 * JuiAsset
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class JuiAsset extends AssetBundle
{
    public $sourcePath = '@vendor/xtlan/design/web';
    public $js = [
        'js/libs/jquery-ui-1.10.3.custom.js'
    ];

    public $depends = [
    //    'yii\jui\JuiAsset'
    ];


}


