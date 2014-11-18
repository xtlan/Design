<?php

/**
 * Description of Breadcrumb
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */
namespace Design\Header;

class Breadcrumb extends \CWidget
{
    /**
     *
     * @var type 
     */
    public $links = array();

    /**
     * run
     */
    public function run()
    {
        $breadcrumbHelper = new \ArrayHelper($this->links);
        $this->render(
            'breadcrumb',
            array(
                'links' => $this->links,
                'breadcrumbHelper' => $breadcrumbHelper
            )
        );
    }
}
