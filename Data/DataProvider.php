<?php
namespace Design\Data;
/**
 * DataProvider
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class DataProvider extends \DataProvider
{

    /**
     * _prevRow
     *
     * @var mixed
     */
    private $_prevRow;

    /**
     * _nextRow
     *
     * @var mixed
     */
    private $_nextRow;

    /**
     * _allRows
     *
     * @var array
     */
    private $_allRows = array();


    /* public fillData($addCriteria = array() ) {{{ */ 
    /**
     * fillData
     * 
     * @access public
     * @return void
     */
    public function fillData()
    {
        //Собираем условие
        $this->_criteria = $this->_model->getDbCriteria();
        
        //Применяем пейджинг, если надо
        if (isset($this->_pages)) {
            $this->_criteria = $this->applyPages($this->_criteria);
            $this->addPrevNextRow($this->_criteria);
        }
        //Задаем перебранный критерий
        $this->_model->setDbCriteria($this->_criteria);

        //Вытаскиваем строки
        $this->_allRows = $this->_model->findAll();
        $this->loadPrevNextRow();

    }
    /* }}} */

    /**
     * loadPrevNextRow
     *
     * @return void
     */
    private function loadPrevNextRow()
    {
        $this->_rows = $this->_allRows;
        if (!$this->isFirstPage()) {
            $this->_prevRow = array_shift($this->_rows);
        }
        
        if (!$this->_pages->isLastPage()) {
            $this->_nextRow = array_pop($this->_rows);
        }
    }

    /**
     * getAllRows
     *
     * @return array
     */
    public function getAllRows()
    {
        return $this->_allRows;
    }

    /**
     * getRows
     *
     * @return array
     */
    public function getRows()
    {
        $rows = $this->_rows;
        return $rows;
    }

    /**
     * isFirstPage
     *
     * @return boolean
     */
    protected function isFirstPage()
    {
        $pages = $this->_pages;
        return ($pages->currentPage + 1 == 1);
    }


    /**
     * isLastPage
     *
     * @return boolean
     */
    protected function isLastPage()
    {
        $pages = $this->_pages;
        return  ($pages->currentPage  + 1 == $pages->pageCount);
    }

    /**
     * getPrevRow
     *
     * @return void
     */
    public function getPrevRow()
    {
        return $this->_prevRow;
    }

    /**
     * getNextRow
     *
     * @return void
     */
    public function getNextRow()
    {
        return $this->_nextRow;
    }


    /**
     * loadModel
     *
     * @return string
     */
    private function loadModel()
    {
        $modelName = get_class($this->_model);
        $model = new $modelName;
        return $model;
    }

    /**
     * applyPages
     *
     * @param \CDbCriteria $criteria
     * @return \CDbCriteria
     */
    private function applyPages($criteria)
    {
        $count = $this->loadModel()->count($criteria);

        $this->_pages->setItemCount($count);
        $this->_pages->applyLimit($criteria);

        return $criteria;
    }

    /**
     * addPrevNextRow
     *
     * @param \CDbCriteria $criteria
     * @return void
     */
    private function addPrevNextRow(\CDbCriteria &$criteria)
    {

        if (!$this->isFirstPage()) {
            $criteria->offset = $criteria->offset - 1;
            $criteria->limit++;
        }
        
        if (!$this->_pages->isLastPage()) {
            $criteria->limit++;
        }

    }


}
