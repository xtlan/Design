<div class="viewFieldSet__content__row">
    <?=$this->render('textField/label')?>

    <?php foreach ($this->errors as $error) : ?>
        <p class="error"><?=$error?></p>
    <?php endforeach; ?>
    <div class="viewFieldSet__content__desc">
        <!-- Большое текстовое поле -->
        <?php echo CHtml::textArea(
            $this->inputName,
            $this->value,
            array_merge(
                $this->htmlOptions,
                array(
                    'id' => $this->inputId,
                    'class' => 'f-fieldSetComment ' . (isset($this->htmlOptions['class']) ? $this->htmlOptions['class'] : '')
                )
            )
        ); ?>
    </div>
</div>