<?php
ini_set('display_errors', 1);
error_reporting(1);
require_once __DIR__ . "/components/Router.php";
require_once __DIR__ . "/components/DbConnection.php";
$router = new Router();
$router->run();