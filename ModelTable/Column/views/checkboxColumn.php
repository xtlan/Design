<?php
use yii\helpers\Html;
/* @var $this \yii\web\View */

?>
<div class="tableView__subRow__col" style="<?= isset($width) ? 'width: ' . $width : ''?>">
    <h3 class="tableView__subRow__col__title"><?=$label?></h3>
    <p>
        <?=Html::checkbox('', $value, array('disabled' => true))?>
    </p>
</div>
