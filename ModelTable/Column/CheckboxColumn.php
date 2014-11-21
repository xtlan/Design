<?php
namespace Xtlan\Design\ModelTable\Column;

use yii\base\Model;

/**
 * CheckboxColumn
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class CheckboxColumn extends FieldColumn
{

    /**
     * render
     * 
     * @param Model $row
     */
    public function getResult(Model $row)
    {
        $field = $this->_field;

        return $this->render(
            'checkboxColumn',
            array(
                'width' => $this->_width,
                'value' => $row->$field,
                'label' => $this->getLabel($row)
            )
        );
    }
}
