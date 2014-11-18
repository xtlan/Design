<?php

/**
 * Description of CustomTitleRow
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */

namespace Design\ModelTable\Row;

class CustomTitleRow extends \RenderComponent implements \Design\ModelTable\Row\RowInterface
{
    /**
     *
     * @var type 
     */
    private $_titleCallback;
    
    /**
     *
     * @var type 
     */
    private $_urlCallback;
    
    /**
     * 
     * @param \Closure $titleCallBack
     * @param \Closure $urlCallback
     */
    public function __construct(\Closure $titleCallBack, \Closure $urlCallback) {
        $this->_titleCallback = $titleCallBack;
        $this->_urlCallback = $urlCallback;
    }

    /**
     * render
     * 
     * @param \CModel $row
     */
    public function render(\CModel $row)
    {
        $title = call_user_func($this->_titleCallback, $row);
        $url = call_user_func($this->_urlCallback, $row);

        $this->renderFile(
            'titleRow.php',
            array(
                'title' => $title,
                'titleUrl' => $url
            )
        );
    }
}