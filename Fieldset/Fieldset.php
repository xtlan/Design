<?php

/**
 * Description of Fieldset
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */
namespace Design\Fieldset;
/**
 * Fieldset
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class Fieldset extends \CWidget
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
        if ($this->showLabel == false) {
            $this->showContent = true;
        }

        $this->render('fieldset/start', 
            array(
                'label' => $this->label
            )
        );
    }

    /**
     * run
     */
    public function run()
    {
        $this->render('fieldset/end');
    }
}
