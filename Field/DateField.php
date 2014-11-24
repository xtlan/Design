<?php

namespace Xtlan\Design\Field;

/**
 * DateField
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */

class DateField extends AbstractModelField
{

    /**
     * run
     *
     * @return void
     */
    public function run() 
    {
        return $this->render(
            'dateField/index',
            [
                'model'       => $this->model,
                'field'       => $this->field,
                'htmlOptions' => $this->htmlOptions,
                'inputId'     => $this->inputId,
                'value'       => $this->value,
                'label'       => $this->label
            ]
        );
    }
}