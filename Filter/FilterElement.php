<?php

/**
 * Description of Element
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */
namespace Design\Filter;

abstract class FilterElement extends \RenderComponent
{
    /**
     *
     * @var type 
     */
    protected $_field;

    /**
     *
     * @var type 
     */
    protected $_model;

    /**
     * getTitle
     * 
     * @return type
     */
    public function getTitle()
    {
        return $this->_model->getAttributeLabel($this->_field);
    }

    /**
     * getId
     * 
     * @return type
     */
    public function getId()
    {
        return \CHtml::activeId($this->_model, $this->_field);
    }

    /**
     * getValue
     * 
     * @return type
     */
    protected function getValue()
    {
        return $this->_model->getAttribute($this->_field);
    }

    /**
     * setModel
     *
     * @param \CModel $model
     */
    public function setModel(\CModel $model)
    {
        $this->_model = $model;
    }

    /**
     * 
     * @return \CModel
     */
    public function getModel()
    {
        return $this->_model;
    }

    /**
     * renderElement
     */
    abstract public function renderElement();

    /**
     * hasSaveElement
     */
    abstract public function hasSaveElement();

    /**
     * renderSaveElement
     */
    abstract public function renderSaveElement();
}
