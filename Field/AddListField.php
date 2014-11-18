<?php

/**
 * Description of AddListField
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */
namespace Design\Field;

class AddListField extends ListField
{
    /**
     *
     * @var type 
     */
    private $_url = '#';

    /**
     * run
     */
    public function run()
    {
        $this->render('addListField/index');
    }

    /**
     * setUrl
     * 
     * @param type $url
     * @return type
     */
    public function setUrl($url)
    {
        return $this->_url = $url;
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
}