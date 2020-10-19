<?php

namespace Tests;

use MarsApp\RoverMapping\Data\DataSequence;
use MarsApp\RoverMapping\Map;
use MarsApp\RoverMapping\Rover;
use PHPUnit\Framework\TestCase;
class MapTest extends TestCase
{

    public function testMoveRover()
    {
        $map  = new Map([5,5]);
        $rover = new Rover(1,2,'N', 1);
        $sequence = new DataSequence( [1,2,'N'], ['L','M','L','M','L','M','L','M','M'], 1);
        $map->moveRover($rover, $sequence);
        $this->assertEquals($rover->currentState(), '1 3 N');
    }

    public function testMoveRoverWhenReachEndOfMap()
    {
        $map  = new Map([5,5]);
        $rover = new Rover(1,2,'N', 1);
        $sequence = new DataSequence( [1,2,'N'], ['M','M','M','M','L','M','M','M'], 1);
        $map->moveRover($rover, $sequence);
        $this->assertEquals($rover->currentState(), '0 5 W');
    }

}