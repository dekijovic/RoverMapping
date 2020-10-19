<?php


namespace MarsApp\RoverMapping\Data;


class DataSequence
{

    private $positionCoordinates;
    private $moveSequence;
    private $rover;

    public function __construct($position, $move, $rover)
    {
        $this->positionCoordinates = $position;
        $this->moveSequence = $move;
        $this->rover = $rover;
    }
    /**
     * @return array
     */
    public function coordinates()
    {
        return $this->positionCoordinates;
    }

    /**
     * @return array
     */
    public function moveSequence()
    {
        return $this->moveSequence;
    }

    /**
     * @return int
     */
    public function rover()
    {
        return $this->rover;
    }
}