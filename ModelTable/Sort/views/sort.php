<?php
use Xtlan\Design\Asset\DesignAsset;
use Xtlan\Core\Helper\GetUrl;

/* @var $this \yii\web\View */
$this->registerJsFile(GetUrl::assetsUrl($this, DesignAsset::className(), 'js/views/layout/sort/SortView.js'));

?>

<div class="sortContent">

    <div class="sortContainer">
        <?php if (isset($currentElement)) : ?>
            <button class="sortBtn <?=$currentElement->isUp() ? 'm-sortUp':''?> <?=$currentElement->isDown() ? 'm-sortDown' : ''?>">
                <i></i> <?=$currentElement->getLabel()?> 
            </button>
        <?php else: ?>
            <button class="sortBtn"><i></i> По умолчанию</button>
        <?php endif; ?>
        <ul class="sort__list">
            <?php foreach ($elements as $element):?>
                <li><a href="<?=$element->getUrl()?>" title=""><?=$element->label?></a></li>
            <?php endforeach;?>
        </ul>
    </div>
</div>
