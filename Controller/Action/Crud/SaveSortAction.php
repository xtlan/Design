<?php
namespace Xtlan\Design\Controller\Action\Crud;

use Yii;
use yii\web\ServerErrorException;
use Xtlan\Core\Component\Ajax;

/**
* SaveSortAction
*
* @version 1.0.0
* @author Kirya <cloudkserg11@gmail.com>
*/
class SaveSortAction extends Action
{

    /**
     * run
     *
     * @return void
     */
    public function run()
    {
        $sortings = Yii::$app->request->post();

        foreach ($sortings as $id => $sort) {
            $item = $this->findItem($id);
            $item->sort = (int)$sort;
            if (!$item->save()) {
                throw new ServerErrorException('Не удалось удалить объект');
            }
        }
 
        $ajax = new Ajax();
        Yii::$app->session->setFlash('success', 'Сортировка прошла успешно');
        return $ajax->sendRespond(true, 'Сортировка прошла успешно');
    }



    
}
