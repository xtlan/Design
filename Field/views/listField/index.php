<?php
Yii::app()->clientScript->registerPackage('design.chosen');
?>
<div class="viewFieldSet__content__row">
    <?=$this->render('textField/label')?>
    <div class="viewFieldSet__content__desc <?= (isset($this->htmlOptions['class']) ? $this->htmlOptions['class'] : '') ?>">
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
                    'class' => 'f-fieldSetList '
                )
            )
        );?>
    </div>
</div>