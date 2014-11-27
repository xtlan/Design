<?php
/**
 * TagsField
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
namespace Xtlan\Design\Field;

use yii\db\ActiveRecordInteface;

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
    public $urlList;

    /**
     * valueField
     *
     * @var string
     */
    public $valueField;





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
        return $this->render(
            'tagsField/index',
            [
                'inputName'   => $this->inputName,
                'inputId'     => $this->inputId,
                'label'       => $this->getLabel(),
                'value'       => $this->getValue(),
                'errors'      => $this->errors,
                'htmlOptions' => $this->htmlOptions,
                'urlList'     => $this->urlList
            ]
        );
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
            $relationClass = $this->model->getRelation($this->field)->modelClass;

            $items = $relationClass::find()->andWhere(['id' => $ids])->all();
            $values = ArrayHelper::getColumn($items, 'id');
        }

        return $values;
    }

    /**
     * getValueByItems
     *
     * @param array $items
     * @return array
     */
    private function getValueByItems(array $items)
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
            return $values[0] instanceof ActiveRecordInteface;
        }
        return false;
    }






}
