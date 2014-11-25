<?php
/**
 * DatetimeField
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
namespace Xtlan\Design\Field;
use Yii;

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
        $nameModel = $this->model->formName();
        $field = $this->field;


        //Создаем имя и ид для поля дейт от датетайм
        $dateId = "{$nameModel}_{$field}_date";
        $dateName = "{$nameModel}[{$field}Date]";
        $dateValue = Yii::$app->dateFormatter->formatWeb($this->value);
        
        //Создаем имя и ид для поля дейт от датетайм
        $timeId = "{$nameModel}_{$field}_time";
        $timeName = "{$nameModel}[{$field}Time]";
        $timeValue = Yii::$app->datetimeFormatter->formatTime($this->value);

        
        return $this->render(
            'datetimeField/index', 
            [
                'model'       => $this->model,
                'field'       => $this->field,
                'htmlOptions' => $this->htmlOptions,
                'inputId'     => $this->inputId,
                'value'       => $this->value,
                'label'       => $this->label,
                'dateId'      => $dateId,
                'dateName'    => $dateName,
                'dateValue'   => $dateValue,

                'timeId'      => $timeId,
                'timeName'    => $timeName,
                'timeValue'   => $timeValue
            ]
        );
    }
}
