<?php
namespace Xtlan\Design\Data;

use yii\data\ArrayDataProvider as BaseProvider;


/**
 * ArrayDataProvider
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class ArrayDataProvider extends BaseProvider implements DataProviderInterface
{

    /**
     * getAllModels
     *
     * @return array
     **/
    public function getAllModels()
    {
        return $this->getModels();
    }


    /**
     * getPrevRow
     *
     * @return void
     */
    public function getPrevRow()
    {
        return null;
    }

    /**
     * getNextRow
     *
     * @return void
     */
    public function getNextRow()
    {
        return null;
    }

}
