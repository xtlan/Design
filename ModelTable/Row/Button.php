<?php

/**
 * Description of Button
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */
namespace Design\ModelTable\Row;

class Button extends \RenderComponent implements ButtonInterface
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
     * @param \Design\ModelTable\Row\Callable $callback
     */
    public function __construct($label, \Closure $callback)
    {
        $this->_label = $label;
        $this->_callback = $callback;
    }

    /**
     * render
     * 
     * @param \CModel $row
     */
    public function render(\CModel $row)
    {
        $callback = $this->_callback;
        $url = $callback($row);
        $this->renderFile(
            'button.php',
            array(
                'url' => $url,
                'label' => $this->_label
            )
        );
    }
}
