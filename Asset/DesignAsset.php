<?php
namespace Xtlan\Design\Asset;

use yii\web\AssetBundle;
use yii\web\View;

/**
* DesignAsset
*
* @version 1.0.0
* @author Kirya <cloudkserg11@gmail.com>
*/
class DesignAsset extends AssetBundle
{
    public $sourcePath = '@vendor/xtlan/design/resources';

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
        'Xtlan\Design\Asset\JqueryAsset',
        'Xtlan\Design\Asset\YiiAsset',
        'Xtlan\Design\Asset\UnderscoreAsset'
    ];

    public $jsOptions = [
        'position' => View::POS_HEAD
    ];
    
    public $cssOptions = [
        'position' => View::POS_HEAD
    ];

    public function registerAssetFiles($view)
    {
        parent::registerAssetFiles($view);

        $view->registerMetaTag(['content' =>  $this->baseUrl, 'name' => 'design_asset_url'], 'design_asset_url');
    }

}
