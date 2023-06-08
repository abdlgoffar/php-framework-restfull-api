<?php

//import autoload composer app
require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../app/secure/Token.php";
//import controllers app
require_once __DIR__ . "/../app/controllers/StudentController.php";
require_once __DIR__ . "/../app/controllers/AuthController.php";
//import service app
require_once __DIR__ . "./../app/services/StudentServiceImplement.php";
require_once __DIR__ . "./../app/services/AuthServiceImplement.php";
//import route app
require_once __DIR__ . "/../app/routes/Config.php";
require_once __DIR__ . "/../app/routes/Website.php";
//create controllers app
Website::_create_(route\Config::HTTP_METHOD_POST, route\Config::REST_CONTROLLER, "auth", AuthController::class, route\Config::METHOD_AUTHORIZATION);
Website::_create_(route\Config::HTTP_METHOD_GET, route\Config::REST_CONTROLLER, "students", StudentController::class, route\Config::METHOD_FIND_ALL);
Website::_create_(route\Config::HTTP_METHOD_GET, route\Config::REST_CONTROLLER, "students", StudentController::class, route\Config::METHOD_FIND_ONE_BY_ID);
Website::_create_(route\Config::HTTP_METHOD_GET, route\Config::REST_CONTROLLER, "students", StudentController::class, route\Config::METHOD_FIND_BY_NAME);
Website::_create_(route\Config::HTTP_METHOD_POST, route\Config::REST_CONTROLLER, "students", StudentController::class, route\Config::METHOD_CREATE);
Website::_create_(route\Config::HTTP_METHOD_PUT, route\Config::REST_CONTROLLER, "students", StudentController::class, route\Config::METHOD_UPDATE_ONE_BY_ID);
Website::_create_(route\Config::HTTP_METHOD_PUT, route\Config::REST_CONTROLLER, "students", StudentController::class, route\Config::METHOD_UPDATE_BY_NAME);
Website::_create_(route\Config::HTTP_METHOD_DELETE, route\Config::REST_CONTROLLER, "students", StudentController::class, route\Config::METHOD_DELETE_ONE_BY_ID);
Website::_create_(route\Config::HTTP_METHOD_DELETE, route\Config::REST_CONTROLLER, "students", StudentController::class, route\Config::METHOD_DELETE_BY_NAME);

//auth
$config = new route\Config();
if (!empty($_SERVER["HTTP_AUTHORIZATION"])) {
    $config->setAuth(apache_request_headers()["Authorization"]);
}
//running controllers app
Website::_running_($config->getAuth());
