<?php
namespace Xtlan\Design\ModelTable\Column;

use yii\base\Widget;

/**
 * Column
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class Column extends Widget implements ColumnInterface
{

    /**
     * _callback
     * @var type 
     */
    private $_callback;
    
    /**
     * _label
     * @var string
     */
    private $_label;

    /**
     * _width
     *
     * @var string|null
     */
    private $_width;

    /**
     * __construct
     *
     * @param string $label
     * @param \Closure $callback
     * @param string|null $width
     * @return void
     */
    public function __construct($label, \Closure $callback, $width = null)
    {
        $this->_label = $label;
        $this->_callback = $callback;
        $this->_width = $width;
    }


    /**
     * getResult
     * 
     * @param mixed $row
     */
    public function getResult($row)
    {
        return $this->render(
            'column',
            [
                'label' => $this->_label,
                'width' => $this->_width,
                'callback' => $this->_callback,
                'row' => $row
            ]
        );
    }
}
