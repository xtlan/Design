<?php
use yii\helpers\Html;
use Xtlan\Core\Validator\IntegerArrayValidator;

/* @var $this yii\web\View */
?>

<!-- На случай пустого, показываем, что мы изменили значение -->
<?=Html::hiddenInput($inputName, IntegerArrayValidator::EMPTY_ARRAY)?>

<div class="viewFieldSet__content__row">
    <?=$this->render(
        '../textField/label',
        [
            'inputId' => $inputId,
            'label'   => $label
        ]
    )?>
    <?php if (!empty($errors)) : ?>
        <p>Обнаружена ошибка</p>
    <?php endif; ?>
    <div class="viewFieldSet__content__desc">
        <?=Html::dropDownList(
                $inputName . '[]',
                $value,
                $options,
                array(
                    'class' => 'chosen',
                    'multiple' => true,
                    'style' => 'height:100px',
                    'data-placeholder' => $placeholder
                )
            );
        ?>
    </div>
</div>
