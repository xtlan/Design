<?php
namespace Xtlan\Design\Filter;

use yii\base\Widget;
use yii\helpers\Url;
use Yii;
/**
 * Description of Filter
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */

class Filter extends Widget
{

    /**
     *
     * @var CModel
     */
    public $model;

    /**
     *
     * @var array of FilterElements
     */
    public $elements = array();

    /**
     * run
     *
     * @return void
     */
    public function run()
    {
        $filterUrl = $this->loadFilterUrl();
        
        foreach ($this->elements as $element) {
            $element->model = $this->model;
        }
        $this->render('filter/index', ['filterUrl' => $filterUrl, 'elements' => $this->elements]);
    }
    
    /**
     * loadFilterUrl
     * 
     * @return string
     */
    private function loadFilterUrl()
    {
        $params = Yii::$app->request->resolve();

        $classFilter = $this->model->formName();
        unset($params[$classFilter]);

        $params[0] = '/' . $params[0];
        return Url::toRoute($params);
    }
}
