<?php

//getting base url

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$req = ltrim("$_SERVER[REQUEST_URI]", '/');
$arr = explode('/', trim($req));
$req = $arr[0];
//$actual_link = $actual_link . "/" . $req;



define('base_url', $actual_link);				//url using
define('css_url', base_url . '/assets/css');
define('js_url', base_url . '/assets/js');
define('img_url', base_url . '/assets/img');

//Getting Request
$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$link = rtrim($link, '/');
$urlexplode = explode('/', $link);
$val = count($urlexplode) - 1;
$request = $urlexplode[$val];
define('request', $request);



function strExist($str1, $str2)
{
	if (stripos($str1, $str2) !== false)
		return true;
	else
		return false;
}


function url()
{
	return isset($_GET['url']) ? $_GET['url'] : "/";
}

function include_page($dir)
{
	include "pages/" . $dir . ".php";
}


function toObject($array)
{
    return json_decode(json_encode($array));
}
