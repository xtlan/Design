<?php
namespace Design\ModelTable\Menu;
/**
 * DefaultButton
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class DefaultButton implements ButtonInterface
{
    /**
     * _buttons
     *
     * @var array
     **/
    private $_buttons;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->_buttons = array(
            new AddButton(),
            new GroupButton(
                array(
                    //new GroupCheckButton(),
                    new GroupDeleteButton(),
                    new GroupSortButton()
                )
            )
        );
    }

    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        foreach ($this->_buttons as $button) {
            $button->render();
        }
    
    }



}
