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
     * run
     *
     * @return void
     */
    public function run()
    {
        $ids = $this->getIds();
        $items = $this->findItem($ids);

        try{
            foreach ($items as $item) {
                $item->delete();
            }
        } catch (\Exception $e) {
            throw new ServerErrorHttpException($e->getMessage());
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
