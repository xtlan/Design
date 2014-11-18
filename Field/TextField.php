<?php
/**
 * TextField
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
namespace Design\Field;

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
        $this->render('textField/index');

    }

}
