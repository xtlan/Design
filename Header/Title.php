<?php
namespace Xtlan\Design\Header;

use yii\base\Widget;

/**
 * Title
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class Title extends Widget
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
        
        return $this->render('title', ['links' => $this->links]);
    
    }


}
