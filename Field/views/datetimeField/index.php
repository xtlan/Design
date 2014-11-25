<?php
use yii\helpers\Html;
use Xtlan\Design\Asset\DesignAsset;
use Xtlan\Core\Helper\GetUrl;
use Xtlan\Design\Asset\TimeAsset;

TimeAsset::register($this);
?>
<div class="viewFieldSet__content__row">
    <?=$this->render(
        '../textField/label',
        [
            'inputId' => $inputId,
            'label'   => $label
        ]
    )?>
    <div class="viewFieldSet__content__desc">
        <div class="date__container">
            <?php echo Html::textInput(
                $dateName, 
                $dateValue,
                array_merge(
                    $htmlOptions,
                    array(
                        'rel' => '',
                        'id' => $dateId,
                        'class' => 'f-fieldSetText f-fieldSetDate'
                    )
                )
            ); ?>
        </div>
        <div class="time-container border-calendar" >
            <?php echo Html::textInput(
                $timeName, 
                $timeValue,
                array_merge(
                    $htmlOptions,
                    array(
                        'rel' => 'time',
                        'id' => $timeId,
                        'time' => $timeValue,
                        'class' => 'f-fieldSetText'
                    )
                )
            ); ?>
            <img src="<?=GetUrl::assetsUrl($this, DesignAsset::className(), 'i/clock.png')?>" class="select-time">
            <div class="time">
                <div class="up"></div>
                <div class="container">
                    <table></table>
                </div>
                <div class="down"></div>
            </div>
        </div>
    </div>
</div>
