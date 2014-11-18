<?php

/**
 * Description of ListColumn
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */
namespace Design\ModelTable\Column;

class ListColumn extends AbstractColumnField
{
    /**
     * _options
     * 
     * @var array 
     */
    private $_options;
    
    /**
     * _prompt
     * 
     * @var boolean
     */
    private $_prompt = 'Не выбрано';
    
    /**
     * _isEmpty
     * 
     * @var boolean
     */
    private $_isEmpty = false;
    
    /**
     *
     * @var type 
     */
    private $_fieldAlias = null;

    /**
     *
     * @var type 
     */
    private $_url = null;
    
    /**
     *
     * @var type 
     */
    private $_width = null;
    /**
     * construct
     * @param type $model
     * @param type $field
     * @param type $options
     * @param type $pompt
     * @param type $isEmpty
     */
    public function __construct(
        $field, $options = array(), $prompt = '',
        $url = null, $width = null, $fieldAlias = null, $isEmpty = false, 
        $label = ''
    ){
        $this->setField($field);
        $this->setFieldAlias($fieldAlias);
        $this->setOptions($options);
        $this->setPrompt($prompt);
        $this->setUrl($url);
        $this->setWidth($width);
        $this->setIsEmpty($isEmpty);
        $this->setLabel($label);
    }
    
    /**
     * setUrl
     * 
     * @param type $url
     */
    public function setUrl($url)
    {
        $this->_url = $url;
    }

    /**
     * setWidth
     * 
     * @param type $width
     */
    public function setWidth($width)
    {
        $this->_width = $width;
    }

    /**
     * getUrl
     * 
     * @return type
     */
    public function getUrl()
    {
        return $this->_url;
    }

    /**
     * getWidth
     * 
     * @return type
     */
    public function getWidth()
    {
        return $this->_width;
    }

    /**
     * setFieldAlias
     * 
     * @param type $alias
     */
    public function setFieldAlias($fieldAlias)
    {
        if (!isset($fieldAlias)) {
            $this->_fieldAlias = $this->getField();
        }
        $this->_fieldAlias = $fieldAlias;
    }

    /**
     * getFieldAlias
     * 
     * @return type
     */
    public function getFieldAlias()
    {
        return $this->_fieldAlias;
    }

    /**
     * Gets the value of isEmpty
     * 
     * @return boolean
     */
    public function getIsEmpty()
    {
        return $this->_isEmpty;
    }
    
    /**
     * setIsEmpty
     * 
     * @param type $isEmpty
     * @return \Design\ModelTable\Column\ListColumn
     */
    public function setIsEmpty($isEmpty)
    {
        $this->_isEmpty = $isEmpty;
        return $this;
    }
    
    /**
     * getPrompt
     * 
     * @return type
     */
    public function getPrompt()
    {
        return $this->_prompt;
    }
 
    /**
     * setPrompt
     * 
     * @param type $promt
     * @return \Design\ModelTable\Column\ListColumn
     */
    public function setPrompt($promt)
    {
        $this->_prompt = $promt;
        return $this;
    }
    
    /**
     * getOptions
     * 
     * @return type
     */
    public function getOptions()
    {
        if (!isset($this->_options)) {
            $modelRelation = $this->getModelRelationByField($this->field);
            $this->_options = $modelRelation->getData();
        }
        
        return $this->_options;
    }
    
    /**
     * 
     * @param array $options
     * @return \Design\ModelTable\Column\ListColumn
     */
    public function setOptions(array $options)
    {
        $this->_options = $options;
        return $this;
    }
    
    /**
     * render
     * 
     * @param \CModel $row
     */
    public function render(\CModel $row)
    {
        $this->renderFile(
            'listColumn.php',
            array(
                'row' => $row,
                'fieldAlias' => $this->getFieldAlias(),
                'field' => $this->getField()
            )
        );
    }
}