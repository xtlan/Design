<?php 
use Xtlan\Design\Asset\DesignAsset;
use Xtlan\Core\Helper\GetUrl;
use yii\helpers\Html;

/* @var $this \yii\web\View */

$this->registerJsFile(GetUrl::assetsUrl($this, DesignAsset::className(), '/js/views/layout/headerTitle/HeaderTitleView.js'));
?>
<h1 class="<?=empty($links) ? 'emptyList__title' : ''?> mainContent__title"><?=$this->title?></h1>

<?php if (!empty($links)) : ?>
    <ul class="action__list">
    <?php foreach ($links as $link) : ?>
        <li><?=Html::a($link->title, $link->url->string)?></li>
    <?php endforeach; ?>
    </ul> 
<?php endif; ?>

