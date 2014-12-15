<?php
namespace Xtlan\Design\Controller\Action\Crud;

use Yii;
use yii\web\NotFoundHttpException;
use yii\db\ActiveRecordInterface;
use yii\base\Model;

/**
* EditAction
*
* @version 1.0.0
* @author Kirya <cloudkserg11@gmail.com>
*/
class EditAction extends Action
{

    /**
     * afterSave
     *
     * @var \Closure
     */
    private $afterSave;

    /**
     * Gets the value of afterSave
     *
     * @return \Closure
     */
    public function getAfterSave()
    {
        if (!isset($this->afterSave)) {
            $this->afterSave = function (ActiveRecordInterface $item) {
            
            };   
        }
        return $this->afterSave;
    }

    /**
     * setAfterSave
     *
     * @param \Closure $afterSave
     * @return void
     */
    public function setAfterSave($afterSave)
    {
        $this->afterSave = $afteSave;
    }


    /**
     * run
     *
     * @return void
     */
    public function run()
    {
        $id = $this->getId();
        $item = $this->findItem($id);

        if ($item->load(Yii::$app->request->post()) and $item->save()) {
            $afterSave = $this->getAfterSave();
            $afterSave($item);

            Yii::$app->session->setFlash('success', 'Объект сохранен.');
            return $this->sendRedirect($item);
        }

        if (!empty($item->errors)) {
            $this->flashErrors($item);
        }
 
        return $this->controller->render('edit', ['item' => $item]);
    }

    /**
     * sendRedirect
     *
     * @param Model $item
     * @return void
     */
    private function sendRedirect(Model $item)
    {
        if (Yii::$app->request->isAjax) {
            $ajax = new Ajax();
            $ajax->sendRespond(true, 'Данные верны');
            Yii::$app->end();
        }
        
        $this->controller->redirect($this->getRedirectUrl($item));
    }


    /**
     * flashErrors
     *
     * @param Model $item
     * @return void
     */
    private function flashErrors(Model $item)
    {
        if (Yii::$app->request->isAjax) {
            $ajax = new Ajax();
            $ajax->thorwValidateErrors($item);
        }
        $this->controller->flashErrors($item);
    }



    
}
