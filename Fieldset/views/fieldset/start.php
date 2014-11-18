<?php
Yii::app()->clientScript->registerPackage('design.chosen');
Yii::app()->clientScript->registerPackage('jquery.ui');
Yii::app()->clientScript->registerScriptFile(GetUrl::assetsUrl('design_webroot').'/js/views/layout/fieldSet/FieldSet.js');
Yii::app()->clientScript->registerScriptFile(GetUrl::assetsUrl('design_webroot').'/js/views/layout/fieldSet/EditSet.js');
?>
<div class="viewFieldSet">
    <?php if ($this->showLabel == true):?>
        <h2 class="viewFieldSet__title pseudo_link"><?=$label?></h2>
    <?php endif;?>
    <div class="viewFieldSet__content <?= ($this->showContent == true) ? 'viewFieldSet__enabled' : '' ?>">
