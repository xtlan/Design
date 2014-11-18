<?php

/**
 * Description of Filter
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */
namespace Design\Filter;

class Filter extends \CWidget
{

    /**
     *
     * @var CModel
     */
    public $model;

    /**
     *
     * @var array of FilterElements
     */
    public $elements = array();

    /**
     *
     * @var string 
     */
    public $filterUrl;

    /**
     * run
     *
     * @return void
     */
    public function run()
    {
        $this->filterUrl = $this->loadFilterUrl();
        
        foreach ($this->elements as $element) {
            $element->setModel($this->model);
        }
        $this->render('filter/index');
    }
    
    /**
     * loadFilterUrl
     * 
     * @return string
     */
    private function loadFilterUrl()
    {
        $route = \Yii::app()->controller->route;
        $classFilter = get_class($this->model);
        unset($_GET[$classFilter]);
        $paramsWithouteFilter = $_GET;
        return \GetUrl::url("/" . $route, $paramsWithouteFilter);
    }
}
