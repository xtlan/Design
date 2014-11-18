<div class="tableView__subRow__col" style="<?= isset($this->width) ? 'width: ' . $this->width : ''?>">
    <h3 class="tableView__subRow__col__title"><?=$this->label;?></h3>
    <p>
        <a class="a-changeFromList" data-url="<?=  GetUrl::url($this->url, array('id' => $row->id))?>" href="" title=""><?= $row->$fieldAlias?></a>
        <?php
        echo CHtml::activeDropDownList(
            $row,
            $field,
            $this->options,
            array_merge(
                $this->htmlOptions,
                array(
                    'id' => $row->id,
                    'prompt' => $this->isEmpty ? $this->prompt : null,
                    'class' => 'f-fieldSetList chosen' . $this->htmlOptions['class']
                )
            )
        );
        ?>
    </p>
</div>