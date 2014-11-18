<?php
/**
 * DateField
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
namespace Design\Field;

class DateField extends AbstractModelField
{


    /**
     * run
     *
     * @return void
     */
    public function run() 
    {
        $this->render('dateField/index');

    }

}
