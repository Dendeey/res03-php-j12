<?php

require 'AbstractController.php';
require 'managers/UserManager.php';
require 'managers/RoomManager.php';
require 'manager/CategoryManager.php';
require 'manager/MessageManager.php';

class UserController extends AbstractController
{

    // Attributs

    private UserManager $manager;

    // Constructor

    public  function __construct()
    {
	    $this->manager = new UserManager
	    (
	        "davidsim_phpj11",
	        "3306",
	        "db.3wa.io",
	        "davidsim",
	        "83c8b946aee433563583381d62aa9c15"
	    );
    }

    // METHODES

    public function index()
    {

        render('index', []);
    }

    public function register(array $post) : void
    {
        $userToAdd = new User($post["email"], $post["username"], $post["password"]);
        $this->manager->insertUser($userToAdd);
        $this->render('index', []);

    }

    public function login(array $post) : void
    {
        $logEmail = $post["email"];
        $this->manager->getUserByEmail($logEmail);
        $this->render('index', );
    }

    public function display() : array
    {
        $bigData = [];

        $categoryToLoad = new CategoryManager
        (
            "davidsim_phpj11",
	        "3306",
	        "db.3wa.io",
	        "davidsim",
	        "83c8b946aee433563583381d62aa9c15",
	    );

	    $allCategories = $categoryToLoad->getAllCategories();

        $messageToLoad = new MessageManager
        (
            "davidsim_phpj11",
	        "3306",
	        "db.3wa.io",
	        "davidsim",
	        "83c8b946aee433563583381d62aa9c15",
        );

        $allMessages = $messageToLoad->getAllCategories();

        $roomToLoad = new RoomManager
        (
            "davidsim_phpj11",
	        "3306",
	        "db.3wa.io",
	        "davidsim",
	        "83c8b946aee433563583381d62aa9c15",
        );


    }

}

?>