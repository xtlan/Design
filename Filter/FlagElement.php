<?php

/**
 * Description of FlagElement
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */
namespace Xtlan\Design\Filter;

class FlagElement extends FilterElement
{
    const TYPE = 'flag';

    /**
     *
     * @var array 
     */
    private $_options = array('1' => 'Да', '0' => 'Нет');
    
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
     *
     * @return void
     */
    public function renderElement()
    {
        return $this->render(
            'flagElement/index',
            array(
                'options' => $this->_options
            )
        );
    }

    /**
     * renderSaveElement
     *
     * @return void
     */
    public function renderSaveElement()
    {
        return $this->render(
            'flagElement/save',
            array(
                'title' => $this->title,
                'value' => $this->value
            )
        );
    }
}
