<p class="filterValue__text" data-id="<?=$this->id?>">
    <?="$title: "?><span class="filterValue__saveText"><?=$this->startEndString?></span>
    <i class="i-deleteFilter"></i>
    <?=\CHtml::activeHiddenField($this->_model, $startField, array('class' => 'hidden__startDate'))?>
    <?=\CHtml::activeHiddenField($this->_model, $endField, array('class' => 'hidden__endDate'))?>
</p>