<?php
namespace Xtlan\Design\ModelTable;

/**
 * Description of ModelTable
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */

use yii\base\Widget;
use yii\helpers\Url;


/**
 * ModelTable
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class ModelTable extends Widget
{


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
     * data
     *
     * @var Xtlan\Design\Data\DataProviderInterface
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

        //$this->rowButtons = array(
            //new Row\EditButton(),
            //new Row\DeleteButton()
        //);

        //$this->titleRow = new Row\TitleRow();
        
        return parent::__construct($owner);
    }


    /**
     * run
     */
    public function run()
    {
        $rows = $this->dataProvider->models;

        $prevRow = isset($this->dataProvider->prevRow) ? $this->dataProvider->prevRow : null;
        $nextRow = isset($this->dataProvider->nextRow) ? $this->dataProvider->nextRow : null;

        return $this->render(
            'modelTable/index', 
            [
                'menuButtons' => $this->menuButtons,
                'titleRow' => $this->titleRow,
                'dataProvider' => $this->dataProvider,
                'sort' => $this->sort,
                'columns' => $this->columns,
                'rowButtons' => $this->rowButtons,



                'pages' => $this->dataProvider->pagination,
                'rows' => $rows,
                'prevRow' => $prevRow,
                'nextRow' => $nextRow
            ]
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
            $this->titleUrl = Url::to([$this->titleRoute, 'id' => $row->id]);
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
        return ($pages->page + 1 == 1);
    }


    /**
     * isLastPage
     *
     * @return boolean
     */
    protected function isLastPage()
    {
        $pages = $this->dataProvider->pages;
        return  ($pages->page  + 1 == $pages->totalount);
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
