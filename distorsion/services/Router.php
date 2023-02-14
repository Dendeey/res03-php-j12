<?php

// Requires //
require 'managers/AbstractManager.php';
require './managers/CategoryManager.php';
require './controllers/UserController.php';
require './controllers/CategoryController.php';
require './controllers/RoomController.php';
require './controllers/MessageController.php';

class Router
{

    // Attributs //

    private UserController $userController;
    private CategoryController $categoryController;
    private RoomController $roomController;
    private MessageController $messageController;

    // Constructor //

    public function __construct()
    {
        $this->userController = new UserController();
        $this->categoryController = new CategoryController();
        $this->roomController = new RoomController();
        $this->messageController = new MessageController();
    }


    // METHODES //

    public function checkRoute(string $route) : void
    {
        $post = $_POST;

        if(isset($_SESSION['authentification']) && $_SESSION['authentification'] === "ok") {
            match ($route) {
                'index' => $this->userController->index(),
                'create-category' => $this->categoryController->create(),
                'create-room' => $this->roomController->create(),
                default => $this->userController->index(),
                'create-message' => $this->messageController->create(),
            };
        }

        else {
            match ($route) {
                'authentification' => $this->userController->authentification(),
                'login' => $this->userController->login($post),
                'register' => $this->userController->register($post),
                default => $this->userController->authentification(),
            };
        }
    }

}

?>