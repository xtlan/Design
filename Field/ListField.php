<?php

namespace Xtlan\Design\Field;

use Xtlan\Core\Helper\ArrayHelper;

/**
 * ListField
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */

class ListField extends AbstractModelField
{

    /**
     * _options
     *
     * @var array
     */
    private $_options;

    /**
     * _prompt
     *
     * @var boolean
     */
    private $_prompt = 'Не выбрано';

    /**
     * _isEmpty
     *
     * @var boolean
     */
    private $_isEmpty = false;

    /**
     * Gets the value of isEmpty
     *
     * @return boolean
     */
    public function getIsEmpty()
    {
        return $this->_isEmpty;
    }

    /**
     * Sets the value of isEmpty
     *
     * @param  boolean $isEmpty 
     */
    public function setIsEmpty($isEmpty)
    {
        $this->_isEmpty = $isEmpty;
        return $this;
    }
    
    /**
     * Gets the value of emptyPrompt
     *
     * @return string
     */
    public function getPrompt()
    {
        return $this->_prompt;
    }
    
    /**
     * Sets the value of prompt
     *
     * @param string $prompt 
     */
    public function setPrompt($prompt)
    {
        $this->_prompt = $prompt;
        return $this;
    }

    /**
     * Gets the value of options
     *
     * @return array
     */
    public function getOptions()
    {
        if (!isset($this->_options)) {
            $this->_options = $this->getRelationOptions($this->field);
        }
        return $this->_options;
    }
    
    /**
     * Sets the value of options
     *
     * @param array $options 
     */
    public function setOptions(array $options)
    {
        $this->_options = $options;
        return $this;
    }
  
    /**
      * run
      *
      * @return void
      */
    public function run()
    {
        return $this->render(
            'listField/index',
            [
                'inputName'   => $this->inputName,
                'value'       => $this->value,
                'options'     => $this->getOptions(),
                'prompt'      => $this->getPrompt(),
                'isEmpty'     => $this->getIsEmpty(),
                'inputId'     => $this->inputId,
                'htmlOptions' => $this->htmlOptions,
                'label'       => $this->getLabel(),
            ]
        );
    }

    /**
    * getRelationOptions
    *
    * @param string $field
    * @return CActiveRecord
    */
    private function getRelationOptions($field)
    {
        list($relationName, $fieldName) = explode('_', $field);
        $relationClass = $this->model->getRelation($relationName)->modelClass;
        $relationQuery = $relationClass::find();


        return ArrayHelper::map($relationQuery->all(), $fieldName, 'title');
    }
}
