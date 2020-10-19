<?php


namespace MarsApp\Controllers;


use MarsApp\Request\RequestBuilder;
use MarsApp\RoverMapping\RoverController;

class Controller
{

    public function render()
    {
        try {
            $request = new RequestBuilder();
            $data = (new RoverController())->move($request->make());
            print_r($data);

        }catch (\Exception $e)
        {
            print_r($e->getMessage());
        }
    }

}