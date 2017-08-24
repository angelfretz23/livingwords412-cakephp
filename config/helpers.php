<?php

use Cake\Network\Response;
use \Cake\Network\Exception\BadRequestException;

if (!function_exists('abort_if')) {

    function abort_if($boolean, $code = 400, $message = null, array $headers = [])
    {
        $message = 'Bad request';
        if ($boolean) {
            throw new \Cake\Network\Exception\HttpException($message, $code);
        }
    }
}
