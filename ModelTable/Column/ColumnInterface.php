<?php
namespace Design\ModelTable\Column;
/**
 * ColumnInterface
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
interface ColumnInterface
{

    /**
     * render
     * 
     * @param \CModel $row
     */
    public function render(\CModel $row);
}
