<?php
/**
 * UrlField
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
namespace Design\Field;

class UrlField extends AbstractModelField
{


    /**
     * ВЫполнить виджет
     *
     * @access public
     * @return void
     */
    public function run() {

        $this->render('urlField/index');

    }

}
