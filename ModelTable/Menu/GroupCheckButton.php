<?php

/**
 * Description of GroupDeleteButton
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */
namespace Design\ModelTable\Menu;

class GroupCheckButton extends \RenderComponent implements ButtonInterface
{


    public function __construct()
    {
    }

    /**
     * render
     * 
     */
    public function render()
    {
        $this->renderFile(
            'groupCheckButton.php'
        );
    }
}
