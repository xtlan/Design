<?php
use yii\helpers\Html;
use Xtlan\Core\Helper\ArrayHelper;
?>
<div class="viewFieldSet__content__row">
    <?=$this->render(
        '../textField/label',
        [
            'inputId' => $inputId,
            'label'   => $label
        ]
    )?>
    <div class="viewFieldSet__content__desc">
        <!-- Email -->
        <?php echo Html::textInput(
            $inputName,
            Html::encode($value),
            ArrayHelper::merge(
                $htmlOptions,
                array(
                    'id' => $inputId,
                    'class' => 'f-fieldSetEmail ' . $htmlOptions['class']
                )
            )
        ); ?>
    </div>
</div>