<?php
namespace Design\Fieldset;
/**
 * Menu
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class Menu extends \CWidget
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
            $this->cancelUrl = \GetUrl::url('index');
        }
        $this->render('menu/index');
    }
}
