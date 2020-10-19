<?php
namespace MarsApp\RoverMapping;

class Rover
{

    /**
     * y coordinate
     * @var int
     */
    public $x;
    /**
     * y coordinate
     * @var int
     */
    public $y;
    /**
     * Facing direction
     * @var string
     */
    public $f;

    /** @var  */
    public $roverNo;

    /**
     * Rover constructor.
     * @param $x
     * @param $y
     * @param $f
     * @param $roverNo
     */
    public function __construct($x, $y, $f, $roverNo)
    {
        $this->x = $x;
        $this->y = $y;
        $this->f = $f;
        $this->roverNo = $roverNo;
    }

    /**
     * @return string
     */
    public function currentState(): string
    {
        return $this->x.' '.$this->y.' '.$this->f;
    }

}