<?php

//require  'AbstractController.php';

class CategoryController extends AbstractController

{
	private CategoryManager  $categoryManager;

	public function __construct()
	{
	    $this->categoryManager = new CategoryManager(
	        "davidsim_phpj12",
	        "3306",
	        "db.3wa.io",
	        "davidsim",
	        "83c8b946aee433563583381d62aa9c15",
	    );
	}

	public function index()
    {
        $this->render('index', ["users"=>$this->uManager->getAllCategories()]);
    }

	public function create(array $post) : void
    {
        $categoryToAdd = new Category($post["name"], $post["description"]);
        $this->uManager->insertCategory($categoryToAdd);
        $this->render('create', ["category"=>$this->uManager->insertCategory($categoryToAdd)]);

    }


}

?>