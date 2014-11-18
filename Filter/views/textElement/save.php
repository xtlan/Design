<p class="filterValue__text" data-id="<?=$this->id?>">
    <?="$title :"?> <span class="filterValue__saveText"><?="$value"?></span> 
    <i class="i-deleteFilter"></i>
    <?= \CHtml::activeHiddenField($this->_model, $this->_field)?>
</p>