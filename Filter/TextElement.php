<?php

/**
 * Description of TextElement
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */
namespace Design\Filter;

class TextElement extends FilterElement
{
    const TYPE = 'text';

    /**
     * 
     * @param string $field
     */
    public function __construct($field)
    {
        $this->_field = $field;
    }

    /**
     * hasSaveElement
     * 
     * @return boolean
     */
    public function hasSaveElement()
    {
        if (isset($this->value)) {
            return true;
        }
        return false;
    }

    /**
     * renderElement
     */
    public function renderElement()
    {
        $this->renderFile(
            'textElement/index.php',
            array()
        );
    }

    /**
     * renderSaveElement
     */
    public function renderSaveElement()
    {
        $this->renderFile(
            'textElement/save.php',
            array(
                'title' => $this->title,
                'value' => $this->value,
            )
        );
    }
}
