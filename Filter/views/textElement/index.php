<?php
use yii\helpers\Html;
/* @var $this \yii\web\View */
?>
<div class="filterForm__col" data-id="<?=$id?>" data-type="<?=$this->context->getType()?>">
    <input class="f-filterByKey chosen-single" name="<?= Html::getInputName($model, $field)?>" type="text">    
</div>
