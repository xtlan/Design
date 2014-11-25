<?php
namespace Xtlan\Design\Asset;
use yii\web\AssetBundle;
/**
 * JqueryAsset
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class JqueryAsset extends AssetBundle
{

    public $sourcePath = '@bower/jquery';
    public $js = [
        'jquery.js'
    ];
    public $depends = [
        //'yii\web\JqueryAsset'
    ];

}


