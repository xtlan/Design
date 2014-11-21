<?php
    use Xtlan\Design\Asset\DesignAsset;
    use Xtlan\Core\Helper\GetUrl;

    /* @var $this \yii\web\View */

    $this->registerJsFile(GetUrl::assetsUrl($this, DesignAsset::className(), 'js/views/layout/systemMessage.js'));
?>

<div class="alert">
    <script id="errorAlert" type="text/template">
        <p class="systemMessage error"><%= msg %><i class="i-closeMessage"></i></p>
    </script>
    <script id="successAlert" type="text/template">
        <p class="systemMessage success"><%= msg %><i class="i-closeMessage"></i></p>    
    </script>
</div>



<script>
jQuery(document).ready(function() {
    <?php foreach ($flashes as $key => $msg) : ?>
        systemMessage.show('<?=$msg?>', <?=$key == "error" ? "systemMessage.ERROR" : "systemMessage.INFO"?>);
    <?php endforeach; ?>
});
</script>
