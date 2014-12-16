<?php
use yii\helpers\Html;
/* @var $this \yii\web\View */
?>
<p class="filterValue__text" data-id="<?=$id?>">
    <?="$title: "?><span class="filterValue__saveText"><?=$startEndString?></span>
    <i class="i-deleteFilter"></i>
    <?=Html::activeHiddenInput($model, $startField, array('class' => 'hidden__startDate'))?>
    <?=Html::activeHiddenInput($model, $endField, array('class' => 'hidden__endDate'))?>
</p>
