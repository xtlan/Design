
<?=CHtml::hiddenField($this->inputName)?>

<?php foreach ($this->options as $id => $label) : ?>
    <div class="viewFieldSet__content__row">
        <div class="viewFieldSet__content__label">
            <p><label for="<?=$this->inputName?>_<?=$id?>"><?=$label?></label></p>
        </div>
        <div class="viewFieldSet__content__desc">
            <input 
                id="<?=$this->inputName?>_<?=$id?>"
                value="<?=$id?>" type="checkbox" 
                name="<?=$this->inputName?>[]" 
                <?= in_array($id, $this->value) ? 'checked="checked"'  : '' ?> 
            />
        </div>
    </div>
<?php endforeach; ?>