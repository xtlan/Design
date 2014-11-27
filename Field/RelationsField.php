<?php
/**
 * RelationsField
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
namespace  Xtlan\Design\Field;
use Xtlan\Core\Helper\ArrayHelper;

class RelationsField extends AbstractModelField
{
    const LIST_TYPE = 'list';
    const MARK_TYPE = 'index';

    /**
     * placeholder
     *
     * @var string
     */
    public $placeholder;

    /**
     * type
     *
     * @var string list or string
     */
    public $type = self::MARK_TYPE;

    /**
     * relation
     *
     * @var string name
     */
    public $relation;

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
            $this->_options = $this->getRelationOptions($this->relation);
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
     * Gets the value of value
     *
     * @return mixed
     */
    public function getValue()
    {
        if (!isset($this->_value)) {
            $field = $this->field;
            $this->_value = $this->model->$field;
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
        return $this->render(
            'relationsField/' . $this->type,
            [
                'inputName'   => $this->inputName,
                'inputId'     => $this->inputId,
                'label'       => $this->getLabel(),
                'value'       => $this->getValue(),
                'errors'      => $this->errors,

                'options'     => $this->getOptions(),
                'placeholder' => $this->placeholder,

                'htmlOptions' => $this->htmlOptions
            ]
        );
    }

    /**
     * getRelationOptions
     *
     * @param string $relationName
     * @return array
     */
    protected function getRelationOptions($relationName)
    {
        $relationClass = $this->model->getRelation($relationName)->modelClass;
        $relationQuery = $relationClass::find();

        return ArrayHelper::map($relationQuery->all(), 'id', 'title');
    
    }



}
