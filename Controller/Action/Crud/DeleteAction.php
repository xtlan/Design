<?php
namespace Xtlan\Design\Controller\Action\Crud;

use Yii;
use yii\web\NotFoundHttpException;
use yii\web\ServerErrorHttpException;
use yii\db\ActiveRecordInterface;
use yii\base\Model;
use Xtlan\Core\Component\Ajax;
use Xtlan\Core\Helper\Text;

/**
* EditAction
*
* @version 1.0.0
* @author Kirya <cloudkserg11@gmail.com>
*/
class DeleteAction extends Action
{


    /**
     * run
     *
     * @return void
     */
    public function run()
    {
        $ids = $this->getIds();
        $items = $this->findItems($ids);

        try{
            foreach ($items as $item) {
                $item->delete();
            }
        } catch (\Exception $e) {
            throw new ServerErrorHttpException($e->getMessage());
        }
        
        $message = $this->delMessage($ids);
        Yii::$app->session->setFlash('success', $message);
        if (Yii::$app->request->isAjax) {
            $ajax = new Ajax();
            return $ajax->sendRespond(true, $message);
        }
 
        return $this->controller->redirect($this->getRedirectUrl($item));
    }
    
    /**
     * delMessage
     *
     * @param array $ids
     * @return void
     */
    protected function delMessage(array $ids)
    {
        $countIds = count($ids);
        return "{$countIds} " . Text::wordNum(
            $countIds, 
            array(
                'элемент удален', 
                'элемента удалено', 
                'элементов удалено'
            )
        );
    }

    /**
     * getIds
     *
     * @return array
     */
    private function getIds()
    {
        $ids = Yii::$app->request->post('id', null);
        if (!isset($ids)) {
            throw new NotFoundHttpException('Неверный идентификатор');
        }
        if (!is_array($ids)) {
            $ids = array($ids);
        }

        return $ids;
    }



    /**
     * findItems
     *
     * @param array $ids
     * @return void
     */
    protected function findItems(array $ids)
    {
        $loader = $this->loader; 
        $items = $loader()->forId($ids)->all();
        if (empty($items)) {
            throw new NotFoundHttpException('Нет таких объектов');
        }

        return $items;
    }

    
}
