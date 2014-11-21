<?php
namespace Xtlan\Design\ModelTable\Sort;

use Xtlan\Design\ModelTable\ResultInterface;
use yii\base\Widget;
use Xtlan\Core\Model\Query;

/**
 * Description of Sort
 *
 * @author art3mk4 <Art3mk4@gmail.com>
 */
class Sort extends Widget
{
    /**
     *
     * @var array
     */
    private $_elements = array();
    
    /**
     * 
     * @param array $elements of Element objects
     */
    public function __construct(array $elements)
    {
        $this->_elements = $elements;
    }

    /**
     * getResult
     *
     * @param Query $query
     * @return string
     */
    public function getResult(Query $query)
    {
        $elements = $this->_elements;

        $current = null;
        foreach ($elements as $element) {
            $element->setQuery($query);

            if ($element->isCurrent()) {
                $current = $element;
            }
        }

        return $this->render(
            'sort',
            array(
                'elements' => $elements,
                'currentElement' => $current
            )
        );
    }


}
