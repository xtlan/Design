<?php
namespace Design\ModelTable\Column;
/**
 * TitleColumn
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class TitleColumn extends \RenderComponent implements ColumnInterface
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
     * render
     * 
     * @param \CModel $row
     */
    public function render(\CModel $row)
    {
        $value = $row->getAttribute($this->_field);

        $url = \GetUrl::url('edit', array('id' => $row->id));

        $this->renderFile(
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
