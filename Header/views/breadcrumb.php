<nav id="breadcrumb">
    <p>
        <?php foreach ($links as $key => $link):?>
            <?php if (!$breadcrumbHelper->isLastKey($key)) :?>
                <a href="<?=$link->aUrl->url?>" title=""><?=CHtml::encode($link->title)?></a> →
            <?php else:?>
            <?=CHtml::encode($link->title)?>
            <?php endif;?>
        <?php endforeach;?>
    </p>
</nav>