<?php
namespace MarsApp\RoverMapping\Exceptions;

use Throwable;

class PositionSequenceException extends \Exception
{

    public function __construct($message = "", $code = 400, Throwable $previous = null)
    {
        parent::__construct("Position Sequence is invalid. ".$message, $code, $previous);
    }
}