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
        parent::init();
        echo $this->render('leftMenu/start');
    }
    
    public function run()
    {
       return $this->render('leftMenu/end');
    }
}
