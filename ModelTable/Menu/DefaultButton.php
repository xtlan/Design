<?php
namespace Xtlan\Design\ModelTable\Menu;

use Xtlan\Design\ModelTable\ResultInterface;

/**
 * DefaultButton
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class DefaultButton implements ResultInterface
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
        $this->_buttons = [
            new AddButton(),
            new GroupButton(
                array(
                    //new GroupCheckButton(),
                    new GroupDeleteButton(),
                    new GroupSortButton()
                )
            )
        ];
    }

    /**
     * getResult
     *
     * @return void
     */
    public function getResult()
    {
        $content = '';
        foreach ($this->_buttons as $button) {
            $content .= $button->getResult();
        }

        return $content;
    
    }



}
