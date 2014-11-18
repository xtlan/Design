<?php
/**
 * TagsField
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
namespace Design\Field;

class TagsField extends AbstractModelField
{

    /**
     * valueField
     *
     * @var string (default = title)
     */
    private $_valueField = 'title';

    /**
     * urlList
     * url для получения данных 
     * для заполнения выпадающего списка
     *
     * @var string
     */
    private $_urlList;


    /**
     * Gets the value of urlList
     *
     * @return string
     */
    public function getUrlList()
    {
        return $this->_urlList;
    }

    /**
     * Sets the value of urlList
     *
     * @param string $urlList 
     */
    public function setUrlList($urlList)
    {
        $this->_urlList = $urlList;
        return $this;
    }


    /**
     * Gets the value of valueField
     *
     * @return string
     */
    public function getValueField()
    {
        return $this->_valueField;
    }

    /**
     * Sets the value of valueField
     *
     * @param string $valueField 
     */
    public function setValueField($valueField)
    {
        $this->_valueField = $valueField;
        return $this;
    }



    /**
     * getValue
     *
     * @return mixed
     */
    public function getValue()
    {
        if (!isset($this->_value)) {
            $nameField = $this->field;
            $value = $this->model->$nameField;

            if ($this->isItems($value)) {
                $this->_value = $this->getValueByItems($value);
            } else {
                $this->_value = $this->getValueByIds($value);
            }
        }
        return $this->_value;
    }

    /**
     * run
     *
     * @return void
     */
    public function run() 
    {
        $this->render('tagsField/index');
    }


    /**
     * getValueByIds
     *
     * @param array $ids
     * @return array
     */
    private function getValueByIds(array $ids)
    {
        $values = array();

        if (!empty($ids)) {
            $modelRelation = $this->getModelRelationByField($this->field);
            $items = $modelRelation->findAllByPk($ids);

            $values = \CHtml::listData($items, 'id', $this->valueField);
        }

        return $values;
    }

    /**
     * getValueByItems
     *
     * @param array $items
     * @return array
     */
    private function getValueByItems($items)
    {
        $values = array();
        foreach ($items as $item) {
            $values[$item->getPrimaryKey()] = $item->getAttribute($this->valueField);
        }
        return $values;
    }

    /**
     * isItems
     *
     * @param array $values
     * @return boolean
     */
    private function isItems(array $values)
    {
        if (isset($values[0])) {
            return $values[0] instanceof CActiveRecord;
        }
        return false;
    }

    /**
     * getModelRelationByField
     *
     * @param string $field
     * @return CActiveRecord
     */
    private function getModelRelationByField($field)
    {
        $nameRelation = $field;
        $activeRelation = $this->model->getActiveRelation($nameRelation);
        if (!isset($activeRelation)) {
            throw new \Exception("relation with name $nameRelation not exit.");
        }
        $classRelation = $activeRelation->className;

        return new $classRelation();
    }





}
