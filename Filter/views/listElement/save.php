<?php
use yii\helpers\Html;
/* @var $this \yii\web\View */
?>
<p class="filterValue__text" data-id="<?=$id?>">
    <?="$title :"?> <span class="filterValue__saveText"><?="$value"?></span> 
    <i class="i-deleteFilter"></i>
    <?= Html::activeHiddenInput($model, $field)?>
</p>
