<div class="viewFieldSet__content__row">
    <?=$this->render('textField/label')?>
    <div class="viewFieldSet__content__desc">
        <!-- Чекбокс -->
        <?php echo CHtml::checkBox($this->inputName, $this->value, 
            array_merge(
                $this->htmlOptions,
                array(
                    'id' => $this->inputId,
                    'value' => 1,
                    'uncheckValue' => 0,
                    'class' => 'f-fieldSetCheck ' . $this->htmlOptions['class']
                )
            )
        ); ?>
    </div>
</div>
