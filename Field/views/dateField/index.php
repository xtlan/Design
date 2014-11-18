<div class="viewFieldSet__content__row">
    <?=$this->render('textField/label')?>
    <div class="viewFieldSet__content__desc">
        <!-- Датапикер -->
        <?php echo CHtml::activeTextField(
                $this->model,
                $this->field,
                array_merge(
                    $this->htmlOptions,
                    array(
                        'id' => $this->inputId,
                        'class' => 'f-fieldSetDate ' . $this->htmlOptions['class'],
                        'value' => Yii::app()->dateHelper->formatWeb($this->value),
                    )
                )
            );
        ?>
    </div>
</div>
