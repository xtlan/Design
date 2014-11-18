<?php
Yii::app()->clientScript->registerPackage('design.time');
?>
<div class="viewFieldSet__content__row">
<?=$this->render('textField/label')?>
    <div class="viewFieldSet__content__desc">
        <div class="date__container">
            <?php echo CHtml::textField(
                $dateName, 
                $dateValue,
                array_merge(
                    $this->htmlOptions,
                    array(
                        'rel' => '',
                        'id' => $dateId,
                        'class' => 'f-fieldSetText f-fieldSetDate'
                    )
                )
            ); ?>
        </div>
        <div class="time-container border-calendar" >
            <?php echo CHtml::textField(
                $timeName, 
                $timeValue,
                array_merge(
                    $this->htmlOptions,
                    array(
                        'rel' => 'time',
                        'id' => $timeId,
                        'time' => $timeValue,
                        'class' => 'f-fieldSetText'
                    )
                )
            ); ?>
            <img src="<?=GetUrl::assetsUrl('admin.modules.design.webroot')?>/i/clock.png" class="select-time">
        	<div class="time">
        		<div class="up"></div>
        		<div class="container">
        			<table>
                        
        			</table>
        		</div>
        		<div class="down"></div>
        	</div>
        </div>
    </div>
</div>
