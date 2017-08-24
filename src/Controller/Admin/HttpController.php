<?php
/**
 * Created by PhpStorm.
 * User: elsemyon
 * Date: 08.07.2017
 * Time: 13:13
 */

namespace App\Controller\Admin;


class HttpController
{
    public static function getLastHttpValueExplode($symbol){
        $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $actual_linkByElement = explode($symbol, $actual_link);
        $reversedActual_link = array_reverse($actual_linkByElement);
        return $reversedActual_link[0];
    }
}