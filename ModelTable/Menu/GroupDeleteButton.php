<?php

/**
 * Description of GroupDeleteButton
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */
namespace Design\ModelTable\Menu;

class GroupDeleteButton extends \RenderComponent implements ButtonInterface
{

    /**
     * _url
     *
     * @var string
     */
    private $_url;

    public function __construct($url = null)
    {
        $this->_url = isset($url) ? $url : \GetUrl::url('delete');
    }

    /**
     * render
     * 
     */
    public function render()
    {
        $this->renderFile(
            'groupDeleteButton.php',
            array('url' => $this->_url)
        );
    }
}
