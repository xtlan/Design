<?php
namespace Xtlan\Design\ModelTable\Menu;

/**
 * Description of GroupDeleteButton
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */

use yii\base\Widget;
use Xtlan\Design\ModelTable\ResultInterface;

class GroupCheckButton extends Widget implements ResultInterface
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
            'groupCheckButton'
        );
    }
}
