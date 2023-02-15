<?php

require 'AbstractController.php';
require 'managers/UserManager.php';
require 'managers/RoomManager.php';
require 'managers/MessageManager.php';

class UserController extends AbstractController
{

    // Attributs

    private UserManager $manager;

    // Constructor

    public  function __construct()
    {
	    $this->manager = new UserManager
	    (
	        "davidsim_phpj12",
	        "3306",
	        "db.3wa.io",
	        "davidsim",
	        "83c8b946aee433563583381d62aa9c15"
	    );
    }

    // METHODES

    public function index() : void
    {

        $this->render('index', []);
    }

    public function authentification() : void
    {
        $this->render('authentification', []);
    }

    public function register(array $post) : void
    {
        if (!empty($post['newUsername'])
        && !empty($post['newEmail'])
        && !empty($post['newPassword'])
        && !empty($post['confirm-pwd'])
        ) {

            if ($post['newPassword'] === $post['confirm-pwd']) {
                if($this->manager->getUserByEmail($post['newEmail']) === null) {
                    $hashedPass = password_hash($post['newPassword'], PASSWORD_DEFAULT);
                    $userToAdd = new User($post["newEmail"], $post["newUsername"], $hashedPass);
                    $this->manager->insertUser($userToAdd);
                    $this->render('authentification', []);
                }

                else {
                    $this->render('authentification', ['error' => 'Cet Utilisateur existe déjà']);
                }

            }

            else {
                $this->render('authentification', ['error' => 'Informations de connexion incorrects']);
            }
        }

        else {
            $this->render('authentification', ['error' => 'Merci de remplir tous les champs']);
        }


    }

    public function login(array $post) : void
    {
        if (!empty($post['email']) && !empty($post['password'])) {
            $logEmail = $post['email'];
            $passToCheck = password_hash($post['password'], PASSWORD_DEFAULT);
            $userToCheck = $this->manager->getUserByEmail($logEmail);

            if ($userToCheck !== false) {
                if (password_verify ($passToCheck, $userToCheck->getPassword())) {
                    $_SESSION['authentification'] = 'ok';
                     $this->render ('index',
                    [
                     "user" => $userToCheck,
                     "data" => $this->display()
                    ]
                   );
                }

                else {
                    $this->render('authentification', ['error' => 'Identifiants de connexion incorrects']);
                }
            }

            else {
                $this->render('authentification', ['error' => 'Identifiants de connexion incorrects']);
            }
        }

        else {
            $this->render('authentification', ['error' => 'Merci de remplir tous les champs de connexion']);
        }


    }

    public function display() : array
    {
        $bigData = [];

        $categoryToLoad = new CategoryManager
        (
            "davidsim_phpj12",
	        "3306",
	        "db.3wa.io",
	        "davidsim",
	        "83c8b946aee433563583381d62aa9c15",
	    );

	    $allCategories = $categoryToLoad->getAllCategories();

        $messageToLoad = new MessageManager
        (
            "davidsim_phpj12",
	        "3306",
	        "db.3wa.io",
	        "davidsim",
	        "83c8b946aee433563583381d62aa9c15",
        );

        $allMessages = $messageToLoad->getAllMessages();

        $roomToLoad = new RoomManager
        (
            "davidsim_phpj12",
	        "3306",
	        "db.3wa.io",
	        "davidsim",
	        "83c8b946aee433563583381d62aa9c15",
        );

        $allRooms = $roomToLoad->getAllRooms();

        foreach($allCategories as $category) {
            foreach($allRooms as $room) {
                if ($room->getCategoryId() === $category->getId) {
                    $category->addRoom($room);
                }
            }
        }

        var_dump($allCategories);

    }

}

?>