<?php


namespace MarsApp\RoverMapping;

use MarsApp\RoverMapping\Data\DataBuilder;
use MarsApp\Request\Parameters;

class RoverController
{
    /**
     * @param Parameters $parameters
     * @throws Exceptions\MoveSequenceException
     * @throws Exceptions\PositionSequenceException
     */
    public function move(Parameters $parameters)
    {
        $dataBuilder = new DataBuilder($parameters);
        $endGrid = $dataBuilder->mapGrid();
        $map = new Map($endGrid);

        $sequenceCollection = $dataBuilder->build();

        $init = new RoverInitialization();
        $arr = [];
        foreach ($sequenceCollection as $sequence){
            $rover = $init->initialize($sequence->coordinates(), $sequence->rover());
            $map->moveRover($rover, $sequence);
            $arr[$sequence->rover()] = $rover->currentState();
        }
        return $arr;
    }

}