<?php

/**
 * Description of GroupDeleteButton
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */
namespace Xtlan\Design\ModelTable\Menu;

use yii\base\Widget;
use Xtlan\Core\Helper\GetUrl;
use Xtlan\Design\ModelTable\ResultInterface;

class GroupDeleteButton extends Widget implements ResultInterface
{

    /**
     * _url
     *
     * @var string
     */
    private $_url;

    public function __construct($url = null)
    {
        $this->_url = isset($url) ? $url : GetUrl::url('delete');
    }

    /**
     * getResult
     *
     * @return void
     */
    public function getResult()
    {
        return $this->render(
            'groupDeleteButton',
            array('url' => $this->_url)
        );
    }
}
