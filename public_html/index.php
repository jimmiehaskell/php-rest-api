<?php

header('Content-Type: application/json; charset=UTF-8');

require_once '../vendor/autoload.php';

    // api/users/1
if ($_GET['url']) {
    $url = explode('/', $_GET['url']);

    if ($url[0] === 'api') {
        array_shift($url);

        $controller = 'App\Controllers\\' . ucfirst($url[0]) . 'Controller';
        array_shift($url);

        $method = strtolower($_SERVER['REQUEST_METHOD']);

        try {
            $response = call_user_func_array(array(new $controller(), $method), $url);
            http_response_code(200);
            echo json_encode(
                array('status' => 'Sucess', 'dados' => $response),
                JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK
            );
            exit;
        } catch (\Exception $e) {
            http_response_code(404);
            echo json_encode(
                array('status' => 'Error', 'dados' => $e->getMessage()),
                JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK
            );
        }
    }
}
