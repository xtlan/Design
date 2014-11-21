<?php
namespace Xtlan\Design\ModelTable\Row\Button;

use Xtlan\Design\ModelTable\RowResultInterface;

use yii\base\Widget;
use yii\base\Model;
use Xtlan\Core\Helper\GetUrl;

/**
 * Description of ViewButton
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */
class ViewButton extends Widget implements RowResultInterface
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
        $this->_route = isset($route) ? $route : 'view';
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
            'viewButton',
            array('url' => $url)
        );
    }
    
}
