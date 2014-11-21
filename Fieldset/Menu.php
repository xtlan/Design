<?php
namespace Xtlan\Design\Fieldset;

use yii\base\Widget;
use Xtlan\Core\Helper\GetUrl;

/**
 * Menu
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class Menu extends Widget
{
    /**
     * cancelUr l
     *
     * @var string
     */
    public $cancelUrl;

    /**
     * run
     *
     * @return void
     */
    public function run()
    {
        if (!isset($this->cancelUrl)) {
            $this->cancelUrl = GetUrl::url('index');
        }
        return $this->render('menu/index', ['cancelUrl' => $this->cancelUrl]);
    }
}
