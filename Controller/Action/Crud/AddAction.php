<?php
namespace Xtlan\Design\Controller\Action\Crud;

use Yii;
use yii\web\NotFoundHttpException;
use Xtlan\Design\Data\ActiveDataProvider;
use Xtlan\Core\Helper\GetUrl;

/**
 * AddAction
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class AddAction extends Action
{

    /**
     * modelName
     *
     * @var string
     */
    public $modelName;


    /**
     * creator
     *
     * @var Closure
     */
    private $_creator; 
    
    /**
    * getCreator
    *
    * @return \Closure
    */
    public function getCreator()
    {
        if (!isset($this->_creator)) {
            $this->_creator = function () {
                $modelName = $this->modelName;
                return new $modelName;
            };
        }
        return $this->_creator;
    }
    
    /**
    * setCreator
    *
    * @param \Closure $creator
    * @return 
    */
    public function setCreator($creator)
    {
        $this->_creator = $creator;
    }

    /**
     * run
     *
     * @return void
     */
    public function run()
    {

        $creatorClosure = $this->creator;
        $item = $creatorClosure();

        if (!$item->save()) {
            $this->controller->flashErrors($item);
            return $this->controller->redirect($this->getRedirectUrl($item));
        }


        return $this->controller->redirect(GetUrl::url('edit', ['id' => $item->id]));
    }
    






}


