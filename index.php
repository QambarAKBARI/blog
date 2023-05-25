<?php

require 'vendor/autoload.php';
require 'config.php';

session_start();

use App\Service\Router;

$token = Router::generateToken();

Router::CSRFProtection($token);

$response = Router::handleRequest();
if ($response !== false) {
    $page = $response['view'];
} else {
    $page = Router::NOT_FOUND;
    http_response_code(404);
}

ob_start();
require $page;
$content = ob_get_contents();
ob_end_clean();

require VIEW_PATH.'layout.php';
