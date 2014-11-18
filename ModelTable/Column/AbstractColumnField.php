<?php

/**
 * Description of AbstractColumnField
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */
namespace Design\ModelTable\Column;

abstract class AbstractColumnField extends \RenderComponent implements ColumnInterface
{

    /**
     * _htmlOptions
     *
     * @var array
     */
    public $htmlOptions = array(
        'style' => '',
        'class' => ''
    );

    /**
     * _field
     *
     * @var string
     */
    private $_field;

    /**
     * _label
     *
     * @var string
     */
    private $_label;
    
    /**
     * Gets the value of field
     *
     * @return string
     */
    public function getField()
    {
        return $this->_field;
    }
    
    /**
     * Sets the value of field
     *
     * @param string $field 
     */
    public function setField($field)
    {
        $this->_field = $field;
        return $this;
    }

    /**
     * Gets the value of label
     *
     * @return string
     */
    public function getLabel()
    {
        if (!isset($this->_label)) {
            $this->_label = $this->_model->getAttributeLabel($this->_field);
        }
        return $this->_label;
    }
    
    /**
     * Sets the value of label
     *
     * @param string $label 
     */
    public function setLabel($label)
    {
        $this->_label = $label;
        return $this;
    }
}