<?php
namespace Xtlan\Design\Alert;

use yii\base\Widget;
use Yii;

/**
 * Alert
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class Alert extends Widget
{

    



    /**
     * run
     *
     * @return void
     */
    public function run() 
    {
        $flashes = Yii::$app->session->getAllFlashes();
        return $this->render('alert', array('flashes' => $flashes));
    }



}
