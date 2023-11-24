<?php
require 'vendor/autoload.php';

use Dotenv\Dotenv;

include_once './src/services/user_service.php';
include_once './src/services/order_service.php';
include_once './src/services/authentication_service.php';

include_once './src/middlewares/user_authentication.php';
include_once './src/middlewares/order_authentication.php';

// include './src/config/createTables.php';

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$route = $_SERVER['REQUEST_URI'];
$method = $_SERVER["REQUEST_METHOD"];
$paths = explode('/', rtrim($_SERVER['REQUEST_URI'], '/'));
$mainPath = $paths[1];

if ($mainPath === "users") {
    $service = new UserService();
    $service = new UserAuthentication($service);

    if ($method === 'GET') {
        echo json_encode($service->getAllUsers());
    }

    exit();
}

if ($mainPath === "orders") {
    $service = new OrderService();
    $service = new OrderAuthentication($service);

    if ($method === 'GET') {
        echo json_encode($service->getAllOrders());
    }

    exit();
}

if ($mainPath === "login") {
    $service = new AuthenticationService();

    if ($method === 'POST') {
        $body = json_decode(file_get_contents('php://input'), true);
        echo json_encode($service->login($body['email'], $body['password']));
    }

    exit();
}

http_response_code(404);
echo json_encode(array("message" => "Not Found"));