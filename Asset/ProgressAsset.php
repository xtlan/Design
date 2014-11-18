<?php
namespace Xtlan\Design\Asset;

use yii\web\AssetBundle;

/**
* ProgressAsset
*
* @version 1.0.0
* @author Kirya <cloudkserg11@gmail.com>
*/
class ProgressAsset extends AssetBundle
{
    public $sourcePath = '@app/lib/Design/web';

    public $css = [
        'css/jqueryUI/jquery-ui.css' 
    ];

    public $js = [
        'js/progress/progressWidget.js'
    ];
    
    public $depends = [
        'yii\jui\JuiAsset',
        'dsxack\underscore\UnderscoreAsset'
    ];

}
