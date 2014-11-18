<div class="viewFieldSet__content__row">
    <?=$this->render('textField/label')?>
    <div class="viewFieldSet__content__desc">
        <!-- Числовое полe -->
        <?php echo CHtml::tag(
            'input',
            array_merge(
                $this->htmlOptions,
                array(
                    'type' => 'number',
                    'name' => $this->inputName,
                    'id' => $this->inputId,
                    'value' => $this->value,
                    'class' => 'f-fieldSetLimit ' . $this->htmlOptions['class']
                )
            )
        ); ?>
    </div>
</div>
