<?php
namespace Xtlan\Design\ModelTable\Menu;

use yii\base\Widget; 
use Xtlan\Core\Helper\GetUrl;

/**
 * AddButton
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class AddButton extends Widget implements ButtonInterface
{

    /**
     * _url
     *
     * @var string
     */
    private $_url;

    /**
     * __construct
     *
     * @param mixed $url
     * @return void
     */
    public function __construct($url = null)
    {
        $this->_url = isset($url) ? $url : GetUrl::url('add');
    }

    /**
     * getResult
     * 
     */
    public function getResult()
    {
        return $this->render(
            'addButton', 
            ['url' => $this->_url]
        );
    }
}
