<?php

// Requires //

require "./controllers/UserController.php";
require './controller/HomeController.php';

class Router
{

    // Attributs //

    private UserController $userController;
    private HomeController $homeController;

    // Constructor //

    public function __construct()
    {
        $this->userController = new UserController();
        $this->homeController = new HomeController();
    }


    // METHODES //

    public function checkRoute(string $route) : void
    {

        match ($route) {
            'login'=> 'todo login controller',
            'register'=> 'todo register controller',
            'index' => $this->homeController->index(),
            default => $this->homeController->index(),
        }

    }

}

?>