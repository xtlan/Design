<?php
/**
 * DatetimeField
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
namespace Design\Field;

class DatetimeField extends AbstractModelField
{


    /**
     * run
     *
     * @return void
     */
    public function run()
    {
        //Если value не задан задаем его = текущему
        if (!isset($this->value)) {
            $this->value = time();
        }

        //Имя модели и поле
        $nameModel = $this->model->nameModel;
        $field = $this->field;


        //Создаем имя и ид для поля дейт от датетайм
        $dateId = "{$nameModel}_{$field}_date";
        $dateName = "{$nameModel}[{$field}_date]";
        $dateValue = \Yii::app()->dateHelper->formatWeb($this->value);
        
        //Создаем имя и ид для поля дейт от датетайм
        $timeId = "{$nameModel}_{$field}_time";
        $timeName = "{$nameModel}[{$field}_time]";
        $timeValue = \Yii::app()->datetimeHelper->formatTime($this->value);

        
        $this->render(
            'datetimeField/index', 
            array(
                'dateId'   => $dateId,
                'dateName' => $dateName,
                'dateValue' => $dateValue,

                'timeId'   => $timeId,
                'timeName' => $timeName,
                'timeValue' => $timeValue
            )
        );
    }

}
