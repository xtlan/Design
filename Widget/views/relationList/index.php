<?php
Yii::app()->clientScript->registerScriptFile(GetUrl::assetsUrl('design_webroot') . '/js/views/layout/fieldSet/relationList.js');
?>
<div class="viewFieldSet__col">  
    <div class="viewFieldSet">
        <div class="viewFieldSet__content createQuestionContent viewFieldSet__enabled">
            <div class="relationList m-relationList" id="relationList_<?=$this->nameRelation?>">
                <div class="viewFieldSet__content__row">
                    <div class="viewFieldSet__content__label">
                        <button class="addRelationList actionActiveBtn">Добавить</button>
                    </div>    
                </div>
                <?php foreach($items as $item) : ?>
                    <?php $this->render('relationList/_template', array('item' => $item))?>
                <?php endforeach; ?>
                <div class="templateRelationList" style="display:none;">
                    <?php $this->render('relationList/_template', array('item' => new $relationModel))?>
                </div>
            </div>
        </div>
    </div>    
</div>

<?php
Yii::app()->clientScript->registerScript(
    'relationList_' . $this->nameRelation, 
    "var widget = new relationList.Widget($('#relationList_" . $this->nameRelation . "'));",
    CClientScript::POS_READY
); 
?>

