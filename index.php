<?php

require 'vendor/autoload.php';
require_once("Controller/UserController.php");
require_once("Service/UserService.php");
require_once("Repository/UserRepository.php");
require_once("config.php");
use DI\ContainerBuilder;


$containerBuilder = new ContainerBuilder();
$container = $containerBuilder->build();

$container->set('Database', function () {
    return new Database();
});

// Configuração do Dotenv
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Roteamento
$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = $_SERVER['REQUEST_URI'];

if ($requestMethod === 'POST' && $requestUri === '/api/users') {
    $userController = $container->get('UserController');
    $userData = json_decode(file_get_contents('php://input'), true);
    $userController->createUser($userData);
} else {
    // Tratar outras rotas, se necessário
    header("HTTP/1.0 404 Not Found");
    echo "404 Not Found";
}