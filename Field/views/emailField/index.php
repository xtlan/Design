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
        <?php echo Html::tag(
            'input',
            '',
            ArrayHelper::merge(
                $htmlOptions,
                array(
                    'type'    => 'email',
                    'name'    => $inputName,
                    'id'      => $inputId,
                    'value'   => Html::encode($value),
                    'class'   => 'f-fieldSetEmail ' . $htmlOptions['class'],
                )
            )
        ); ?>
    </div>
</div>