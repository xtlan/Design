<?php
namespace Xtlan\Design\ModelTable\Menu;

use Xtlan\Design\ModelTable\ResultInterface;

/**
 * CallbackButton
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class CallbackButton implements ResultInterface
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
     * getResult
     *
     * @return void
     */
    public function getResult()
    {
        $callback = $this->_callback;
        $callback();
    }

} 
