<?php
use Xtlan\Design\Asset\DesignAsset;
use Xtlan\Design\Asset\ChosenAsset;
use Xtlan\Design\Asset\JuiAsset;
use Xtlan\Core\Helper\GetUrl;
use yii\helpers\Html;


/* @var $this \yii\web\View */

ChosenAsset::register($this);
JuiAsset::register($this);

$this->registerJsFile(GetUrl::assetsUrl($this, DesignAsset::className(), 'js/views/layout/filter/DateRangeFilterElement.js'));
$this->registerJsFile(GetUrl::assetsUrl($this, DesignAsset::className(), 'js/views/layout/filter/FlagFilterElement.js'));
$this->registerJsFile(GetUrl::assetsUrl($this, DesignAsset::className(), 'js/views/layout/filter/ListFilterElement.js'));
$this->registerJsFile(GetUrl::assetsUrl($this, DesignAsset::className(), 'js/views/layout/filter/TextFilterElement.js'));
$this->registerJsFile(GetUrl::assetsUrl($this, DesignAsset::className(), 'js/views/layout/filter/FilterView.js'));
?>




<div class="filterContainer">
    <div class="filter">
        <a class="filter__link" href="" title="">Фильтр</a>
        <ul class="action__list">
            <li><a class="addFilter__link" href="" title="">Добавить условие</a></li>
            <li><a href="<?=$filterUrl?>" title="">Очистить</a></li>
        </ul>   
        <?= Html::beginForm($filterUrl, 'GET', ['class' => 'filterForm']); ?>
            <div class="filterForm__row">
                <?php 
                foreach ($elements as $element) {
                    if ($element->hasSaveElement()) {
                        echo $element->renderSaveElement();
                    }
                }
                ?>
                <div class="typeListContainer">
                    <select id="f-filterTypeList" class="chosen-single" name="">
                        <option value="" selected="selected">Выберите условие</option>
                        <?php foreach ($elements as $element):?>
                            <option value="<?=$element->fieldId?>">
                                <?=$element->title?>
                            </option>
                        <?php endforeach;?>
                    </select>
                </div>
            
                <div class="filterForm__containerElements">    
                    <input class="addFilterKey" type="submit" value="" />
                    <button class="deleteFilterKey"></button>
                </div>
            </div>
        <?= Html::endForm() ?>
        <div class="filterForm__containerElements m-hiddenFilterElements">    
            <?php foreach ($elements as $element) {
                echo $element->renderElement();
            }?>
        </div>
    </div>

</div>
