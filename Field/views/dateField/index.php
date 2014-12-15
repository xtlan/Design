<?php
use yii\helpers\Html;
use Xtlan\Design\Asset\DesignAsset;
use Xtlan\Design\Asset\JuiAsset;
use Xtlan\Core\Helper\GetUrl;

$this->registerJsFile(GetUrl::assetsUrl($this, DesignAsset::className(), 'js/views/layout/fieldSet/EditSet.js'));
JuiAsset::register($this);
?>
<div class="viewFieldSet__content__row">
    <?=$this->render(
        '../textField/label',
        [
            'inputId' => $inputId,
            'label'  => $label
        ]
    )?>
    <div class="viewFieldSet__content__desc">
        <!-- Датапикер -->
        <?php echo Html::activeTextInput(
                $model,
                $field,
                array_merge(
                    $htmlOptions,
                    array(
                        'id' => $inputId,
                        'class' => 'f-fieldSetDate ' . $htmlOptions['class'],
                        'value' => Yii::$app->dateFormatter->formatWeb($value)
                    )
                )
            );
        ?>
    </div>
</div>