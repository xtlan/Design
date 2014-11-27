<?php
/**
 * FieldModelInterface
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
namespace Xtlan\Design\Field;

interface FieldModelInterface
{

    /**
     * getNameModel
     *
     * @return string
     */
    public function getNameModel();

    /**
     * getAttribute
     *
     * @param string $field
     * @return mixed
     */
    public function getAttribute($field);

}