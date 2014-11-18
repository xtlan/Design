<?php
/**
 * Description of DummyAdminControllerBehavior
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */
namespace Design\Controller\Behavior;

class DummyAdminControllerBehavior extends AdminControllerBehavior
{

    /**
     * nameModel
     *
     * @var CModel
     */
    public $model;

    /**
     * pageCount
     *
     * @var int
     */
    public $pageCount = 10;

    /**
     * pageLimit
     *
     * @var int
     */
    public $pageLimit = 10;

    /**
     * _filter
     *
     * @var CFormModel
     */
    private $_filter;

    /**
     * getFilter
     *
     * @return CFormModel
     */
    public function getFilter()
    {
        if (!isset($this->_filter)) {
            $this->_filter = new \DummyModel;
        }

        return $this->_filter;
    }

    /**
     * setFilter
     *
     * @param CFormModel $filter
     * @return void
     */
    public function setFilter(CFormModel $filter)
    {
        $this->_filter = $filter;
    }

    /**
     * actionIndex
     *
     * @param int $page
     * @param string $order
     * @param int $dir
     * @return void
     */
    public function actionIndex($page = 1, $order = "default", $dir = 1)
    {
        //Неправильная страница
        if (!is_numeric($page)) {
            throw new \CHttpException('404', 'Неправильная страница');
        }
       
        //Получаем все данные модели
        $dataProvider = new \DummyDataProvider($this->loadModel());

        //Обрабатываем фильтр
        if ($this->useAdminFilter) {
            $this->owner->filter = $this->getFilter();
            if (isset($_GET['filter'])  ) {
                $this->owner->filter->fillData($_GET['filter']);
            }
        
            $dataProvider->setFilter($this->owner->filter);
        }

        $dataProvider->setSort($order, $dir);
        $dataProvider->setPage($page, $this->pageLimit);
        $dataProvider->setPageCount($this->pageCount);
        $dataProvider->fillData();

        $this->owner->render('index', array('dataProvider' => $dataProvider));
    }

    /**
     * actionList
     *
     * @param string $query Поисковое слово
     * @param string $idField колонка для роли идишника
     * @param string $titleField колонка для роли нащвания
     * @return render ajax
     */
    public function actionList($query = '', $idField = 'id', $titleField = 'title')
    {

        $items = array();
        for ($i = 0; $i <= $pageSize; $i++) {
            $model = $this->createModel();
            $items[] = array(
                'id' => $model->$idField,
                'label' => $model->$titleField,
                'value' => $model->$idField
            );
        }

        \Yii::app()->ajax->ajaxRespond(true, 'Данные выданы', $items);
    }



    /**
     * actionAdd
     *
     * @param array $defaultAttributes
     * @return void
     */
    public function actionAdd($defaultAttributes = array())
    {
        //При добавлении объекта мы автоматом создаем
        //объект шаблон
        $item = $this->createModel();

        //Редиректим пользователя на нужную страницу
        $this->owner->redirect(array("edit","id" => $item->id));

    }

    /**
     * actionEdit
     *
     * @param int $id
     * @return void
     */
    public function actionEdit($id)
    {
        $item = $this->loadModelById($id);
        $nameModel = $item->getNameModel();

        //Если заданы данные модели
        //значит обновляем модель
        if (isset($_POST[$nameModel])) {
            $this->owner->redirect($this->buildRedirectUrl($item));
        }

        $this->owner->render(
            'edit', array(
                'item' => $item,
                'id' => $id
            )
        );
    }

    /**
     * actionView
     *
     * @param int $id
     * @return void
     */
    public function actionView($id)
    {
        $item = $this->loadModelById($id);

        $this->owner->render(
            'view',
            array(
                'item' => $item
            )
        );
    }

    /**
     * actionDelete
     *
     * @return void
     */
    public function actionDelete()
    {
        if (!isset($_POST['id'])) {
            throw new \CHttpException('404', "Не прислан идентификатор");
        }
        if (!$this->validateDeleteId($_POST['id'])) {
            throw new \CHttpException('404', "Не верный идентификатор");
        }
        $id = $_POST['id'];

        //Если мы не в Ajax
        if (!(\Yii::app()->request->isAjaxRequest)) {
            $this->owner->redirect($this->buildRedirectUrl($item));
        }

        \Yii::app()->ajax->delMessage(true, $id);
    }

    /**
     * validateDeleteId
     *
     * @param int $id
     * @return boolean
     */
    private function validateDeleteId($id)
    {
        if (is_numeric($id)) {
            return true;    
        }
        if (is_array($id)) {
            return $this->validateIds($id);
        }
        return false;
    }

    /**
     * validateIds
     *
     * @param int $id
     * @return boolean
     */
    private function validateIds($id)
    {
        foreach ($id as $el) {
            if (!is_numeric($el)) {
                return false;
            }
        }
        return true;
    }


    /**
     * loadModel
     * Получаем доступ к текущей модели
     *
     * @access private
     * @return CActiveRecord
     */
    protected function loadModel()
    {
        return clone $this->model;
    }

    /**
     * createModel
     *
     * @return CActiveRecord
     */
    protected function createModel()
    {
        $nameModel = get_class($this->model);
        return new $nameModel();
    }


    /**
     * buildRedirectUrl
     *
     * @param mixed $item
     * @return void
     */
    protected function buildRedirectUrl($item)
    {
        if (!isset($this->redirectUrl)) {
            return array('index');
        }
        if (is_callable($this->redirectUrl)) {
            $redirFunction = $this->redirectUrl;
            return call_user_func($redirFunction, $item);
        }

        return $this->redirectUrl;
    }


    /**
     * loadModelById
     *
     * @param numeric $id
     * @return ActiveRecord
     */
    protected function loadModelById($id)
    {
         //Проверяем валидатор
        if (!is_numeric($id)) {
            throw new \CHttpException('404', 'Идентификатор не верный');
        }
        
        $item = $this->loadModel();
        $item->id = $id;

        return $item;
    }




}
