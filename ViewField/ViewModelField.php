<?php
namespace Design\ViewField;
/**
 * ViewModelField
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class ViewModelField implements ViewFieldInterface
{
    /**
     * _label
     *
     * @var string
     */
    private $_label;

    /**
     * _value
     *
     * @var string
     */
    private $_value;

    /**
     * __construct
     *
     * @param CModel $item
     * @param string $field
     * @return void
     */
    public function __construct(\CModel $item, $field)
    {
        $this->_label = $item->getAttributeLabel($field);
        $this->_value = $item->getAttribute($field);
    
    }

    /**
     * getValue
     *
     * @return string
     */
    public function getValue()
    {
        return $this->_value;
    }

    /**
     * getLabel
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->_label;
    }

}
