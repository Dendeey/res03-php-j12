<?php

class CategoryManager extends AbstractManager 
{

    public function getCategoryById(int $id) : Category
    {
        $query = $this->db->prepare('SELECT * FROM categories WHERE id = :id');
        $parameters = [
        'id' => $id
        ];
        $query->execute($parameters);
        $category = $query->fetch(PDO::FETCH_ASSOC);

        $CategoryToLoad = new Category($category['name'], $user['description']);
        $categoryToLoad->setId($category['id']);

    }

    public function getAllCategories() : array
    {
        $categoriesTab = [];

        $query = $this->db->prepare('SELECT * FROM categories');
        $query->execute();
        $categories = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach($categories as $category)
        {
            $categoryToPush = new Category($category["name"], $category["description"]);
            $categoryToPush->setId($category["id"]);
            $categoriesTab[] = $categoryToPush;
        }

        return $categoriesTab;
    }

    public function insertCategory(Category $category) : Category
    {
        $query = $this->db->prepare('INSERT INTO categories (`id`, `name`, `description`) VALUES(NULL, :name, :description)');

        $parameters = [
        'name' => $category->getName(),
        'description' => $category->getDescription()
        ];
        $query->execute($parameters);
        $isValid = $query->execute($parameters);

		if(!$isValid)
		{
			return null;
		}

        $query = $db->prepare('SELECT LAST_INSERT_ID() FROM categories');
        $query->execute();
        $categorySelected = $query->fetch(PDO::FETCH_ASSOC);

        return $this->getCategoryById($categorySelected['id']);

    }

    public function editCategory(Category $category) : void
    {
        $query = $this->db->prepare('UPDATE categories SET name = :name, description = :description WHERE id = :id ');
        $parameters = [
            'id' => $category->getId(),
            'name' => $category->getName(),
            'description' => $category->getDescription()
            ];

        $query->execute($parameters);
    }
}

?>