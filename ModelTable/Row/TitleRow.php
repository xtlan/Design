<?php
namespace Xtlan\Design\ModelTable\Row;

use yii\base\Widget;
use Xtlan\Design\ModelTable\RowResultInterface;
use yii\base\Model;
use Xtlan\Core\Helper\GetUrl;

/**
 * TitleRow
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class TitleRow extends Widget implements RowResultInterface
{

    /**
     * _titleField
     *
     * @var string|\Closure
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
     * @param string|\Closure $titleField
     * @param \Closure $titleUrlCallback
     * @return void
     */
    public function __construct($titleField = 'title', \Closure $titleUrlCallback = null)
    {
        $this->_titleField = $titleField;
        $this->_titleUrlCallback = $titleUrlCallback;
    }


    /**
     * getResult
     *
     * @param Model $row
     * @return void
     */
    public function getResult(Model $row)
    {
        $title = $this->getTitle($row);
        $titleUrl = $this->getTitleUrl($row);

        return $this->render('titleRow', array(
            'title' => $title,
            'titleUrl' => $titleUrl
        ));
    }


    /**
     * getTitle
     *
     * @param Model $row
     * @return string
     */
    private function getTitle(Model $row)
    {
        $field = $this->_titleField;
        if (is_callable($field)) {
            return $field($row);
        }
        return $row->$field;
    }

    /**
     * getTitleUrl
     *
     * @param Model $row
     * @return void
     */
    protected function getTitleUrl(Model $row) 
    {
        if (isset($this->_titleUrlCallback)) {
            return call_user_func($this->_titleUrlCallback, $row);
        }

        return GetUrl::url('edit', array('id' => $row->id));
    }


}
