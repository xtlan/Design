<?php
Yii::app()->clientScript->registerPackage('design.chosen');
Yii::app()->clientScript->registerCssFile(GetUrl::assetsUrl('design_webroot').'/css/jqueryUI/jquery.tooltip.css');
Yii::app()->clientScript->registerScriptFile(GetUrl::assetsUrl('design_webroot') . '/js/libs/jquery.tooltip.js');
Yii::app()->clientScript->registerScriptFile(GetUrl::assetsUrl('design_webroot') . '/js/views/layout/actionBtns/ActionBtnView.js');
Yii::app()->clientScript->registerScriptFile(GetUrl::assetsUrl('design_webroot') . '/js/views/layout/actionBtns/ConfirmDeleteView.js');
Yii::app()->clientScript->registerScriptFile(GetUrl::assetsUrl('design_webroot') . '/js/views/layout/addSelectOption/AddSelectOption.js');
?>
<div class="viewFieldSet__content__row">
    
    <?=$this->render('textField/label')?>
    <div class="viewFieldSet__content__desc m-addOptionsInSelect">
        <!-- Выпадающий список -->
        <?php echo CHtml::dropDownList(
            $this->inputName,
            $this->value,
            $this->options,
            array_merge(
                $this->htmlOptions,
                array(
                    'id' => $this->inputId,
                    'prompt' => $this->isEmpty ? $this->prompt : null,
                    'class' => 'f-fieldSetList ' . $this->htmlOptions['class']
                )
            )
        );?>
        <button class="m-addOptionBtn deleteFilterKey" title="Добавить группу"></button>

        <div class="popupContainer"><!-- Then popup init add class to <body> (.m-overlay) -->

            <!-- Error popup (start) -->
            <div class="addOptionPopup popup">
                <a class="a-popup__close" href="" title=""></a>
                <h3>Добавить пункт в список</h3>
                <input class="f-fieldSetText" type="text" />
                <footer class="deleteOperatorPopup__footer">
                    <button data-url="<?= $this->url?>" class="confirmAddOptionBtn">Добавить</button>
                    <button class="negativeDeleteBtn">Отменить</button>
                </footer>
            </div>
            <!-- Error popup (end) -->
        </div>
    </div>
</div>