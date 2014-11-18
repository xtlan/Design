<?php

/**
 * Description of GroupDeleteButton
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */
namespace Design\ModelTable\Menu;

class GroupSortButton extends \RenderComponent implements ButtonInterface
{

    /**
     * _url
     *
     * @var string
     */
    private $_url;

    public function __construct($url = null)
    {
        $this->_url = isset($url) ? $url : \GetUrl::url('saveSort');
    }

    /**
     * render
     * 
     */
    public function render()
    {
        $this->renderFile(
            'groupSortButton.php',
            array('url' => $this->_url)
        );
    }
}
