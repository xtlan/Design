<?php
    /* @var $this \yii\web\View */
    use yii\helpers\Html;
?>
<?= Html::beginForm($url, 'post', ['id' => 'addDataForm']) ?>
    <input class="addBtn actionActiveBtn" type="submit" value="Добавить" />
<?= Html::endForm() ?>
