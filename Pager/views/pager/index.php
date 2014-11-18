<?php if (isset($decade)) : ?>
    <nav class="pagination">
        <?php if (isset($this->prevPage)) {
            $prevLink = $this->getUrl($this->prevPage);
            $prevClass = '';
            } else { 
            $prevLink = '#';
            $prevClass = 'disabled';
        }?>
        <a href="<?=$prevLink ?>" title="" class="pagination__prevBtn <?=$prevClass?>">←</a>

        <ul class="pagination__list">


            <?php if (!$decade->isFirst()) : ?>
                <li>
                    <a href="<?=$this->getUrl($this->startPage)?>">
                    1
                    </a>
                </li>
                <li>
                    <a href="<?=$this->getUrl($decade->startPage - 1)?>">
                    …
                    </a>
                </li>

            <?php endif; ?>

            <?php foreach ($decade->pages as $page) : ?>
                <li class="<?= ($page == $currentPage)? 'active' : '' ?>">
                    <a href="<?= $this->getUrl($page) ?>" title="">
                        <?= $page ?>
                    </a>
                </li>
            <?php endforeach; ?>
            
            <?php if (!$decade->isLast()) : ?>
                <li>
                    <a href="<?=$this->getUrl($decade->endPage + 1)?>">
                    …
                    </a>
                </li>
                <li>
                    <a href="<?=$this->getUrl($this->endPage)?>">
                    <?=$this->endPage?>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
        <?php if (isset($this->nextPage)) {
                $nextLink = $this->getUrl($this->nextPage);
                $nextClass = '';
            } else { 
                $nextLink = '#';
                $nextClass = 'disabled';
        }?>
        <a href="<?=$nextLink ?>" title="" class="pagination__nextBtn <?=$nextClass?>">→</a>
    </nav>
<?php endif; ?>
