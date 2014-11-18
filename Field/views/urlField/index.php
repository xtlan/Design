<div class="viewFieldSet__content__row">
    <?=$this->render('textField/label')?>
    <div class="viewFieldSet__content__desc">
        <!-- URl -->
        <?php echo  CHtml::tag(
            'input',
            array_merge(
                $this->htmlOptions,
                array(
                    'type' => 'url',
                    'class' => 'f-fieldSetUrl ' . $this->htmlOptions['class'],
                    'id' => $this->inputId,
                    'value' => $this->value,
                    'name' => $this->inputName
                )
            )
        ); ?>
    </div>
</div>
