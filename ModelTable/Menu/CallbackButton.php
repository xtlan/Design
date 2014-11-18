<?php
namespace Design\ModelTable\Menu;

/**
 * CallbackButton
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class CallbackButton implements ButtonInterface
{

    /**
     * _callback
     *
     * @var mixed
     */
    private $_callback;

    /**
     * 
     * @param \Design\ModelTable\Row\\Callback $callback
     */
    public function __construct(\Closure $callback)
    {
        $this->_callback = $callback;
    }

    /**
     * render
     * 
     * @param \CModel $row
     */
    public function render()
    {
        $callback = $this->_callback;
        $callback();
    }

} 
