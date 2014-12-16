<?php
use yii\helpers\Html;
/* @var $this \yii\web\View */
?>
<div class="filterForm__col" data-id="<?=$id?>" data-type="<?= $this->context->getType()?>">
    <?= Html::activeDropDownList($model, $field, $options, array('id' => 'f-filterKeyList', 'prompt' => $prompt, 'class' => 'chosen-single'))?>
</div>
