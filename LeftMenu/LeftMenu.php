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
        ob_start();
    }
    
    public function run()
    {
        $content = ob_get_clean();
        return $this->render('leftMenu/index', ['content' => $content]);
    }
}
