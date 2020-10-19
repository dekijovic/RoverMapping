<?php


namespace MarsApp\RoverMapping\Data;

use MarsApp\Request\Parameters;
use MarsApp\RoverMapping\Exceptions\GridSequenceException;
use MarsApp\RoverMapping\Exceptions\MoveSequenceException;
use MarsApp\RoverMapping\Exceptions\PositionSequenceException;
use function Couchbase\defaultDecoder;

class DataBuilder
{

    private $grid;
    private $array;

    /**
     * DataBuilder constructor.
     * @param Parameters $params
     * @throws MoveSequenceException
     * @throws PositionSequenceException
     */
    public function __construct(Parameters $params)
    {
        $params = $params->all();

        $this->processGridCoordinate($params);
        $arr = [];
        for($i = 1; $i<count($params); $i++){
            $arr['num'] = ($i+1)/2;
            $arr['position'] = $this->processPositionSequence($params[$i]);
            $i++;
            $arr['move'] = $this->processMoveSequence($params[$i]);
            $this->array[] = $arr;

        }
    }

    /**
     * @return array
     */
    public function mapGrid(): array
    {
        return $this->grid;
    }

    /**
     * @return DataSequence[]
     */
    public function build(): array
    {
        $arr = [];
        for($i = 0; $i<count($this->array); $i++){
            $arr[] = new DataSequence($this->array[$i]['position'], $this->array[$i]['move'], $this->array[$i]['num']);
        }
        return $arr;
    }

    /**
     * @param $params
     * @throws GridSequenceException
     */
    private function processGridCoordinate($params)
    {
        $process = false;
        if(strlen($params[0]) == 3){
            $grid = explode(' ',$params[0]);
            if(count($grid) == 2){
                if(is_numeric($grid[0]) && is_numeric($grid[1])){
                    $this->grid = $grid;
                    $process = true;
                }
            }
        }
        if (!$process) {
            throw new GridSequenceException();
        }

    }

    /**
     * @param $string
     * @return false|string[]
     * @throws PositionSequenceException
     */
    private function processPositionSequence($string)
    {
        if (strlen($string) == 5) {
            $chars = explode(' ', $string);
//            var_dump($chars);
            if(is_numeric($chars[0]) && is_numeric($chars[1]) && is_string($chars[2])){
                return $chars;
            }
        }
        throw new PositionSequenceException();
    }

    /**
     * @param $params
     * @return array
     * @throws MoveSequenceException
     */
    private function processMoveSequence($string)
    {
        preg_match('/[^R,L,M]/', $string, $matches);
        if(!empty($matches)){
            throw new MoveSequenceException();
        }
        return str_split($string);
    }

}