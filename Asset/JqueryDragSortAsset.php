<?php
namespace Xtlan\Design\Asset;
use yii\web\AssetBundle;
use yii\web\View;

/**
 * JqueryDragSortAsset
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class JqueryDragSortAsset extends AssetBundle
{

    public $sourcePath = '@vendor/xtlan/design/resources';
    public $js = [
        'js/libs/jquery.dragsort-0.5.2.min.js'
    ];
    public $depends = [
        //'yii\web\JqueryAsset'
    ];
    

}


