<?php
namespace Xtlan\Design\LeftMenu;

use yii\base\Widget;

/**
 * Description of PointMenu
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */

class OnePointMenu extends Widget
{

    /**
     * link
     *
     * @var ALink
     */
    public $link;


    /**
     * run
     */
    public function run()
    {
        return $this->render('onePointMenu/index', array('link' => $this->link));
    }
}
