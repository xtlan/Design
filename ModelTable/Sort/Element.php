<?php
namespace Xtlan\Design\ModelTable\Sort;

use yii\base\Object;
use Xtlan\Core\Model\Query;
use yii\helpers\Url; 
use Yii;

/**
 * Description of Element
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */
class Element extends Object
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
     * _query
     *
     * @var Query
     */
    private $_query;



    /**
     * 
     * @param string $order
     * @param string $label
     */
    public function __construct($order, $label)
    {
        $this->_label = $label;
        $this->_order = $order;
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
     * setQuery
     *
     * @param Query $query
     * @return void
     */
    public function setQuery(Query $query)
    {
        $this->_query = $query;
    }

    /**
     * getUrl
     * 
     * @return string
     */
    public function getUrl()
    {
        //Параметры получаем из гетовских
        $url = Yii::$app->request->resolve();
        $url[0] = '/' . $url[0];
        
        $url['order'] = $this->_order;
        $url['dir'] = ($this->isUp() ? Query::DESC : Query::ASC);

        return Url::toRoute($url);
    }

    /**
     * getCurrentDir
     *
     * @return boolean
     */
    public function getCurrentDir()
    {
        return $this->_query->sortDir;
    }

    /**
     * getCurrentOrder
     *
     * @return boolean
     */
    public function getCurrentOrder()
    {
        return $this->_query->sortOrder;
    }

    /**
     * isCurrent
     * 
     * @return boolean
     */
    public function isCurrent()
    {
        $order = $this->currentOrder;
        if (!isset($order)) {
            return false;
        }

        return $order == $this->_order;
    }

    /**
     * isDown
     *
     * @return boolean
     */
    public function isDown()
    {
        return $this->currentDir == Query::DESC;
    }

    /**
     * isUp
     *
     * @return boolean
     */
    public function isUp()
    {
        return $this->currentDir == Query::ASC;
    }
}
