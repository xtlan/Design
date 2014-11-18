<?php
/**
 * CheckboxField
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
namespace Design\Field;

class CheckboxField extends AbstractModelField
{

    /**
     * run
     *
     * @return void
     */
    public function run()
    {
        //Изменяем значение в случае -1 
        //(единица при следующем вызове)
        if ( $this->value == -1 ) {
            $this->value = 1;
        }

        $this->render('checkboxField/index');
    }

}
