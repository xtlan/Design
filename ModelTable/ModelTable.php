<?php

/**
 * Description of ModelTable
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */
namespace Design\ModelTable;
/**
 * ModelTable
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class ModelTable extends \CWidget
{


    /**
     *
     * @var CModel
     */
    public $model = null;



    /**
     * titleRow
     *
     * @var Row\TitleRow
     */
    public $titleRow = null;

    /**
     *
     * @var array
     */
    public $columns = array();

    /**
     *
     * @var array
     */
    public $menuButtons = array();

    /**
     *
     * @var array
     */
    public $rowButtons = array();
    
    /**
     *
     * @var boolean 
     */
    public $useManySelect = true;
    
    /**
     *
     * @var Sort
     */
    public $sort;

    /**
     * pages
     *
     * @var DataProvider
     */
    public $dataProvider;

    /**
     * 
     * @param type $owner
     * @return type
     */
    public function __construct($owner = null)
    {
        $this->menuButtons = array(new Menu\DefaultButton());

        $this->rowButtons = array(
            new Row\EditButton(),
            new Row\DeleteButton()
        );

        $this->titleRow = new Row\TitleRow();
        
        return parent::__construct($owner);
    }

    public function init()
    {
        return parent::init();
    }


    /**
     * run
     */
    public function run()
    {
        $rows = $this->dataProvider->rows;

        $prevRow = isset($this->dataProvider->prevRow) ? $this->dataProvider->prevRow : null;
        $nextRow = isset($this->dataProvider->nextRow) ? $this->dataProvider->nextRow : null;

        $this->render('modelTable/index', 
            array(
                'pages' => $this->dataProvider->pages,
                'rows' => $rows,
                'prevRow' => $prevRow,
                'nextRow' => $nextRow
            )
        );
    }


    /**
     * getTitleUrl
     *
     * @param CModel $row
     * @return string
     */
    public function getTitleUrl(CModel $row)
    {
        if (!isset($this->titleUrl)) {
            $this->titleUrl = \GetUrl::url($this->titleRoute, array('id' => $row->id));
        }

        return $this->titleUrl;
    }


    /**
     * isFirstPage
     *
     * @return boolean
     */
    protected function isFirstPage()
    {
        $pages = $this->dataProvider->pages;
        return ($pages->currentPage + 1 == 1);
    }


    /**
     * isLastPage
     *
     * @return boolean
     */
    protected function isLastPage()
    {
        $pages = $this->dataProvider->pages;
        return  ($pages->currentPage  + 1 == $pages->pageCount);
    }


    /**
     * getBeginSort
     *
     * @return int
     */
    protected function getBeginSort()
    {
        $offset = $this->dataProvider->pages->offset;
        return $offset;
    }
}
