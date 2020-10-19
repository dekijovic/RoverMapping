<?php


namespace MarsApp\RoverMapping;


class RoverInitialization
{
    /**
     * @param array $coordinates
     * @param int $no
     * @return Rover
     */
    public function initialize(array $coordinates, int $no): Rover
    {
        list($x, $y, $f) =  $coordinates;
        return new Rover( (int) $x, (int) $y, $f, $no);
    }

}