<?php
namespace Design\Data;
/**
 * ArrayDataProvider
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class ArrayDataProvider extends \ArrayDataProvider
{

    /**
     * getAllRows
     *
     * @return array
     **/
    public function getAllRows()
    {
        return $this->getRows();
    }


    /**
     * getPrevRow
     *
     * @return void
     */
    public function getPrevRow()
    {
        return null;
    }

    /**
     * getNextRow
     *
     * @return void
     */
    public function getNextRow()
    {
        return null;
    }

}
