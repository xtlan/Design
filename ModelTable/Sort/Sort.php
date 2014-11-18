<?php

/**
 * Description of Sort
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */
namespace Design\ModelTable\Sort;

class Sort extends \RenderComponent
{
    /**
     *
     * @var array
     */
    private $_elements = array();
    
    /**
     * 
     * @param array $elements
     */
    public function __construct(array $elements)
    {
        $this->_elements = $elements;
    }

    /**
     * render
     */
    public function render()
    {
        $this->renderFile(
            'sort.php',
            array(
                'elements' => $this->_elements,
                'currentElement' => $this->getCurrentElement()
            )
        );
    }


    /**
     * getCurrentElement
     * 
     * @return null
     */
    private function getCurrentElement()
    {
        foreach ($this->_elements as $element) {
            if ($element->isCurrent()) {
                return $element;
            }
        }
        
        return null;
    }
}
