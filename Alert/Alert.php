<?php
namespace Design\Alert;
/**
 * Alert
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class Alert extends \CWidget
{

    



    /* public run() {{{ */
    /**
     * run
     * Функция для запуска виджета
     *
     * @access public
     * @return void
     */
    public function run() 
    {
        $flashes = \Yii::app()->user->getFlashes();
        $this->render('alert', array('flashes' => $flashes));
    }



}
