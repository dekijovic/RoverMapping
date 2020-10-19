<?php


namespace MarsApp\RoverMapping;


use MarsApp\RoverMapping\Data\DataSequence;
use function Couchbase\defaultDecoder;

class Map
{
    public $endGridCoordinate;

    /**
     * Map constructor.
     * @param $endGridCoordinate
     */
    public function __construct($endGridCoordinate)
    {
        $this->endGridCoordinate = $endGridCoordinate;
    }

    /**
     * @param Rover $rover
     * @param DataSequence $sequence
     */
    public function moveRover(Rover $rover, DataSequence $sequence)
    {
        foreach ($sequence->moveSequence() as $letter){
            if($letter == 'M'){
                $this->step($rover);
            }else{
                $this->turn($rover, $letter);
            }
        }
    }

    /**
     * @param Rover $rover
     */
    private function step(Rover $rover)
    {
        switch ($rover->f){
            case 'N';
                $rover->y+=1;
                break;
            case 'S';
                $rover->y-=1;
                break;
            case 'W';
                $rover->x-=1;
                break;
            case 'E';
                $rover->x+=1;
                break;
        }

    }

    /**
     * @param Rover $rover
     * @param $letter
     */
    private function turn(Rover $rover, $letter)
    {
        if($letter == 'L') {
            switch ($rover->f) {
                case 'N';
                    $rover->f = 'W';
                    break;
                case 'S';
                    $rover->f = 'E';
                    break;
                case 'W';
                    $rover->f = 'S';
                    break;
                case 'E';
                    $rover->f = 'N';
                    break;
            }
        }
        if($letter == 'R') {
            switch ($rover->f) {
                case 'N';
                    $rover->f = 'E';
                    break;
                case 'S';
                    $rover->f = 'W';
                    break;
                case 'W';
                    $rover->f = 'N';
                    break;
                case 'E';
                    $rover->f = 'S';
                    break;
            }
        }
    }

}