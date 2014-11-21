<?php
namespace Xtlan\Design\ModelTable\Menu;

use yii\base\Widget;
use Xtlan\Design\ModelTable\ResultInterface;

/**
 * LinkButton
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class LinkButton extends Widget implements ResultInterface
{
 
    /**
     *
     * @var type 
     */
    public $label;
    
    /**
     *
     * @var type 
     */
    public $url;

    public $class;

    /**
     * 
     * @param type $label
     * @param type $url
     */
    public function __construct($label, $url, $class = '')
    {
        $this->label = $label;
        $this->url = $url;
        $this->class = $class;
    }

    /**
     * getResult
     *
     * @return void
     */
    public function getResult()
    {
        return $this->render(
            'linkButton',
            array(
                'label' => $this->label,
                'url'   => $this->url,
                'class' => $this->class
            )
        );
    }
}
