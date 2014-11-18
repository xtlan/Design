<?php
namespace Design\ViewField;
/**
 * FieldInterface
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
interface ViewFieldInterface
{

    /**
     * getLabel
     *
     * @return string
     */
    public function getLabel();

    /**
     * getValue
     *
     * @return string
     */
    public function getValue();

}
