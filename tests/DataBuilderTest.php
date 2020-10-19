<?php

namespace Tests;

use MarsApp\Request\HttpParameters;
use MarsApp\RoverMapping\Data\DataBuilder;
use MarsApp\RoverMapping\Data\DataSequence;
use MarsApp\RoverMapping\Exceptions\MoveSequenceException;
use MarsApp\RoverMapping\Exceptions\PositionSequenceException;
use PHPUnit\Framework\TestCase;

class DataBuilderTest extends TestCase
{

    public function testDataBuilder()
    {
        $parameters = new HttpParameters(['input'=>'5 5,1 2 N,LMLMLMLMM']);
        $builder = new DataBuilder($parameters);
        $sequence = new DataSequence( [1,2,'N'], ['L','M','L','M','L','M','L','M','M'], 1);
        $this->assertEquals($builder->mapGrid(), [5,5]);
        $this->assertEquals($builder->build(), [$sequence]);
    }

    public function testDataBuilderPositionSequenceException()
    {
        $this->expectException(PositionSequenceException::class);
        $parameters = new HttpParameters(['input' => '5 5,1 T N,LMLMLMLMM']);
        new DataBuilder($parameters);

    }

    public function testDataBuilderMoveSequenceException()
    {
        $this->expectException(MoveSequenceException::class);
        $parameters = new HttpParameters(['input' => '5 5,1 2 N,SMLMLMLMM']);
        new DataBuilder($parameters);

    }



}