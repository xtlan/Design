<?php
/**
 * Description of ButtonInterface
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */
namespace Design\ModelTable\Row;
/**
 * RowInterface
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
interface RowInterface
{
    /**
     * render
     *
     * @param \CModel $row
     * @return void
     */
    public function render(\CModel $row);
}
