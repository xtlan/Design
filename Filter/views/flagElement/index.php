<div class="filterForm__col" data-id="<?=$this->id?>" data-type="<?= Design\Filter\FlagElement::TYPE?>">
    <?= \CHtml::dropDownList(CHtml::activeName($this->_model, $this->_field), null, $options, array('id' => 'f-filterFlagList', 'class' => 'chosen-single'))?>
</div>
