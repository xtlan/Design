<?php
use Xtlan\Design\Filter\FlagElement;
use yii\helpers\Html;
/* @var $this \yii\web\View */
?>
<div class="filterForm__col" data-id="<?=$this->id?>" data-type="<?= FlagElement::TYPE?>">
    <?= Html::dropDownList(Html::getInputName($model, $field), null, $options, array('id' => 'f-filterFlagList', 'class' => 'chosen-single'))?>
</div>
