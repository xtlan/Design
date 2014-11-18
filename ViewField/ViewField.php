<?php
namespace Design\ViewField;
/**
 * Field
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class ViewField implements ViewFieldInterface
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
     * @param string $label
     * @param string $value
     * @return void
     */
    public function __construct($label, $value)
    {
        $this->_label = $label;
        $this->_value = $value;
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

    /**
     * getValue
     *
     * @return string
     */
    public function getValue()
    {
        return $this->_value;
    }


}
