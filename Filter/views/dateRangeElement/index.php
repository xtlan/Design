<?php
use yii\helpers\Html;
/* @var $this \yii\web\View */
?>
<div class="filterForm__col" data-id="<?=$id?>" data-type="<?= $this->context->getType()?>">
    <label for="f-dateStart">От</label>
    <input id="f-dateStart" class="chosen-single" name="<?= Html::getInputName($model, $startField)?>" type="text" />
    <label for="f-dateEnd">До</label>
    <input id="f-dateEnd" class="chosen-single" name="<?= Html::getInputName($model, $endField)?>" type="text" />
</div>
