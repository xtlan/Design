<?php
Yii::app()->clientScript->registerScriptFile(GetUrl::assetsUrl('design_webroot') . '/js/libs/jquery-ui-1.10.3.custom.js');
Yii::app()->clientScript->registerScriptFile(GetUrl::assetsUrl('design_webroot') . '/js/libs/jquery.cookie.js');

Yii::app()->clientScript->registerScriptFile(GetUrl::assetsUrl('design_webroot') . '/js/views/layout/operatorInfoTable/OperatorInfoTable.js');
Yii::app()->clientScript->registerScriptFile(GetUrl::assetsUrl('design_webroot') . '/js/views/layout/sort/SortTableView.js');
Yii::app()->clientScript->registerScriptFile(GetUrl::assetsUrl('design_webroot') . '/js/views/layout/actionBtns/ActionBtnView.js');
Yii::app()->clientScript->registerScriptFile(GetUrl::assetsUrl('design_webroot') . '/js/views/layout/actionBtns/ConfirmDeleteView.js');
?>
<div class="mainContent__actionBtns">

    <div class="tableSortBtns">
        <button class="saveSortBtn actionActiveBtn" data-urlSort="<?=GetUrl::url('saveSort')?>">Сохранить</button>
        <button class="cancelSortBtn actionDefaultBtn">Отменить</button>
    </div>
    <div class="tableActionBtns">
         <?php foreach ($this->menuButtons as $menuButton) {
            $menuButton->render();
        }?>
    </div>
    <?php if (isset($this->sort)):?>
        <?php $this->sort->render()?>
    <?php endif;?>

</div>

<?php if (!empty($this->dataProvider->rows)):?>

<div class="tableViewContainer">
    <div class="tableView" data-beginSort="<?=$this->getBeginSort()?>">

        <?php if (isset($prevRow)) : ?>
            <div class="tableView__row otherPage___row">
                <div class="tableView__col">
                    <input class="f-choseTableView__checkbox" type="checkbox" value="<?=$prevRow->id?>" />
                </div>
                <?php if (isset($this->titleRow)) : ?>
                    <?php $this->titleRow->render($prevRow); ?>
                <?php endif; ?>

                <div class="tableView__subRow">
                    <?php foreach ($this->columns as $column):?>
                        <?php $column->render($prevRow)?>
                    <?php endforeach;?>
                </div>
                <div class="tableView__containerBtns">
                    <div class="tableViewInfo__controlBtn">
                        <?php foreach ($this->rowButtons as $button) {
                            $button->render($prevRow);
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
            <?php if (isset($this->titleRow)) : ?>
                <?php $this->titleRow->render($row); ?>
            <?php endif; ?>
            <div class="tableView__subRow">
                <?php foreach ($this->columns as $column):?>
                    <?php $column->render($row)?>
                <?php endforeach;?>
            </div>
            <div class="tableView__containerBtns">
                <div class="tableViewInfo__controlBtn">
                    <?php foreach ($this->rowButtons as $button) {
                        $button->render($row);
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
                <?php if (isset($this->titleRow)) : ?>
                    <?php $this->titleRow->render($nextRow); ?>
                <?php endif; ?>
                <div class="tableView__subRow">
                    <?php foreach ($this->columns as $column):?>
                        <?php $column->render($nextRow)?>
                    <?php endforeach;?>
                </div>
                <div class="tableView__containerBtns">
                    <div class="tableViewInfo__controlBtn">
                        <?php foreach ($this->rowButtons as $button) {
                            $button->render($nextRow);
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



