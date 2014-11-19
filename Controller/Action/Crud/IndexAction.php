<?php
namespace Xtlan\Design\Controller\Action\Crud;

use Yii;
use yii\web\NotFoundHttpException;
use Xtlan\Design\Data\ActiveDataProvider;

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
        $page = Yii::$app->request->getQueryParam('page', 1);
        $order = Yii::$app->request->getQueryParam('order', null);
        $dir = Yii::$app->request->getQueryParam('dir', null);


        $queryClosure = $this->query;
        $query = $queryClosure();

         
        $filter = null;
        if (isset($this->filterName)) {
            $filter = new $this->filterName;
            $filter->load(Yii::$app->request->queryParams);
            if (!$filter->validate()) {
                throw new NotFoundHttpException('Фильтр неверный');
            }
            $query = $filter->search($query);
        }

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $this->pageSize
            ]
        ]);

        return $this->controller->render(
            'index',
            [
                'provider' => $provider,
                'filter' => $filter,
            ]
        );
    }
    






}


