<?php

/**
 * Description of ListElement
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */
namespace Xtlan\Design\Filter;

class ListElement extends FilterElement
{
    const TYPE = 'list';
 
    /**
     *
     * @var array 
     */
    private $_options = array();
    
    /**
     *
     * @var type 
     */
    private $_prompt;
    
    /**
     *
     * @var boolean
     */
    private $_isEmpty;

    /**
     * 
     * @param string $field
     * @param array $options
     * @param boolean $isEmpty
     */
    public function __construct($field, $options, $prompt = 'Выберите условие')
    {
        $this->_field = $field;
        $this->_options = $options;
        $this->_prompt = $prompt;
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
     *
     * @return void
     */
    public function renderElement()
    {
        return $this->render(
            'listElement/index',
            [
                'id' => $this->getFieldId(),
                'model' => $this->model,
                'field' => $this->_field,
                'options' => $this->_options,
                'prompt'  => $this->_prompt
            ]
        );
    }

    /**
     * renderSaveElement
     *
     * @return void
     */
    public function renderSaveElement()
    {
        $value = isset($this->_options[$this->value]) ? $this->_options[$this->value] : $this->value;
        return $this->render(
            'listElement/save',
            array(
                'id' => $this->getFieldId(),
                'model' => $this->model,
                'field' => $this->_field,
                'title' => $this->getTitle(),
                'value' => $value
            )
        );
    }
}
