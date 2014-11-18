<div class="viewFieldSet__content__row">
    <?=$this->render('textField/label')?>
    <div class="viewFieldSet__content__desc">
        <!-- Email -->
        <?php echo CHtml::activeEmailField(
            $this->model,
            $this->field,
            array_merge(
                $this->htmlOptions,
                array(
                    'id' => $this->inputId,
                    'class' => 'f-fieldSetEmail ' . $this->htmlOptions['class']
                )
            )
        ); ?>
    </div>
</div>
