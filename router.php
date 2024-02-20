<?php

// router.php

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

$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = $_SERVER['REQUEST_URI'];

switch ($requestMethod) {
    case 'POST':
        switch ($requestUri) {
            case '/api/users':
                $userController = $container->get('UserController');
                $userData = json_decode(file_get_contents('php://input'), true);
                $userController->createUser($userData);
                break;
            // Add more cases for other POST endpoints here
            case '/api/login': // New case for login endpoint
                $userController = $container->get('UserController');
                $loginData = json_decode(file_get_contents('php://input'), true);
                $userController->login($loginData['email'], $loginData['password']);
                break;
            default:
                notFound();
                break;
        }
        break;
    // Add more cases for other request methods here
    default:
        notFound();
        break;
}

function notFound() {
    header("HTTP/1.0 404 Not Found");
    echo "404 Not Found";
}
?>
