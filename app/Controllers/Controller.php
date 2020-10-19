<?php


namespace MarsApp\Controllers;


use MarsApp\Request\RequestBuilder;
use MarsApp\RoverMapping\RoverController;

class Controller
{

    public function render()
    {
        $request = new RequestBuilder();

        $data = (new RoverController())->move($request->make());

        var_dump($data);
    }

}