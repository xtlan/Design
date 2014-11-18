<li class="<?= ($this->context->active) ? 'openSubList' : ''?>">
    <a class="mainNav__list__link" href="" title=""><?=$label?></a>
    <ul class="mainNav__sublist">
        <?php foreach ($links as $link):?>
            <li class="<?= ($link->url->isCurrent()) ? 'active' : ''?>">
                <a href="<?=$link->url->string?>" title="">
                    <?=$link->title?>
                </a>
            </li>
        <?php endforeach;?>
    </ul>
</li>
