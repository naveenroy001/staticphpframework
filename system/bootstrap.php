<?php

require "route.php";

$any = 0;
$url = url();
if ($url[strlen($url) - 1] != '/') $url = $url . '/';
foreach ($route as $key => $value) {
    $method = "GET";
    $array = explode(':', $key);
    $regurl = $array[0];
    if(isset($array[1])){
        if($array[1]!=null)
        $method = $array[1];
    }
    if ($regurl[strlen($regurl) - 1] != '/') $regurl = $regurl . '/';
    if (strlen($regurl) > 1) {
        if ($regurl[0] == '/') $regurl = ltrim($regurl, '/');
    };

    if ($regurl == $url) {
        $request = checkmethod($method);
        processdir($value,$request);
        $any = 1;
    }
}

if ($any == 0) {
    processerror(404);
}

function processdir($dir,$request)
{
    include "pages/" . $dir . ".php";
}

function checkmethod($method){
    $method = strtoupper($method);
    if($method == 'POST'){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request = json_decode(json_encode($_POST));
            if($request!=null){
                $request->ip = get_client_ip();
            }
            else{
                $request = new stdClass();
                $request->ip = get_client_ip();
            }
            return $request;
        }else{
            processerror(405);
        }
    }else if($method == 'GET'){
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $request = json_decode(json_encode($_GET));
            if($request!=null){
                $request->ip = get_client_ip();
            }
            else{
                $request = new stdClass();
                $request->ip = get_client_ip();
            }
            return $request;
        }else{
            processerror(405);
        }
    }
    
}


function processerror($code){
    if($code == 404){
        include "common/error/404.php";
    }else if($code == 405){
        include "common/error/405.php";
    }
}

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}