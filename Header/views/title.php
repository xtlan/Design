<?php 
Yii::app()->clientScript->registerScriptFile(GetUrl::assetsUrl('design_webroot').'/js/views/layout/headerTitle/HeaderTitleView.js');
?>
<h1 class="<?=empty($links) ? 'emptyList__title' : ''?> mainContent__title"><?=Yii::app()->controller->pageTitle?></h1>

<?php if (!empty($links)) : ?>
    <ul class="action__list">
    <?php foreach ($links as $link) : ?>
        <li><?=CHtml::link($link->title, $link->aUrl->url)?></li>
    <?php endforeach; ?>
    </ul> 
<?php endif; ?>

