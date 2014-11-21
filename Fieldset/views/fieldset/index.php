<?php
use Xtlan\Design\Asset\DesignAsset;
use Xtlan\Design\Asset\ChosenAsset;
use Xtlan\Design\Asset\JuiAsset;
use Xtlan\Core\Helper\GetUrl;


/* @var $this \yii\web\View */

ChosenAsset::register($this);
JuiAsset::register($this);

$this->registerJsFile(GetUrl::assetsUrl($this, DesignAsset::className(), 'js/views/layout/fieldSet/FieldSet.js'));
$this->registerJsFile(GetUrl::assetsUrl($this, DesignAsset::className(), 'js/views/layout/fieldSet/EditSet.js'));
?>
<div class="viewFieldSet">
    <?php if ($showLabel == true):?>
        <h2 class="viewFieldSet__title pseudo_link"><?=$label?></h2>
    <?php endif;?>
    <div class="viewFieldSet__content <?= ($showContent == true) ? 'viewFieldSet__enabled' : '' ?>">
        <?=$content?>
    </div>
</div>
