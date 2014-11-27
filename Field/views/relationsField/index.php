<?php
use yii\helpers\Html;
use Xtlan\Core\Validator\IntegerArrayValidator;

/* @var $this yii\web\View */
?>

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
</div>

<!-- На случай пустого, показываем, что мы изменили значение -->
<?=Html::hiddenInput($inputName, IntegerArrayValidator::EMPTY_ARRAY)?>

<?php foreach ($options as $id => $label) : ?>
    <div class="viewFieldSet__content__row">
        <div class="viewFieldSet__content__label">
            <p><label for="<?=$inputName?>_<?=$id?>"><?=$label?></label></p>
        </div>
        <div class="viewFieldSet__content__desc">
            <input 
                id="<?=$inputName?>_<?=$id?>"
                value="<?=$id?>" type="checkbox" 
                name="<?=$inputName?>[]" 
                <?= in_array($id, $value) ? 'checked="checked"'  : '' ?> 
            />
        </div>
    </div>
<?php endforeach; ?>
