<?php
namespace Xtlan\Design\Data;

use yii\data\ActiveDataProvider as BaseProvider;

/**
 * DataProvider
 *
 * @version 1.0.0
 * @author Kirya <cloudkserg11@gmail.com>
 */
class ActiveDataProvider extends BaseProvider implements DataProviderInterface
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
     * _allModels
     *
     * @var array
     */
    private $_allModels = array();




    /**
     * prepareModel s
     *
     * @inheritdoc
     */
    protected function prepareModels()
    {
        return parent::prepareModels();
        $this->addPrevNextRow();

        //Вытаскиваем строки
        $this->_allModels = parent::prepareModels();
        
        return $this->cutPrevNextRow();
    }

    /**
     * loadPrevNextRow
     *
     * @return void
     */
    private function cutPrevNextRow()
    {
        $rows = $this->_allModels;
        if (!$this->isFirstPage()) {
            $this->_prevRow = array_shift($rows);
        }
        
        if (!$this->isLastPage()) {
            $this->_nextRow = array_pop($rows);
        }

        return $rows;
    }

    /**
     * getAllModels
     *
     * @return array
     */
    public function getAllModels()
    {
        return $this->_allModels;
    }


    /**
     * isFirstPage
     *
     * @return boolean
     */
    protected function isFirstPage()
    {
        return ($this->pagination->page + 1 == 1);
    }


    /**
     * isLastPage
     *
     * @return boolean
     */
    protected function isLastPage()
    {
        return  ($this->pagination->page  + 1 == $this->pagination->pageCount);
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
     * addPrevNextRow
     *
     * @return void
     */
    private function addPrevNextRow()
    {

        if (!$this->isFirstPage()) {
            $this->query->offset = $this->query->offset - 1;
            $this->query->limit++;
        }
        
        if (!$this->isLastPage()) {
            $this->query->limit++;
        }

    }


}
