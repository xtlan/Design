<?php
Yii::app()->clientScript->registerPackage('cms.tags'); 
?>
<p>
    <?=$this->render('textField/label')?>
    <div class="tags">
        <?php foreach($this->value as $value => $name) : ?>
            <?php $this->render('tagsField/_template', array('name' => CHtml::encode($name), 'value' => $value))?>
        <?php endforeach; ?>
        <input url_t="<?=$this->urlList?>" name_t="<?=$this->inputName?>" class="selects" placeholder="<?=$this->label?>" 
            data-template="
                <?php $this->render('tagsField/_template', array('name' => '${name}', 'value' => '${value}'))?>
            "
        />
    </div>
</p>
