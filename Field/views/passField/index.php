<div class="viewFieldSet__content__row">
    <?=$this->render('textField/label')?>
    <div class="viewFieldSet__content__desc">
        <!-- Password -->
        <?php echo CHtml::passwordField(
            $this->inputName,
            '',
            array_merge(
                $this->htmlOptions,
                array(
                    'id' => $this->inputId,
                    'class' => 'f-fieldSetPass ' . $this->htmlOptions['class']
                )
            )
        ); ?>
    </div>
</div>
