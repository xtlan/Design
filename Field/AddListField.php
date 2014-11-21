<?php

namespace Xtlan\Design\Field;

/**
 * Description of AddListField
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */

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
        return $this->render(
            'addListField/index',
            [
                'errors'      => $this->errors,
                'inputName'   => $this->inputName,
                'value'       => $this->value,
                'options'     => $this->getOptions(),
                'prompt'      => $this->getPrompt(),
                'isEmpty'     => $this->getIsEmpty(),
                'inputId'     => $this->inputId,
                'htmlOptions' => $this->htmlOptions,
                'label'       => $this->getLabel(),
                'url'         => $this->getUrl()
            ]
        );
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