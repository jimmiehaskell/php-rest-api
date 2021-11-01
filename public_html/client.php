<?php

header('Content-Type: application/json; charset=UTF-8');

$url = 'http://localhost/php-rest-api/public_html/api';
$class = '/user';
$param = '/1';

$response = file_get_contents($url . $class . $param);

// echo $response;

//

$response = json_decode($response, 1);
var_dump($response['dados']['email']);
