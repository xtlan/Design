<?php
namespace Xtlan\Design\ModelTable\Menu;

use yii\base\Widget; 
use Xtlan\Design\ModelTable\ResultInterface;

class GroupButton extends Widget implements ResultInterface
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
     * getResult
     *
     * @return void
     */
    public function getResult()
    {
        return $this->render(
            'groupButton',
            array(
                'buttons' => $this->_buttons
            )
        );
    }
}
