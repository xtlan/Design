<?php
namespace Design\Header;
/**
 * Title
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class Title extends \CWidget
{
    /**
     * links
     *
     * @var array of \CHtml
     */
    public $links = array();

    /**
     * run
     *
     * @return void
     */
    public function run()
    {
        
        $this->render('title', array('links' => $this->links));
    
    }


}
