<?php

/**
 * Description of Element
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */
namespace Xtlan\Design\Filter;

use yii\base\Widget;
use yii\helpers\Html;

abstract class FilterElement extends Widget
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
    public $model;

    /**
     * getTitle
     * 
     * @return type
     */
    protected function getTitle()
    {
        return $this->model->getAttributeLabel($this->_field);
    }

    /**
     * getFieldId
     * 
     * @return type
     */
    protected function getFieldId()
    {
        return Html::getInputId($this->model, $this->_field);
    }

    /**
     * getValue
     * 
     * @return type
     */
    protected function getValue()
    {
        if ($this->model->hasProperty($this->_field)) {
            return $this->model->attributes[$this->_field];
        }
        return null;
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
