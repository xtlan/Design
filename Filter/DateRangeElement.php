<?php
namespace Design\Filter;
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
     * getId
     * 
     * @return string
     */
    public function getId()
    {
        return \CHtml::activeId($this->_model, $this->_startField);
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
        $startField = $this->_model->getAttribute($this->_startField);
        $endField = $this->_model->getAttribute($this->_endField);
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
        $this->renderFile(
            'dateRangeElement/index.php',
            array(
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
        $this->renderFile(
            'dateRangeElement/save.php',
            array(
                'title'      => $this->title,
                'startField' => $this->_startField,
                'endField'   => $this->_endField
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
        return $this->model->getAttribute($this->_startField);
    }

    /**
     * getEndValue
     * 
     * @return mixed
     */
    protected function getEndValue()
    {
        return $this->model->getAttribute($this->_endField);
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
