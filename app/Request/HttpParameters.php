<?php


namespace MarsApp\Request;


class HttpParameters implements Parameters
{
    /** @var array */
    private $parameters;

    /**
     * Parameters constructor.
     */
    public function __construct(array $parameters)
    {
        if(!isset($parameters['input'])){
            throw new \Exception('No Input parameters');
        }
        if(is_string($parameters['input'])){
            $this->parameters = explode(',', $parameters['input']);
        }else if(is_array($parameters['input'])){
            $this->parameters = $parameters['input'];
        }else{
            throw new \Exception('Bad Input Format');
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