<?php

/**
 * Description of GroupDeleteButton
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */
namespace Xtlan\Design\ModelTable\Menu;

use yii\base\Widget;

class GroupCheckButton extends Widget implements ButtonInterface
{


    public function __construct()
    {
    }

    /**
     * getResult
     *
     * @return void
     */
    public function getResult()
    {
        return $this->render(
            'groupCheckButton.php'
        );
    }
}
