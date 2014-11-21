<?php
namespace Xtlan\Design\ModelTable\Row\Button;


use yii\base\Widget;
use Xtlan\Design\ModelTable\RowResultInterface;

/**
 * Description of Button
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */
class Button extends Widget implements RowResultInterface
{
    /**
     *
     * @var type 
     */
    private $_label;

    /**
     *
     * @var type 
     */
    private $_callback;

    /**
     * 
     * @param type $label
     * @param \Closure $callback
     */
    public function __construct($label, \Closure $callback)
    {
        $this->_label = $label;
        $this->_callback = $callback;
    }

    /**
     * getResult
     * 
     * @param Model $row
     */
    public function getResult(Model $row)
    {
        $callback = $this->_callback;
        $url = $callback($row);
        return $this->render(
            'button',
            array(
                'url' => $url,
                'label' => $this->_label
            )
        );
    }
}
