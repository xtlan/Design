<?php
use Xtlan\Design\Asset\DesignAsset;
use Xtlan\Core\Helper\GetUrl;

/* @var $this \yii\web\View */

$this->registerJsFile(GetUrl::assetsUrl($this, DesignAsset::className(), 'js/views/layout/mainNav/MainNav.js'));
?>
<nav id="mainNav">
    <ul class="mainNav__list">
        <?=$content?>
    </ul>
</nav>
