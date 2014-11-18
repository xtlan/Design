<?php

/**
 * Description of ViewButton
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */
namespace Design\ModelTable\Row;

class ViewButton extends \RenderComponent implements ButtonInterface
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
        $this->_route = isset($route) ? $route : 'view';
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
            'viewButton.php',
            array('url' => $url)
        );
    }
    
}
