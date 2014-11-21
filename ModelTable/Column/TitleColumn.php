<?php
namespace Xtlan\Design\ModelTable\Column;

use yii\base\Widget;
use Xtlan\Core\Helper\GetUrl;
use yii\base\Model;
use Xtlan\Design\ModelTable\RowResultInterface;

/**
 * TitleColumn
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class TitleColumn extends Widget implements RowResultInterface
{

    /**
     *
     * @var string 
     */
    private $_field;


    /**
     * _width
     *
     * @var string|null
     */
    private $_width;

    /**
     * _label
     *
     * @var string
     */
    private $_label;

    
    /**
     * __construct
     *
     * @param strng $field
     * @param string $width
     * @return void
     */
    public function __construct($field, $width = null)
    {
        $this->_field = $field;
        $this->_width = $width;
    }

    /**
     * getLabel
     * 
     * @param \CModel $model
     */
    private function getLabel(\CModel $model)
    {
        if ($this->_label == null) {
            $this->_label = $model->getAttributeLabel($this->_field);
        }
        
        return $this->_label;
    }

    /**
     * getResult
     * 
     * @param Model $row
     */
    public function render(Model $row)
    {
        $value = $row->getAttribute($this->_field);

        $url = GetUrl::url('edit', array('id' => $row->id));

        return $this->render(
            'titleColumn.php',
            array(
                'value' => $value, 
                'label' => $this->getLabel($row),
                'width' => $this->_width,
                'url' => $url
            )
        );
    }

}
