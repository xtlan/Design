<?php
namespace Xtlan\Design\ModelTable\Menu;

use yii\base\Widget;
use Xtlan\Core\Helper\GetUrl;


/**
 * GroupSortButton
 *
 * @version 1.0.0
 * @author Kirya <cloudkserg11@gmail.com>
 */
class GroupSortButton extends Widget implements ButtonInterface
{

    /**
     * _url
     *
     * @var string
     */
    private $_url;

    public function __construct($url = null)
    {
        $this->_url = isset($url) ? $url : GetUrl::url('saveSort');
    }

    /**
     * getResult
     *
     * @return void
     */
    public function getResult()
    {
        return $this->render(
            'groupSortButton.php',
            array('url' => $this->_url)
        );
    }
}
