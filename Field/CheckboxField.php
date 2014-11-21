<?php

namespace Xtlan\Design\Field;

/**
 * CheckboxField
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */

class CheckboxField extends AbstractModelField
{

    /**
     * run
     *
     * @return void
     */
    public function run()
    {
        //Изменяем значение в случае -1 
        //(единица при следующем вызове)
        if ( $this->value == -1 ) {
            $this->value = 1;
        }

        return $this->render(
            'checkboxField/index',
            [
                'errors'      => $this->errors,
                'inputName'   => $this->inputName,
                'value'       => $this->value,
                'inputId'     => $this->inputId,
                'htmlOptions' => $this->htmlOptions,
                'label'       => $this->getLabel(),
            ]
        );
    }
}