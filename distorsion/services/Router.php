<?php

// Requires //

require "./controllers/UserController.php";

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
        $this->CategoryController = new CategoryController();
        $this->RoomController = new RoomController();
        $this->MessageController = new MessageController();
    }


    // METHODES //

    public function checkRoute(string $route) : void
    {
        $post = $_POST;

        match ($route) {
            'authentification' => $this->userController->
            'login' => $this->userController->login($post),
            'register' => $this->userController->register($post),
            'index' => $this->userController->index(),
            'create-category' => $this->categoryController->create(),
            'create-room' => $this->roomController->create(),
            default => $this->userController->index(),
        };

    }

}

?>