
<div class="filterForm__col" data-id="<?=$this->id?>" data-type="<?= Design\Filter\DateRangeElement::TYPE?>">
    <label for="f-dateStart">От</label>
    <input id="f-dateStart" class="chosen-single" name="<?= \CHtml::activeName($this->_model, $startField)?>" type="text" />
    <label for="f-dateEnd">До</label>
    <input id="f-dateEnd" class="chosen-single" name="<?= \CHtml::activeName($this->_model, $endField)?>" type="text" />
</div>
