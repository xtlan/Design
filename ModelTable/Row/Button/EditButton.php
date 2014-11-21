<?php
namespace Xtlan\Design\ModelTable\Row\Button;

use Xtlan\Design\ModelTable\RowResultInterface;
use yii\base\Widget;
use yii\base\Model;
use Xtlan\Core\Helper\GetUrl;

/**
 * EditButton
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class EditButton extends Widget implements RowResultInterface
{

    /**
     *
     * @var string 
     */
    private $_route;

    /**
     * 
     * @param type $route
     */
    public function __construct($route = null)
    {
        $this->_route = isset($route) ? $route : 'edit';
    }

    /**
     * getResult
     * 
     * @param Model $row
     */
    public function getResult(Model $row)
    {
        $url = GetUrl::url($this->_route, array('id' => $row->id));
        return $this->render(
            'editButton',
            array('url' => $url)
        );
    }

}
