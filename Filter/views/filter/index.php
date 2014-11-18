<?php
\Yii::app()->clientScript->registerPackage('design.chosen');
\Yii::app()->clientScript->registerPackage('jquery.ui');
\Yii::app()->clientScript->registerScriptFile(GetUrl::assetsUrl('design_webroot') . '/js/views/layout/filter/DateRangeFilterElement.js');
\Yii::app()->clientScript->registerScriptFile(GetUrl::assetsUrl('design_webroot') . '/js/views/layout/filter/FlagFilterElement.js');
\Yii::app()->clientScript->registerScriptFile(GetUrl::assetsUrl('design_webroot') . '/js/views/layout/filter/ListFilterElement.js');
\Yii::app()->clientScript->registerScriptFile(GetUrl::assetsUrl('design_webroot') . '/js/views/layout/filter/TextFilterElement.js');
\Yii::app()->clientScript->registerScriptFile(GetUrl::assetsUrl('design_webroot') . '/js/views/layout/filter/FilterView.js');
?>

<div class="filterContainer">
    <div class="filter">
        <a class="filter__link" href="" title="">Фильтр</a>
        <ul class="action__list">
            <li><a class="addFilter__link" href="" title="">Добавить условие</a></li>
            <li><a href="<?=$this->filterUrl?>" title="">Очистить</a></li>
        </ul>   
        <form class="filterForm" action="<?=$this->filterUrl?>" method="GET">
            <div class="filterForm__row">
                <?php 
                foreach ($this->elements as $element) {
                    if ($element->hasSaveElement()) {
                        $element->renderSaveElement();
                    }
                }
                ?>
                <div class="typeListContainer">
                    <select id="f-filterTypeList" class="chosen-single" name="">
                        <option value="" selected="selected">Выберите условие</option>
                        <?php foreach ($this->elements as $element):?>
                            <option value="<?=$element->id?>">
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
        </form>
        <div class="filterForm__containerElements m-hiddenFilterElements">    
            <?php foreach ($this->elements as $element) {
                $element->renderElement();
            }?>
        </div>
    </div>

</div>