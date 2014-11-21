<?php
namespace Xtlan\Design\Fieldset;
/**
 * Description of ViewFieldset
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */
class ViewFieldset extends Fieldset
{
    /**
     * model
     * @var CActiveRecord 
     */
    public $model;

    /**
     * fields
     * @var array of ViewFieldInterface
     */
    public $fields = array();

    /**
     * run
     */
    public function run()
    {
        $content = $this->render(
            'viewFieldset/index',
            array(
                'model' => $this->model,
                'fields' => $this->fields
            )
        );

        return $content . parent::run();
    }
}
