<?php
namespace Xtlan\Design\LeftMenu;

use yii\base\Widget;

/**
 * Description of LeftMenu
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */

class LeftMenu extends Widget
{
    public function init()
    {
        $this->render('leftMenu/start');
    }
    
    public function run()
    {
        $this->render('leftMenu/end');
    }
}
