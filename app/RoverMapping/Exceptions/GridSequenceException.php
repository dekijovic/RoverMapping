<?php
namespace MarsApp\RoverMapping\Exceptions;

use Throwable;

class GridSequenceException extends \Exception
{

    public function __construct($message = "", $code = 400, Throwable $previous = null)
    {
        parent::__construct("End Grid Coordinates input are invalid. ".$message, $code, $previous);
    }
}