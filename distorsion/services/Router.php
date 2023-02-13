<?php

// Requires //

require "./controllers/UserController.php";

class Router
{
    
    // Attributs //
    
    private UserController $usercontroller;
    
    // Constructor //
    
    public function __construct()
    {
        $this->usercontroller = new UserController();
        
    }
    
    
    // METHODES //
    
    public function checkRoute(string $route) : void
    {
        
        if($route === "users")
        {
            $this->usercontroller->index();
        }
        else if($route === "user-create")
        {
            $this->usercontroller->create();
        }
        else if($route === "user-edit")
        {
            $this->usercontroller->edit();
        }
        else
        {
            $this->usercontroller->index();
        }
        
    }
    
    
}

?>