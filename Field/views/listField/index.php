<?php
use yii\helpers\Html;
use Xtlan\Design\Asset\ChosenAsset;

ChosenAsset::register($this);
?>
<div class="viewFieldSet__content__row">
    <?=$this->render(
        '../textField/label',
        [
            'inputId' => $inputId,
            'label'   => $label
        ]
    )?>
    <div class="viewFieldSet__content__desc <?= (isset($htmlOptions['class']) ? $htmlOptions['class'] : '') ?>">
        <!-- Выпадающий список -->
        <?php echo Html::dropDownList(
            $inputName,
            $value,
            $options,
            array_merge(
                $htmlOptions,
                array(
                    'id' => $inputId,
                    'prompt' => $isEmpty ? $prompt : null,
                    'class' => 'f-fieldSetList '
                )
            )
        ); ?>
    </div>
</div>