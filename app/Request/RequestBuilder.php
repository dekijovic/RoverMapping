<?php


namespace MarsApp\Request;


class RequestBuilder
{

    public function make(): Parameters
    {
        if(isset($_SERVER['REQUEST_METHOD'])){
            switch($_SERVER['REQUEST_METHOD']) {
                case 'GET':
                    $parameters = &$_GET;
                    break;
                case 'POST':
                    $parameters = &$_POST;
                    break;
            }
            return new HttpParameters($parameters);
        }
        if(isset($_SERVER['argv'])){
            $arr = $_SERVER['argv'];
            unset($arr[0]);
            return new ConsoleParameters($arr);
        }
    }
}