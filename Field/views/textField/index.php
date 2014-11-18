<div class="viewFieldSet__content__row">
    <?=$this->render('textField/label')?>
    <div class="viewFieldSet__content__desc">
        <!-- Текстовое поле -->
            <?php echo CHtml::textField(
                $this->inputName, 
                Text::encode($this->value),
                CMap::mergeArray(
                    $this->htmlOptions,
                    array(
                        'id' => $this->inputId,
                        'class' => 'f-fieldSetText ' . $this->htmlOptions['class']
                    )
                )
        ); ?>
    </div>
</div>
