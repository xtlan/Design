<?php

/**
 * Description of GroupButton
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */
namespace Design\ModelTable\Menu;

class GroupButton extends \RenderComponent implements ButtonInterface
{
    /**
     *
     * @var type 
     */
    private $_buttons = array();

    /**
     * 
     * @param array $buttons
     */
    public function __construct(array $buttons)
    {
        $this->_buttons = $buttons;
    }

    /**
     * render
     * 
     */
    public function render()
    {
        $this->renderFile(
            'groupButton.php',
            array(
                'buttons' => $this->_buttons
            )
        );
    }
}
