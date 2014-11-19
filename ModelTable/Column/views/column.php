<?php
/* @var $this \yii\web\View */

?>
<div class="tableView__subRow__col" style="<?= isset($width) ? 'width: ' . $width : ''?>">
    <h3 class="tableView__subRow__col__title"><?=$label;?></h3>
    <p><?=$callback($row)?></p>
</div>
