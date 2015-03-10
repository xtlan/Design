<?php
namespace Xtlan\Design\Field;

/**
 * TextareaField
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */

class TextareaField extends AbstractModelField
{


    /**
     * Флаг (использовать CKEditor)
     * @var boolean
     */
    private $_fck = false;



    /**
     * Gets the value of fck
     *
     * @return boolean
     */
    public function getFck()
    {
        return $this->_fck;
    }
    
    /**
     * Sets the value of fck
     *
     * @param string|boolean $fck 
     */
    public function setFck($fck)
    {
        $this->_fck = $fck;
        
        return $this;
    }
    

    /**
     * Sets the value of max
     *
     * @param int $max 
     */
    public function setMax($max)
    {
        $this->htmlOptions['maxlength'] = $max;
    }

    /**
     * Sets the value of width
     *
     * @param string $width 
     */
    public function setWidth($width)
    {
        $this->htmlOptions['style'] .= 'width:' . $width; 
    }
    
     /**
     * Sets the value of height
     *
     * @param string $height
     */
    public function setHeight($heght)
    {
        $this->htmlOptions['style'] .= 'height:' . $height; 
    }
    

    /**
     * ВЫполнить виджет
     *
     * @access public
     * @return void
     */
    public function run()
    {
        return $this->render(
            'textareaField/index',
            [
                'errors' => $this->errors,
                'inputName' => $this->inputName,
                'value' => $this->value,
                'inputId' => $this->inputId,
                'htmlOptions' => $this->htmlOptions,
                'label' => $this->getLabel(),
                'fck' => $this->getFck(),
                'model' => $this->model
            ]
        );
    }


}
