<?php

namespace App\Error;

use Cake\Error\ErrorHandler;
use Cake\Network\Http\Response;

class AppError extends ErrorHandler
{

    protected $res;

    public function __construct()
    {
        $this->res = new Response();
    }


    public function _displayException($exception)
    {
        $ex = [
            'message' => $exception->getMessage(),
            'code' => $exception->getCode()
        ];
        $this->res->body(json_encode($ex));
        //$this->res->statusCode($exception->getCode());
        $this->res->header(['Content-Type' => 'application/json']);
        return $this->res;
    }
}