<?php

//require  'AbstractController.php';
//require  'managers/MessageManager.php';

class MessageController extends AbstractController
{

	private MessageManager  $mManager;

	public function __construct()
	{
	    $this->mManager = new MessageManager
	    ("davidsim_phpj12", "3306", "db.3wa.io",
	    "davidsim", "83c8b946aee433563583381d62aa9c15");
	}

	public function index()
    {
        render('index', ["messages"=>$this->mManager->getAllMessages()]);
    }

	/*public function create(array $post) : void
    {
        $messageToAdd = new Message($post["content"]/*,User connecté, Room dans laquelle je suis);
        $this->mManager->insertMessage($messageToAdd);
        render('create', ["message"=>$this->mManager->insertMessage($messageToAdd)]);

    }*/
}

?>