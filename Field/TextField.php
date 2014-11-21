<?php
namespace Xtlan\Design\Field;

/**
 * TextField
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */

class TextField extends AbstractModelField
{


    /**
     * Ширина поля
     *
     * @var string
     * @access public
     */
    public $width = "";

    /**
     * Высота поля
     *
     * @var string
     * @access public
     */
    public $height = "";

    /**
     * Макс длина значения  (как текста)
     *
     * @var string
     * @access public
     */
    public $max = "";

    /**
     * Флаг (использовать CKEditor)
     * @var bool
     * @access public
     */
    public $fck = "false";


    /**
     * ВЫполнить виджет
     *
     * @return void
     */
    public function run() 
    {
        return $this->render(
            'textField/index',
            [
                'inputId' => $this->getInputId(),
                'label' => $this->getLabel(),
                'htmlOptions' => $this->htmlOptions,
                'value' => $this->getValue(),
                'inputName' => $this->getInputName()
            ]
        );

    }

}
