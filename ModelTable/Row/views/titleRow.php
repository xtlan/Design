<?php
use yii\helpers\Html;
?>
<div class="tableView__subRow">
    <h3 class="tableView__subRow__title">
        <?=Html::a($title, $titleUrl, array(
            'class' => 'tableRow__link',
            'title' => 'Перейти к редактированию'
        ))?>
    </h3>
</div>
