<?php
use yii\helpers\Html;
use Xtlan\Design\Asset\DesignAsset;
use Xtlan\Core\Helper\GetUrl;
use yii\web\View;
/* @var $this \yii\web\View */

if ($fck) {
    $this->registerJsFile(GetUrl::assetsUrl($this, DesignAsset::className(), 'js/libs/ckeditor/ckeditor.js'));
    $this->registerJsFile(GetUrl::assetsUrl($this,  DesignAsset::className(), 'js/libs/ckeditor/adapters/jquery.js'));
    $this->registerJs( 
        "jQuery(document).ready(function () {
            jQuery('textarea.ckedit').ckeditor(function() {
                toolbar : 'MyToolbar'
            });
        });",
        View::POS_END,
        'fck_textarea');
}
?>

<div class="viewFieldSet__content__row">
    <?=$this->render(
        '../textField/label', 
        [
            'inputId' => $inputId,
            'label' => $label
        ]
    )?>

    <?php foreach ($errors as $error) : ?>
        <p class="error"><?=$error?></p>
    <?php endforeach; ?>
    <div class="viewFieldSet__content__desc">
        <!-- Большое текстовое поле -->
        <?php echo Html::textArea(
            $inputName,
            $value,
            array_merge(
                $htmlOptions,
                array(
                    'id' => $inputId,
                    'class' => 'f-fieldSetComment ' . $htmlOptions['class'] . ($fck ? ' ckedit' : '')
                )
            )
        ); ?>
    </div>
</div>
