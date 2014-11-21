<?php
use yii\helpers\Html;
?>
<div class="viewFieldSet__content__row">
    <?=$this->render(
        '../textField/label',
        [
            'inputId' => $inputId,
            'label' => $label
        ]
    )?>
    <div class="viewFieldSet__content__desc">
        <!-- Чекбокс -->
        <?php echo Html::checkBox($inputName, $value, 
            array_merge(
                $htmlOptions,
                array(
                    'id' => $inputId,
                    'value' => 1,
                    'uncheckValue' => 0,
                    'class' => 'f-fieldSetCheck ' . $htmlOptions['class']
                )
            )
        );?>
    </div>
</div>