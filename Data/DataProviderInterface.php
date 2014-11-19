<?php
namespace Xtlan\Design\Data;

/**
* DataProviderInterface
*
* @version 1.0.0
* @author Kirya <cloudkserg11@gmail.com>
*/
interface DataProviderInterface
{

    /**
     * getAllModels
     *
     * @return array
     */
    public function getAllModels();

    /**
     * getPrevRow
     *
     * @return mixed
     */
    public function getPrevRow();

    /**
     * getNextRow
     *
     * @return mixed
     */
    public function getNextRow();
    
}
