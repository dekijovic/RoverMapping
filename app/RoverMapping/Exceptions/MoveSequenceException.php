<?php
namespace MarsApp\RoverMapping\Exceptions;

use Throwable;

class MoveSequenceException extends \Exception
{

    public function __construct($message = "", $code = 400, Throwable $previous = null)
    {
        parent::__construct("Move Sequence is invalid. ".$message, $code, $previous);
    }
}