<?php

/**
 * Description of TextElement
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */
namespace Xtlan\Design\Filter;

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
        return $this->render(
            'textElement/index',
            [
                'id' => $this->id,
                'model' => $this->model,
                'field' => $this->_field
            ]
        );
    }

    /**
     * renderSaveElement
     */
    public function renderSaveElement()
    {
        return $this->render(
            'textElement/save',
            array(
                'id' => $this->id,
                'model' => $this->model,
                'field' => $this->_field,
                'title' => $this->title,
                'value' => $this->value,
            )
        );
    }
}
