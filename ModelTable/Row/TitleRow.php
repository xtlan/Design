<?php
namespace Design\ModelTable\Row;
/**
 * TitleRow
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class TitleRow extends \RenderComponent implements RowInterface
{

    /**
     * _titleField
     *
     * @var string
     */
    private $_titleField;

    /**
     * _titleUrlCallback
     *
     * @var \Closure
     */
    private $_titleUrlCallback;


    /**
     * __construct
     *
     * @param string $titleField
     * @param \Closure $titleUrlCallback
     * @return void
     */
    public function __construct($titleField = 'title', \Closure $titleUrlCallback = null)
    {
        $this->_titleField = $titleField;
        $this->_titleUrlCallback = $titleUrlCallback;
    }

    /**
     * render
     *
     * @param \CModel $row
     * @return void
     */
    public function render(\CModel $row)
    {
        $field = $this->_titleField;
        $title = $row->$field;
        $titleUrl = $this->getTitleUrl($row);

        $this->renderFile('titleRow.php', array(
            'title' => $title,
            'titleUrl' => $titleUrl
        ));
    }


    /**
     * getTitleUrl
     *
     * @param CModel $row
     * @return void
     */
    protected function getTitleUrl(\CModel $row) 
    {
        if (isset($this->_titleUrlCallback)) {
            return call_user_func($this->_titleUrlCallback, $row);
        }

        return \GetUrl::url('edit', array('id' => $row->id));
    }


}
