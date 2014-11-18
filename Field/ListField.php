<?php
/**
 * ListField
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
namespace Design\Field;

class ListField extends AbstractModelField
{
    
    public $htmlOptions = array();

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
            $modelRelation = $this->getModelRelationByField($this->field);
            $this->_options = $modelRelation->getData();
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
        $this->render('listField/index');
     
     }



     /**
      * getModelRelationByField
      *
      * @param string $field
      * @return CActiveRecord
      */
     private function getModelRelationByField($field)
     {
        $nameModelRelation = '';

        $fieldParts = explode('_', $field);
        foreach ($fieldParts as $el ) {
            if ($el != 'id') {
                $nameModelRelation .= ucfirst($el);
            }
        } 

        return new $nameModelRelation();
     }


   
}
