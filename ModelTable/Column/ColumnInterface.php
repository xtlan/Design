<?php
namespace Xtlan\Design\ModelTable\Column;

/**
* ColumnInterface
*
* @version 1.0.0
* @author Kirya <cloudkserg11@gmail.com>
*/
interface ColumnInterface
{

    /**
     * getResult
     *
     * @param mixed $row
     * @return void
     */
    public function getResult($row);
    
}
