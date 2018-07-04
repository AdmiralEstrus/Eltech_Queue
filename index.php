<?php
ini_set('display_errors', 0);
error_reporting(0);
require_once __DIR__ . "/components/Router.php";
require_once __DIR__ . "/components/DbConnection.php";
$router = new Router();
$router->run();