<?php 
use Xtlan\Core\Helper\ArrayHelper;
use yii\helpers\Html;

/* @var $this \yii\web\View */

?>
<nav id="breadcrumb">
    <p>
        <?php foreach ($links as $key => $link):?>
            <?php if (!ArrayHelper::isLastKey($links, $key)) :?>
                <a href="<?=$link->url->string?>" title=""><?=Html::encode($link->title)?></a> →
            <?php else:?>
            <?=Html::encode($link->title)?>
            <?php endif;?>
        <?php endforeach;?>
    </p>
</nav>
