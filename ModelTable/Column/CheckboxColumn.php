<?php
namespace Design\ModelTable\Column;
/**
 * CheckboxColumn
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class CheckboxColumn extends FieldColumn implements ColumnInterface
{


    /**
     * render
     * 
     * @param \CModel $row
     */
    public function render(\CModel $row)
    {
        $field = $this->_field;

        $this->renderFile(
            'checkboxColumn.php',
            array(
                'width' => $this->_width,
                'row' => $row,
                'value' => $row->$field
            )
        );
    }
}
