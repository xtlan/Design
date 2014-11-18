<?php
namespace Design\Widget;
/**
 * RelationList
 *
 * Виджет выводит форму для редактирования списка отношений
 * (отношения только формата HAS_MANY)
 *
 * Изначально он не показывает не одно отношение,
 * при нажатии на кнопку Добавить - 
 * он добавляет отношение в виде формы с внутренностями
 * сделаными по шаблону templateForm
 * (
 * в шаблон передается итем отношения в виде переменной $item
 * и templateParams
 * )
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class RelationList extends \CWidget
{
    /**
     * model
     *
     * @var CActiveRecord
     */
    public $model;
    /**
     * nameRelation (only HAS_MANY Relation)
     *
     * @var string 
     */
    public $nameRelation;

    /**
     * templateForm
     * path for template
     * 
     * Теmplate 
     * В шаблон передается переменная $item 
     * (которая представляет по очереди item из $model->$naameRelation)
     * + переменные из массива templateParams
     *
     * @var string
     */
    public $templateForm;

    /**
     * templateParams
     * Переменные, которые передаются в шаблон
     *
     * @var array
     */
    public $templateParams = array();
 
    /**
     * label
     *
     * @var string
     */
    public $label;

    /**
     * urlSave
     *
     */
    public $urlSave;
    /**
     * urlDelete
     *
     * @var string
     */
    public $urlDelete;

    /**
     * activeRelation
     *
     * @var CHasManyRelation
     */
    private $activeRelation;


    /**
     * init
     *
     * @return void
     */
    public function init()
    {
        $model = $this->model;
        $activeRelation = $model->getActiveRelation($this->nameRelation);
        if ($activeRelation instanceof \CHasManyRelation !== true) {
            throw new \Exception('nameRelation должно быть HAS_MANY');
        }
        $this->activeRelation = $activeRelation;

        $controllerName = lcfirst($this->activeRelation->className);
        if (!isset($this->urlSave)) {
            $this->urlSave = \GetUrl::url($controllerName . "/save");
        }
        if (!isset($this->urlDelete)) {
            $this->urlDelete = \GetUrl::url($controllerName . "/delete");
        }

        return parent::init();
    }


    /**
     * run
     *
     * @return void
     */
    public function run()
    {

        $relationModel = $this->activeRelation->className;

        $items = $this->model->getRelation($this->nameRelation);
    
        $this->render(
            'relationList/index', 
            array(
                'items' => $items,
                'relationModel' => $relationModel
            )
        );
        
    }    


    
    
}



