<?php
namespace Xtlan\Design\Asset;
use yii\web\AssetBundle;
use yii\web\View;

/**
 * JqueryAsset
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class JqueryAsset extends AssetBundle
{

    public $sourcePath = '@vendor/xtlan/design/web';
    public $js = [
        'js/libs/jquery-1.7.2.min.js'
    ];
    public $depends = [
        //'yii\web\JqueryAsset'
    ];
    

}


