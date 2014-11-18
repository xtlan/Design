<?php
namespace Design\ModelTable\Row;
/**
 * ButtonInterface
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
interface ButtonInterface
{
    /**
     * render
     *
     * @param \CModel $row
     * @return void
     */
    public function render(\CModel $row);
}
