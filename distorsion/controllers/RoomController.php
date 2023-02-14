<?php

// require  'AbstractController.php';
//require  'managers/RoomManager.php';

class RoomController extends AbstractController
{

	private RoomManager  $rManager;

	public function __construct()
	{
	    $this->rManager = new RoomManager
	    ("davidsim_phpj11", "3306", "db.3wa.io",
	    "davidsim", "83c8b946aee433563583381d62aa9c15");
	}

	public function index()
    {
        render('index', ["rooms"=>$this->rManager->getAllRooms()]);
    }

	public function create(array $post) : void
    {
        $roomToAdd = new Room($post["name"]);
        $this->rManager->insertRoom($roomToAdd);
        render('create', ["room"=>$this->rManager->insertRoom($roomToAdd)]);

    }

}

?>