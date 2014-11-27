<?php
/**
 * NumericalField
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
namespace Xtlan\Design\Field;

class NumericalField extends AbstractModelField
{

    /**
     * ВЫполнить виджет
     *
     * @access public
     * @return void
     */
    public function run()
    {
        return $this->render(
            'numericalField/index',
            [
                'errors'      => $this->errors,
                'inputName'   => $this->inputName,
                'value'       => $this->value,
                'inputId'     => $this->inputId,
                'htmlOptions' => $this->htmlOptions,
                'label'       => $this->getLabel()
            ]
        );
    }
}