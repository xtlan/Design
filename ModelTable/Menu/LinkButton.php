<?php
namespace Design\ModelTable\Menu;
/**
 * LinkButton
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class LinkButton extends \RenderComponent implements ButtonInterface
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
     * render
     * 
     */
    public function render()
    {
        $this->renderFile(
            'linkButton.php',
            array(
                'label' => $this->label,
                'url'   => $this->url
            )
        );
    }
}
