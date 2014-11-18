<?php
/**
 * RelationsField
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
namespace Design\Field;

class RelationsField extends AbstractModelField
{

    /**
     * _options
     *
     * @var array
     */
    protected $_options;


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
     * getValue
     *
     * @return mixed
     */
    public function getValue()
    {
        if (!isset($this->_value)) {
            $this->_value = $this->getRelationIdsByField($this->field);
        }
        
        return $this->_value;
    }
    


    /**
     * ВЫполнить виджет
     *
     * @access public
     * @return void
     */
    public function run()
    {
        $this->render('relationsField/index');

    }

    /**
     * getModelRelationByField
     *
     * @param string $field
     * @return CActiveRecord
     */
    protected function getModelRelationByField($field)
    {
        $nameRelation = $field;
        $activeRelation = $this->model->getActiveRelation($nameRelation);
        if (!isset($activeRelation)) {
            throw new \Exception("relation with name $nameRelation not exit.");
        }
        $classRelation = $activeRelation->className;

        return new $classRelation();
    }

    /**
     * getRelationIdsByField
     *
     * @param string $field
     * @return array array(11,12,13)
     */
    private function getRelationIdsByField($field)
    {
        $relationIds = array();
        foreach ($this->model->getRelation($field) as $item) {
            if ($item instanceof \CActiveRecord) {
                $relationIds[] = $item->primaryKey;
            } else {
                $relationIds[] = $item;
            }
        }

        return $relationIds;
    }


}
