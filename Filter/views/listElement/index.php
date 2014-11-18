<div class="filterForm__col" data-id="<?=$this->id?>" data-type="<?= Design\Filter\ListElement::TYPE?>">
    <?= \CHtml::dropDownList(CHtml::activeName($this->_model, $this->_field), null, $options, array('id' => 'f-filterKeyList', 'prompt' => $prompt, 'class' => 'chosen-single'))?>
</div>
