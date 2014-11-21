<?php

/**
 * Description of Fieldset
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */
namespace Xtlan\Design\Fieldset;

use yii\base\Widget;

/**
 * Fieldset
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class Fieldset extends Widget
{

    /**
     *
     * @var strin
     */
    public $label;

    /**
     *
     * @var boolean
     */
    public $showContent = false;
    
    /**
     *
     * @var boolean
     */
    public $showLabel = true;

    /**
     * init
     */
    public function init()
    {
        parent::init();

        if ($this->showLabel == false) {
            $this->showContent = true;
        }

        ob_start();
    }

    /**
     * run
     */
    public function run()
    {
        $content = ob_get_clean();
        
        return $this->render(
            'fieldset/index', 
            [
                'content' => $content,
                'label' => $this->label,
                'showLabel' => $this->showLabel,
                'showContent' => $this->showContent
            ]
        );
    }
}
