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
        <!-- Числовое полe -->
        <?php echo Html::tag(
            'input',
            '',
            ArrayHelper::merge(
                $htmlOptions,
                array(
                    'type'  => 'number',
                    'name'  => $inputName,
                    'id'    => $inputId,
                    'value' => $value,
                    'class' => 'f-fieldSetLimit ' . $htmlOptions['class']
                )
            )
        ); ?>
    </div>
</div>