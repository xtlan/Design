<?php
namespace Xtlan\Design\LeftMenu;

use yii\base\Widget;

/**
 * Description of PointMenu
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */

class PointMenu extends Widget
{
    /**
     *
     * @var type 
     */
    public $label = '';

    /**
     *
     * @var type 
     */
    public $links = array();

    /**
     *
     * @var type 
     */
    protected $_active = false;


    /**
     * getActive
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->_active;
    }

    /**
     * run
     */
    public function run()
    {
        //Собираем массив пунктов для печати
        foreach ($this->links as $link) {
            if ($link->url->isCurrent()) {
                $this->_active = true;
                break;
            }
        }

        return $this->render('pointMenu/index', ['links' => $this->links, 'label' => $this->label]);
    }
}
