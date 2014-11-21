<?php
namespace Xtlan\Design\Header;

use yii\base\Widget;

/**
 * Description of Breadcrumb
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */

class Breadcrumb extends Widget
{
    /**
     *
     * @var type 
     */
    public $links = [];

    /**
     * run
     */
    public function run()
    {
        return $this->render(
            'breadcrumb',
            array(
                'links' => $this->links
            )
        );
    }
}
