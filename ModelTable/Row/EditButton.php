<?php

/**
 * Description of EditButton
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */
namespace Design\ModelTable\Row;

/**
 * EditButton
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class EditButton extends \RenderComponent implements ButtonInterface
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
        $this->_route = isset($route) ? $route : 'edit';
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
            'editButton.php',
            array('url' => $url)
        );
    }

}
