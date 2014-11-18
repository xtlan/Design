<?php
namespace Design\Field;
/**
 * AbstractModelField
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
abstract class AbstractModelField extends \CWidget
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
     * _model
     *
     * @var \CModel
     */
    private $_model;

    /**
     * _field
     *
     * @var string
     */
    private $_field;

    /**
     * _isEdit
     *
     * @var boolean
     */
    private $_isEdit = true;

    /**
     * _label
     *
     * @var string
     */
    private $_label;
    
    /**
     * _value
     *
     * @var value
     */
    protected $_value;

    /**
     * _inputId
     *
     * @var string
     */
    private $_inputId;

    /**
     * _inputName
     *
     * @var string
     */
    private $_inputName;

    /**
     * _inputClass
     *
     * @var string
     */
    private $_inputClass;

    /**
     * Gets the value of model
     *
     * @return \CModel
     */
    public function getModel()
    {
        return $this->_model;
    }
    
    /**
     * Sets the value of model
     *
     * @param \CModel $model 
     */
    public function setModel(\CModel $model)
    {
        $this->_model = $model;
        return $this;
    }

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
     * Gets the value of value
     *
     * @return mixed
     */
    public function getValue()
    {
        if (!isset($this->_value)) {
            $this->_value = $this->_model->getAttribute($this->_field);
        }
        return $this->_value;
    }
    
    /**
     * Sets the value of value
     *
     * @param mixed $value 
     */
    public function setValue($value)
    {
        $this->_value = $value;
        return $this;
    }

    /**
     * Gets the value of isEdit
     *
     * @return boolean
     */
    public function getIsEdit()
    {
        return $this->_isEdit;
    }
    
    /**
     * Sets the value of isEdit
     *
     * @param boolean $isEdit 
     */
    public function setIsEdit($isEdit)
    {
        $this->_isEdit = $isEdit;
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

   
    /**
     * getErrors
     *
     * @return array|null
     */
    protected function getErrors()
    {
        if (isset($this->_model->errors[$this->_field])) {
            return $this->_model->errors[$this->_field];
        }
    
        return array();
    }

    /**
     * getIsRequired
     *
     * @return boolean
     */
    protected function getIsRequired()
    {
        if ($this->_model->isAttributeRequired($this->_field)) {
            return true;
        } 
        return false;
    
    }

    /**
     * Gets the value of inputId
     *
     * @return string
     */
    public function getInputId()
    {
        if (!isset($this->_inputId)) {
            $nameModel = $this->_model->nameModel;
            $field = $this->_field;
        
            $this->_inputId = "{$nameModel}_{$field}";
        }
        return $this->_inputId;
    }
    
    /**
     * Sets the value of inputId
     *
     * @param string $inputId 
     */
    public function setInputId($inputId)
    {
        $this->_inputId = $inputId;
        return $this;
    }

    /**
     * Gets the value of inputName
     *
     * @return string
     */
    public function getInputName()
    {
        if (!isset($this->_inputName)) {
            $nameModel = $this->_model->nameModel;
            $field = $this->_field;

            $this->_inputName = "{$nameModel}[{$field}]";
        }
        return $this->_inputName;
    }
    
    /**
     * Sets the value of inputName
     *
     * @param string $inputName 
     */
    public function setInputName($inputName)
    {
        $this->_inputName = $inputName;
        return $this;
    }

    /**
     * init
     *
     * @return void
     */
    public function init()
    {
        $this->processErrors();
    
        parent::init();
    }


    /**
     * processErrors
     *
     * @return void
     */
    private function processErrors()
    {
        if (!empty($this->errors)) {
            $this->htmlOptions['class'] .= 'error';
        }
    }

}
