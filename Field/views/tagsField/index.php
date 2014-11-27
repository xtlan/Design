<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
?>
<p>
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

    <div class="tags">
        <?php foreach($value as $val => $name) : ?>
            <?php $this->render('_template', array('name' => Html::encode($name), 'value' => $val))?>
        <?php endforeach; ?>
        <input url_t="<?=$urlList?>" name_t="<?=$inputName?>" class="selects" placeholder="<?=$label?>" 
            data-template="
                <?php $this->render('_template', array('name' => '${name}', 'value' => '${value}'))?>
            "
        />
    </div>
</p>
