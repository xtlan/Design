<?php
namespace Xtlan\Design\Controller\Action\Crud;

use Yii;
use yii\base\Action;
use yii\web\NotFoundHttpException;
use Xtlan\Design\Data\ActiveDataProvider;
use Xtlan\Core\Helper\GetUrl;

/**
 * IndexAction
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class IndexAction extends Action
{

    /**
     * modelName
     *
     * @var string
     */
    public $modelName;

    /**
     * pageSize
     *
     * @var int
     */
    public $pageSize = 10;

    /**
     * filterName
     *
     * @var string
     */
    public $filterName;

    /**
     * query
     *
     * @var Closure
     */
    private $_query; 
    
    /**
    * getModelSearcher
    *
    * @return \Closure
    */
    public function getQuery()
    {
        if (!isset($this->_query)) {
            $this->_query = function () {
                $modelName = $this->modelName;
                return $modelName::find();
            };
        }
        return $this->_query;
    }
    
    /**
    * setModelSearcher
    *
    * @param \Closure $query
    * @return 
    */
    public function setQuery($query)
    {
        $this->_query = $query;
    }

    /**
     * run
     *
     * @return void
     */
    public function run()
    {
        $page = (int)Yii::$app->request->getQueryParam('page', 1);
        $order = Yii::$app->request->getQueryParam('order', null);
        $dir = Yii::$app->request->getQueryParam('dir', null);


        $queryClosure = $this->query;
        $query = $queryClosure();

        $query->sort($order, $dir);

         
        $filter = null;
        if (isset($this->filterName)) {
            $filter = $this->controller->getFilter($this->filterName, Yii::$app->request->queryParams);
            $query = $filter->search($query);
        }

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $this->pageSize,
                'page' => ($page -1)
            ]
        ]);

        GetUrl::remember();

        return $this->controller->render(
            'index',
            [
                'provider' => $provider,
                'filter' => $filter,
            ]
        );
    }
    






}


