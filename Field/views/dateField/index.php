<?php
use yii\helpers\Html;
use Xtlan\Core\Helper\DateHelper;
?>
<div class="viewFieldSet__content__row">
    <?=$this->render(
        '../textField/label',
        [
            'inputId' => $inputId,
            'label'  => $label
        ]
    )?>
    <div class="viewFieldSet__content__desc">
        <!-- Датапикер -->
        <?php echo Html::activeTextInput(
                $model,
                $field,
                array_merge(
                    $htmlOptions,
                    array(
                        'id' => $inputId,
                        'class' => 'f-fieldSetDate ' . $htmlOptions['class'],
                        'value' => DateHelper::formatWeb($value),
                    )
                )
            );
        ?>
    </div>
</div>