<li class="<?= ($this->_active) ? 'openSubList' : ''?>">
    <a class="mainNav__list__link" href="" title=""><?=$this->label?></a>
    <ul class="mainNav__sublist">
        <?php foreach ($this->links as $link):?>
            <li class="<?= ($link->aUrl->isCurrent()) ? 'active' : ''?>">
                <a href="<?=$link->aUrl->url?>" title="">
                    <?=$link->title?>
                </a>
            </li>
        <?php endforeach;?>
    </ul>
</li>
