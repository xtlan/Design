<?php
use yii\helpers\Html;
use Xtlan\Design\Asset\DesignAsset;
use Xtlan\Core\Helper\GetUrl;
use Xtlan\Design\Asset\ChosenAsset;
use yii\web\View;

ChosenAsset::register($this);
$this->registerCssFile(GetUrl::assetsUrl($this, DesignAsset::className(), 'css/jqueryUI/jquery.tooltip.css'));
$this->registerJsFile(GetUrl::assetsUrl($this, DesignAsset::className(), 'js/libs/jquery.tooltip.js'));
$this->registerJsFile(GetUrl::assetsUrl($this, DesignAsset::className(), 'js/views/layout/actionBtns/ActionBtnView.js'));
$this->registerJsFile(GetUrl::assetsUrl($this, DesignAsset::className(), 'js/views/layout/actionBtns/ConfirmDeleteView.js'));
$this->registerJsFile(GetUrl::assetsUrl($this, DesignAsset::className(), '/js/views/layout/addSelectOption/AddSelectOption.js'));
?>
<div class="viewFieldSet__content__row">
    
    <?=$this->render(
        '../textField/label',
        [
            'inputId' => $inputId,
            'label'   => $label
        ]
    )?>
    <div class="viewFieldSet__content__desc m-addOptionsInSelect">
        <!-- Выпадающий список -->
        <?php echo Html::dropDownList(
            $inputName,
            $value,
            $options,
            array_merge(
                $htmlOptions,
                array(
                    'id' => $inputId,
                    'prompt' => $isEmpty ? $prompt : null,
                    'class' => 'f-fieldSetList ' . $htmlOptions['class']
                )
            )
        );?>
        <button class="m-addOptionBtn deleteFilterKey" title="Добавить группу"></button>

        <div class="popupContainer"><!-- Then popup init add class to <body> (.m-overlay) -->

            <!-- Error popup (start) -->
            <div class="addOptionPopup popup">
                <a class="a-popup__close" href="" title=""></a>
                <h3>Добавить пункт в список</h3>
                <input class="f-fieldSetText" type="text" />
                <footer class="deleteOperatorPopup__footer">
                    <button data-url="<?= $url?>" class="confirmAddOptionBtn">Добавить</button>
                    <button class="negativeDeleteBtn">Отменить</button>
                </footer>
            </div>
            <!-- Error popup (end) -->
        </div>
    </div>
</div>