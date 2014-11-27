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
        <!-- Password -->
        <?php echo Html::passwordInput(
            $inputName,
            '',
            ArrayHelper::merge(
                $htmlOptions,
                array(
                    'id' => $inputId,
                    'class' => 'f-fieldSetPass ' . $htmlOptions['class']
                )
            )
        ); ?>
    </div>
</div>