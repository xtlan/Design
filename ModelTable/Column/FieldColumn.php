<?php
namespace Xtlan\Design\ModelTable\Column;

use yii\base\Widget;
use yii\base\Model;
use Xtlan\Design\ModelTable\RowResultInterface;

/**
 * FieldColumn
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class FieldColumn extends Widget implements RowResultInterface
{


    /**
     *
     * @var string 
     */
    protected $_field;

    /**
     *
     * @var string 
     */
    protected $_label;

    /**
     * _width
     *
     * @var string|null
     */
    protected $_width;

    
    /**
     * __construct
     *
     * @param strng $field
     * @param string $label
     * @param string $width
     * @return void
     */
    public function __construct($field, $label = null, $width = null)
    {
        $this->_field = $field;
        $this->_label = $label;
        $this->_width = $width;
    }

    /**
     * getLabel
     * 
     * @param Model $model
     */
    protected function getLabel(Model $model)
    {
        if ($this->_label == null) {
            $this->_label = $model->getAttributeLabel($this->_field);
        }
        
        return $this->_label;
    }

    /**
     * getResult
     * 
     * @param Model $row
     */
    public function getResult(Model $row)
    {
        $field = $this->_field;
        $value = $row->$field;

        return $this->render(
            'fieldColumn',
            array(
                'value' => $value, 
                'label' => $this->getLabel($row),
                'width' => $this->_width
            )
        );
    }

}
