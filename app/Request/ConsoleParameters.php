<?php

namespace MarsApp\Request;

class ConsoleParameters implements Parameters
{

    private $parameters = [];

    /**
     * ConsoleParameters constructor.
     * @param $parameters
     */
    public function __construct($parameters)
    {
        foreach ($parameters as $parameter){
            $this->parameters[] = str_replace(',',' ', $parameter);
        }
    }

    /**
     * @return array
     */
    public function all(): array
    {
        return $this->parameters;
    }
}