<?php
/**
 * Description of AdminControllerBehavior
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */
namespace Design\Controller\Behavior;

class AdminControllerBehavior extends \CBehavior
{

    /**
     * nameModel
     *
     * @var string
     */
    public $nameModel;
    
    /**
     * redirectUrl
     *
     * @var callable | string 
     *
     */
    public $redirectUrl;


    /**
     * useAdminFilter
     *
     * @var boolean
     */
    public $useAdminFilter = false;


    /**
     * pageLimit
     *
     * @var int
     */
    public $pageLimit = 20;

    /**
     * onlyNumberId
     *
     * @var boolean
     */
    public $onlyNumberId = true;

    /**
     * editScenario
     *
     * @var string
     */
    public $editScenario = null;

    /**
     * _filter
     *
     * @var CFormModel
     */
    private $_filter;

    /**
     * _modelSearcher
     *
     * @var CModel
     */
    private $_modelSearcher;

    /**
     * _modelLoader
     *
     * @var CModel
     */
    private $_modelLoader;

    /**
     * _modelCreator
     *
     * @var \Closure
     */
    private $_modelCreator;


    /**
     * Gets the value of modelSearcher
     *
     * @return CModel
     */
    public function getModelSearcher()
    {
        if (!isset($this->_modelSearcher)) {
            $nameModel = $this->nameModel;
            $this->_modelSearcher = $nameModel::model();
        }
        return $this->_modelSearcher;
    }
    
    /**
     * Sets the value of modelSearcher
     *
     * @param \CModel  $modelSearcher 
     */
    public function setModelSearcher(\CModel $modelSearcher)
    {
        $this->_modelSearcher = $modelSearcher;
        return $this;
    }

    /**
     * Gets the value of modelLoader
     *
     * @return \CModel
     */
    public function getModelLoader()
    {
        if (!isset($this->_modelLoader)) {
            $nameModel = $this->nameModel;
            $this->_modelLoader = $nameModel::model();
        }
        return $this->_modelLoader;
    }
    
    /**
     * Sets the value of modelLoader
     *
     * @param \CModel  $modelLoader 
     */
    public function setModelLoader(\CModel $modelLoader)
    {
        $this->_modelLoader = $modelLoader;
        return $this;
    }
    
    
    /**
     * Gets the value of modelCreator
     *
     * @return \Closure
     */
    public function getModelCreator()
    {
        if (!isset($this->_modelCreator)) {
            $nameModel = $this->nameModel;
            $this->_modelCreator = function () use ($nameModel) {
                return new $nameModel();
            };
        }
        return $this->_modelCreator;
    }
    
    /**
     * Sets the value of modelCreator
     *
     * @param \Closure $modelCreator 
     */
    public function setModelCreator($modelCreator)
    {
        $this->_modelCreator = $modelCreator;
        return $this;
    }
    
    

    /**
     * getFilter
     *
     * @return CFormModel
     */
    public function getFilter()
    {
        if (!isset($this->_filter)) {
            $this->_filter = new \AdminFilter();
        }

        return $this->_filter;
    }

    /**
     * setFilter
     *
     * @param CFormModel $filter
     * @return void
     */
    public function setFilter(\CFormModel $filter)
    {
        $this->_filter = $filter;
    }

    /**
     * Действие по умолчанию для модели
     * 
     *
     * Создаем Провайдер данных для этой модели
     * Применяем к нему фильтр, сортировку, пейджинг
     *
     * Показывем страницу с даннным провайдером
     *
     */
    public function actionIndex($page = 1, $order = "default", $dir = 1)
    {
        //Неправильная страница
        if (!is_numeric($page)) {
            throw new \CHttpException('404', 'Неправильная страница');
        }
       
        //Получаем все данные модели
        $dataProvider = new \Design\Data\DataProvider($this->getModelSearcher());

        //Обрабатываем фильтр
        if ($this->useAdminFilter) {
            $this->owner->filter = $this->getFilter();
            $nameFilter = get_class($this->owner->filter);
            if (isset($_GET[$nameFilter])  ) {
                $this->owner->filter->fillData($_GET[$nameFilter]);
            }
        
            $dataProvider->setFilter($this->owner->filter);
        }

        $dataProvider->setSort($order, $dir);
        $dataProvider->setPage($page, $this->pageLimit);
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
        $filter = $this->getFilter();
        $filter->text = $query;

        $rows = $this->modelLoader->applySearch($filter)->last(50)->findAll();
        $items = array();
        foreach ($rows as $row) {
            $items[] = array(
                'id' => $row[$idField],
                'label' => $row[$titleField],
                'value' => $row[$idField]
            );
        }


        \Yii::app()->ajax->ajaxRespond(true, 'Данные выданы', $items);
    }



    /**
     * Действие для добавления модели
     *
     * Создаем новый объект
     * Указываем параметры необходимые при
     * создании
     *
     * Редиректим на страницу редактирования 
     * данного объекта
     * что данный объект только создался
     *
     */
    public function actionAdd($defaultAttributes = array())
    {
        $defaultAttributes['title'] = 'Пустой объект';

        //При добавлении объекта мы автоматом создаем
        //объект шаблон
        $item = $this->modelCreator();
        $item->attributes = $defaultAttributes;

        if (!$item->save()) {
            $this->flashErrors($item);
            $this->owner->redirect($this->buildRedirectUrl($item));
        }

        //Вытаскиваем ID
        $id = $item->id;

        //Редиректим пользователя на нужную страницу
        $this->owner->redirect(array("edit","id" => $id));

    }

    /**
     * Действие для редактирования модели
     *
     * Если переданы параметры в POST[nameModel]
     * Ищем объект по id из GET[id]
     * Сохраняем его
     * В случае успеха редирект на index страницу
     * При ошибках - текущую страницу с ошибками
     *
     * Если параметры не переданы
     * просто показываем на текущей странице объект
     *
     */
    public function actionEdit($id)
    {
        $item = $this->loadModelById($id);
        $nameModel = $item->getNameModel();

        //check scenario
        if (isset($this->editScenario)) {
            $item->setScenario($this->editScenario);
        }

        //Если заданы данные модели
        //значит обновляем модель
        if (isset($_POST[$nameModel])) {
            $item->attributes = $_POST[$nameModel];

            if ($item->save()) {
                $this->afterSave($item);
                return;
            }

            //save and debug
            $this->sendErrors($item);

        } else {
            \Yii::app()->user->returnUrl = \GetUrl::referrerUrl('index');
        }


        $this->owner->render(
            'edit', array(
                'item' => $item,
                'id' => $id
            )
        );
    }

    /**
     * sendErrors
     *
     * @param \CModel $item
     * @return void
     */
    public function sendErrors(\CModel $item)
    {
        if (\Yii::app()->request->isAjaxRequest) {
            $errorString = '';
            foreach ($item->errors as $field => $errors) {
                $errorString = implode(', ', $errors);
                
            }
            $this->owner->throwValidateErrors($item, $errorString);
        } else {
            $this->flashErrors($item);
        }
    }

    /**
     * afterSave
     *
     * @param \CModel $item
     * @return void
     */
    private function afterSave($item)
    {
        if (\Yii::app()->request->isAjaxRequest) {
            \Yii::app()->ajax->ajaxRespond(true, 'Данные верны.');
        } else {
            $this->owner->redirect($this->buildRedirectUrl($item));
        }
    }


    /**
     * flashErrors
     *
     * @param \CModel $item
     * @return void
     */
    private function flashErrors(\CModel $item)
    {
        foreach ($item->errors as $field => $errors) {
            \Yii::app()->user->setFlash('error', implode(', ', $errors));
            
        }
    }

    /**
     * actionView
     * 
     * @param type $id
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
     * Действие для удаления
     * Удаление происходит 
     * 
     * либо для присланного по GET id объекта
     *
     * либо для всех id объектов 
     * присланных в POST serialize(array)
     *
     * Если запрос был послан по ajax 
     * выводит алерт
     *
     * Если запрос был послан не по ajax
     * редирет на index страницу
     *
     */
    public function actionDelete()
    {
        if (!isset($_REQUEST['id'])) {
            throw new \CHttpException('404', "Не прислан идентификатор");
        }
        $id = $_REQUEST['id'];
        if (!$this->validateDeleteId($id)) {
            throw new \CHttpException('404', "Не верный идентификатор");
        }

        $items = $this->modelLoader->findAllByPk($id);
        try {
            foreach ($items as $item) {
                $item->delete();
            }
        } catch (\Exception $exc) {
            throw new \CHttpException('404', $exc->getMessage());;
        }


        //Если мы не в Ajax
        if (!(\Yii::app()->request->isAjaxRequest)) {
            $this->owner->redirect($this->buildRedirectUrl($item));
        }

        \Yii::app()->ajax->delMessage(true, $id);
    }
    
    /**
     * actionAddList
     * добавляет значение в элемент addList
     * @throws \CHttpException
     */
    public function actionAddList()
    {
        $item = $this->modelCreator();
        if (isset($_REQUEST['addSelect'])) {
            $item->title = $_REQUEST['addSelect'];
            if (!$item->save()) {
                throw new \CHttpException(
                    '404', 'Неверный параметр ' . print_r($item->errors, true) 
                );
            }
            \Yii::app()->ajax->ajaxRespond(true, 'Данные верны.');
        }
    }

    /**
     * Действие для сохранения порядка
     *
     * Работает для POST массива serialize
     * serialize = array( index = sort, id = id)
     *
     *
     * Сохраняет для всех объектов с id 
     * в массиве serialize
     * параметр sort = параметр index из
     * массива serialize 
     *
     */
    public function actionSaveSort()
    {
        $sortings = $_POST;
        if (!is_array($sortings)) {
            throw new CHttpException('404', "Идентификаторы модели не верные");
        }
        foreach ($sortings as $id => $sort) {
            if (!is_numeric($id) or !is_numeric($sort)) {
                throw new CHttpException('404', "Идентификаторы модели не числовые");
            }
        }

        //Результат сортировки
        $result = false;

        //Для каждого элемента
        foreach ($sortings as $id => $sort) {
            //Меняем порядок
            $result = $this->modelLoader->updateByPk($id, array('sort' => $sort));
        }

        //Выводим результат
        \Yii::app()->ajax->sendRespond(true, "Сортировка прошла успешно", $result);
    }


    /**
     * validateDeleteId
     *
     * @param int $id
     * @return boolean
     */
    public function validateDeleteId($id)
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
     * buildRedirectUrl
     *
     * @param mixed $item
     * @return void
     */
    protected function buildRedirectUrl($item)
    {
        if (!isset($this->redirectUrl)) {
            $prevUrl = \Yii::app()->user->returnUrl;
            $currentRoute = \Yii::app()->controller->getRoute();
            $defaultUrl = \GetUrl::url('index');
            if (strpos($prevUrl, $defaultUrl) !== false && strpos($prevUrl, $currentRoute) === false) {
                return $prevUrl;
            }

            return $defaultUrl;
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
        if ($this->onlyNumberId and !is_numeric($id)) {
            throw new \CHttpException('404', 'Идентификатор не верный');
        }
        $item = $this->modelLoader->findByPk($id);
        if(!isset($item))
            throw new \CHttpException('404', 'Идентификатор не верный');

        return $item;      
    }





}
