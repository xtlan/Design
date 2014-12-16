<?php
namespace Xtlan\Design\Filter;

use yii\helpers\Html;

/**
 * DateRangeElement
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class DateRangeElement extends FilterElement
{
    const TYPE = 'dateRange';

    /**
     *
     * @var string 
     */
    private $_title;

    /**
     *
     * @var string
     */
    private $_startField;

    /**
     *
     * @var string
     */
    private $_endField;

    /**
     * 
     * @param string $title
     * @param string $startField
     * @param string $endField
     */
    public function __construct($title, $startField, $endField)
    {
        $this->_title = $title;
        $this->_startField = $startField;
        $this->_endField = $endField;
    }

    /**
     * getFieldId
     * 
     * @return string
     */
    public function getFieldId()
    {
        return Html::getInputId($this->model, $this->_startField);
    }

    /**
     * getTitle
     * 
     * @return string
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * hasSaveElement
     * 
     * @return boolean
     */
    public function hasSaveElement()
    {
        $startField = $this->getStartValue();
        $endField = $this->getEndValue();
        if (isset($startField)
            || isset($endField)
        ) {
            return true;
        }
        return false;
    }

    /**
     * renderElement
     *
     * @return void
     */
    public function renderElement()
    {
        return $this->render(
            'dateRangeElement/index',
            array(
                'id' => $this->getFieldId(),
                'model' => $this->model,
                'field' => $this->_field,
                'startField' => $this->_startField,
                'endField'   => $this->_endField
            )
        );
    }

    /**
     * renderSaveElement
     *
     * @return void
     */
    public function renderSaveElement()
    {
        return $this->render(
            'dateRangeElement/save',
            array(
                'id' => $this->getFieldId(),
                'model' => $this->model,
                'field' => $this->_field,
                'title'      => $this->title,
                'startField' => $this->_startField,
                'endField'   => $this->_endField,
                'startEndString' => $this->getStartEndString()
            )
        );
    }

    /**
     * getStartValue
     * 
     * @return mixed
     */
    protected function getStartValue()
    {
        $startField = $this->_startField;
        return $this->model->$startField;
    }

    /**
     * getEndValue
     * 
     * @return mixed
     */
    protected function getEndValue()
    {
        $endField = $this->_endField;
        return $this->model->$endField;
    }

    /**
     * getStartEndString
     * 
     * @return mixed
     */
    protected function getStartEndString()
    {
        if (isset($this->startValue) && isset($this->endValue)) {
            return "{$this->startValue} — {$this->endValue}";
        }
        
        if (isset($this->endValue)) {
            return $this->endValue;
        }
        
        return $this->startValue;
    }
}
