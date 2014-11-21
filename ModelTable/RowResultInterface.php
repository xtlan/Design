<?php
namespace Xtlan\Design\ModelTable;

use yii\base\Model;

/**
* RowResultInterface
*
* @version 1.0.0
* @author Kirya <cloudkserg11@gmail.com>
*/
interface RowResultInterface
{

    /**
     * getResult
     *
     * @param Model $row
     * @return string
     */
    public function getResult(Model $row);
    
}
