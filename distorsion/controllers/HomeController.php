<?php

require  'AbstractController.php';

class HomeController extends AbstractController
{
    private CategoryController $categoryRenderer;
    private MessageController $messageRenderer;
    private RoomController $roomRenderer;

    public function __construct()
    {
        $this->categoryRenderer = new CategoryController();
        $this->messageRenderer = new MessageController();
        $this->roomRenderer = new RoomController();
    }


    public function index()
    {
        $this->render('index', [
            //Display Category, room , message
        ]);
    }
}