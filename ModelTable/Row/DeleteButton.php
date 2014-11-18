<?php

/**
 * Description of DeleteButton
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */
namespace Design\ModelTable\Row;

class DeleteButton extends \RenderComponent implements ButtonInterface
{
    /**
     *
     * @var string 
     */
    private $_route;

    /**
     * 
     * @param type $route
     */
    public function __construct($route = null)
    {
        $this->_route = isset($route) ? $route : 'delete';
    }

    /**
     * render
     * 
     * @param \CModel $row
     */
    public function render(\CModel $row)
    {
        $url = \GetUrl::url($this->_route, array('id' => $row->id));
        $this->renderFile(
            'deleteButton.php',
            array('url' => $url, 'id' => $row->id)
        );
    }
    
}
