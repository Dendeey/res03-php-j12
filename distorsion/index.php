<?php

// Start a session //

session_start();



require "services/Router.php";
$router = new Router();

if (isset($_GET["route"])) {
    $route = $_GET["route"];
    $router->checkroute($route);
}

else {
    $router->checkroute("");
}



?>