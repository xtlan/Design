<?php

/**
 * Description of Element
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */
namespace Design\ModelTable\Sort;

class Element extends \CComponent
{
    /**
     *
     * @var string
     */
    private $_label;
    
    /**
     *
     * @var string
     */
    private $_order;


    /**
     * _currentDir
     *
     * @var int
     */
    private $_currentDir = \AModel::DESC;

    /**
     * 
     * @param string $order
     * @param string $label
     */
    public function __construct($order, $label)
    {
        $this->_label = $label;
        $this->_order = $order;

        if (isset($_GET['dir'])) {
            $this->_currentDir = $_GET['dir'];
        }
    }
    
    /**
     * getLabel
     * 
     * @return string
     */
    public function getLabel()
    {
        return $this->_label;
    }

    /**
     * getUrl
     * 
     * @return string
     */
    public function getUrl()
    {
        //Параметры получаем из гетовских
        $params = $_REQUEST;
        
        $route = '/' . \Yii::app()->controller->route;
        $params['order'] = $this->_order;
        if ($this->isUp()) {
            $params['dir'] = \AModel::DESC;
        } else {
            $params['dir'] = \AModel::ASC;
        }


        return \GetUrl::url($route, $params);
    }

    /**
     * isCurrent
     * 
     * @return boolean
     */
    public function isCurrent()
    {
        if (!isset($_GET['order'])) {
            return false;
        }

        return $_GET['order'] == $this->_order;
    }

    /**
     * isDown
     *
     * @return boolean
     */
    public function isDown()
    {
        return $this->_currentDir == \Amodel::DESC;
    }

    /**
     * isUp
     *
     * @return boolean
     */
    public function isUp()
    {
        return $this->_currentDir == \Amodel::ASC;
    }
}
