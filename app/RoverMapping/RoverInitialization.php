<?php


namespace MarsApp\RoverMapping;


class RoverInitialization
{

    public function initialize(array $coordinates, int $no)
    {
        list($x, $y, $f) =  $coordinates;
        return new Rover( (int) $x, (int) $y, $f, $no);
    }

}