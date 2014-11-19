<?php
use Xtlan\Design\Asset\DesignAsset;
use Xtlan\Core\Helper\GetUrl;
use yii\helpers\Url;

/* @var $this \yii\web\View */

$this->registerJsFile(GetUrl::assetsUrl($this, DesignAsset::className(), '/js/libs/jquery-ui-1.10.3.custom.js'));
$this->registerJsFile(GetUrl::assetsUrl($this, DesignAsset::className(), '/js/libs/jquery.cookie.js'));
$this->registerJsFile(GetUrl::assetsUrl($this, DesignAsset::className(), '/js/views/layout/operatorInfoTable/OperatorInfoTable.js'));
$this->registerJsFile(GetUrl::assetsUrl($this, DesignAsset::className(), '/js/views/layout/sort/SortTableView.js'));
$this->registerJsFile(GetUrl::assetsUrl($this, DesignAsset::className(), '/js/views/layout/actionBtns/ActionBtnView.js'));
$this->registerJsFile(GetUrl::assetsUrl($this, DesignAsset::className(), '/js/views/layout/actionBtns/ConfirmDeleteView.js'));
?>
<div class="mainContent__actionBtns">

    <div class="tableSortBtns">
        <button class="saveSortBtn actionActiveBtn" data-urlSort="<?=Url::toRoute('saveSort')?>">Сохранить</button>
        <button class="cancelSortBtn actionDefaultBtn">Отменить</button>
    </div>
    <div class="tableActionBtns">
         <?php foreach ($menuButtons as $menuButton) {
            echo $menuButton->getResult();
        }?>
    </div>
    <?php if (isset($sort)):?>
        <?= $sort->getResult()?>
    <?php endif;?>

</div>

<?php if (!empty($dataProvider->models)):?>

<div class="tableViewContainer">
    <div class="tableView" data-beginSort="<?=$this->getBeginSort()?>">

        <?php if (isset($prevRow)) : ?>
            <div class="tableView__row otherPage___row">
                <div class="tableView__col">
                    <input class="f-choseTableView__checkbox" type="checkbox" value="<?=$prevRow->id?>" />
                </div>
                <?php if (isset($titleRow)) : ?>
                    <?= $titleRow->getResult($prevRow); ?>
                <?php endif; ?>

                <div class="tableView__subRow">
                    <?php foreach ($columns as $column):?>
                        <?= $column->getResult($prevRow)?>
                    <?php endforeach;?>
                </div>
                <div class="tableView__containerBtns">
                    <div class="tableViewInfo__controlBtn">
                        <?php foreach ($rowButtons as $button) {
                            echo $button->getResult($prevRow);
                        }?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        
        <?php foreach ($rows as $key => $row) :?>
        <div class="tableView__row">
            <div class="tableView__col">
                <input class="f-choseTableView__checkbox" type="checkbox" value="<?=$row->id?>" />
            </div>
            <?php if (isset($titleRow)) : ?>
                <?= $titleRow->getResult($row); ?>
            <?php endif; ?>
            <div class="tableView__subRow">
                <?php foreach ($columns as $column):?>
                    <?= $column->getResult($row)?>
                <?php endforeach;?>
            </div>
            <div class="tableView__containerBtns">
                <div class="tableViewInfo__controlBtn">
                    <?php foreach ($rowButtons as $button) {
                        echo $button->getResult($row);
                    }?>
                </div>
            </div>
        </div>
        <?php endforeach?>

        <?php if (isset($nextRow)) : ?>
            <div class="tableView__row otherPage___row">
                <div class="tableView__col">
                    <input class="f-choseTableView__checkbox" type="checkbox" value="<?=$nextRow->id?>" />
                </div>
                <?php if (isset($titleRow)) : ?>
                    <?= $titleRow->getResult($nextRow); ?>
                <?php endif; ?>
                <div class="tableView__subRow">
                    <?php foreach ($columns as $column):?>
                        <?= $column->getResult($nextRow)?>
                    <?php endforeach;?>
                </div>
                <div class="tableView__containerBtns">
                    <div class="tableViewInfo__controlBtn">
                        <?php foreach ($rowButtons as $button) {
                            echo $button->getResult($nextRow);
                        }?>
                    </div>
                </div>
            </div>
            
    <?php endif; ?>
        </div>
        <!-- Popups (start) -->
        <div id="popupContainer"><!-- Then popup init add class to <body> (.m-overlay) -->

            <!-- Error popup (start) -->
            <div class="deleteOperatorPopup popup">
                <a class="a-popup__close" href="" title=""></a>
                <p class="deleteOperatorPopup__msg">Вы действительно хотите удалить выделенные элементы?</p>
                <footer class="deleteOperatorPopup__footer">
                    <button class="confirmDeleteBtn">Да</button>
                    <button class="negativeDeleteBtn">Нет</button>
                </footer>
            </div>
            <!-- Error popup (end) -->

        </div>
        <!-- Popups (end) -->
</div>

<?php else:?>
    <p class="alertMessage">Нет данных</p>
<?php endif; ?>



