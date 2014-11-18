<div class="tableView__subRow__col" style="<?= isset($width) ? 'width: ' . $width : ''?>">
    <h3 class="tableView__subRow__col__title"><?=$this->getLabel($row)?></h3>
    <p>
        <?=CHtml::checkBox('', $value, array('disabled' => true))?>
    </p>
</div>
