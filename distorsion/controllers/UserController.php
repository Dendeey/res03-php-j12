<?php

require 'AbstractController.php';
require 'managers/UserManager.php';

class UserController extends AbstractController 
{ 

    // Attributs
       
    private UserManager $manager; 
    
    // Constructor

    public  function __construct() 
    { 
	    $this->manager = new UserManager
	    ("davidsim_phpj11", "3306", "db.3wa.io", 
	    "davidsim", "83c8b946aee433563583381d62aa9c15"); 
    } 
 
    // METHODES 
 
    public function index()
    {
        render('index', ["users"=>$this->manager->getAllUsers()]);
    }

    public function create(array $post) : void
    {
        $userToAdd = new User($post["email"], $post["username"], $post["password"]);
        $this->manager->insertUser($userToAdd);
        render('create', ["user"=>$this->manager->insertUser($userToAdd)]);

    }

    public function edit(array $post) : void
    {
        $userToEdit = new User($post["email"], $post["username"], $post["password"]);
        $this->manager->editUser($userToEdit);
        render('edit', ["user" => $userToEdit]);

    }
    
}
    
?>