<?php
namespace Xtlan\Design\Controller\Action\Crud;

use yii\base\Action as BaseAction;
use yii\db\ActiveRecordInterface;
use yii\helpers\Url;

/**
* Action
*
* @version 1.0.0
* @author Kirya <cloudkserg11@gmail.com>
*/
abstract class Action extends BaseAction
{

    /**
     * modelName
     *
     * @var string
     */
    public $modelName;

    /**
     * redirectUrl
     *
     * @var Closure|mixed
     */
    public $redirectUrl;


    /**
     * flashErrors
     *
     * @param ActiveRecordInterface $item
     * @return void
     */
    protected function flashErrors(ActiveRecordInterface $item)
    {
        foreach ($item->errors as $field => $errors) {
            Yii::$app->session->setFlash('error', implode(', ', $errors));
        }
    }

    /**
     * getRedirectUrl
     *
     * @param ActiveRecordInterface $item
     * @return string
     */
    protected function getRedirectUrl(ActiveRecordInterface $item)
    {
        if (!isset($this->redirectUrl)) {
            return $this->getBackUrl();
        }

        if (is_callable($this->redirectUrl)) {
            $redirFunction = $this->redirectUrl;
            return call_user_func($redirFunction, $item);
        }

        return $this->redirectUrl;
    }

    /**
     * getBackUrl
     *
     * @return string
     */
    protected function getBackUrl()
    {
        $prevUrl = Url::previous();
        $defaultUrl = Url::toRoute('index');
        if (strpos($prevUrl, $defaultUrl) !== false) {
            return $prevUrl;
        }

        return $defaultUrl;
    }

    
}
