<?php
namespace Xtlan\Design\Asset;

use yii\web\AssetBundle;

/**
* DesignAsset
*
* @version 1.0.0
* @author Kirya <cloudkserg11@gmail.com>
*/
class DesignAsset extends AssetBundle
{
    public $sourcePath = '@app/lib/Design/web';

    public $css = [
        'css/reset.css',
        'fonts/fonts.css',
        'css/screen.css' 
    ];

    public $js = [
        'js/libs/html5.js',
        'js/libs/jquery.validate.min.js',
        'js/libs/chosen.jquery.min.js',
        'js/views/layout/systemMessage.js',
        'js/views/layout/appRequest.js',
        'js/views/layout/selectInit.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'dsxack\underscore\UnderscoreAsset'
    ];

}
