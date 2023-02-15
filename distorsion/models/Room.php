<?php

class Room
{
    // Attributs //

    private int $id;
    private string $name;
    private array $messages;
    private int $categoryId;

    // Constructor //

    public function __construct(string $name, int $categoryId)
    {
        $this->id = NULL;
        $this->name = $name;
        $this->messages = [];
        $this->categoryId = $categoryId;
    }

    // Getters //

    public function getId() : int
    {
        return $this->id;
    }

    public function getName() : string
    {
        return $this->name;
    }

	public function getMessages() : array
	{
		return $this->messages;
	}

	public function getCategoryId() : int
	{
	    return $this->categoryId;
	}

    // Setters //

    public function setId($id) : void
    {
        $this->id = $id;
    }

    public function setName($name) : void
    {
        $this->name = $name;
    }

    public function setMessages($message): void
    {
	    $this->messages = $messages;
	}

	public function setCategoryId($categoryId) : void
	{
	    $this->categoryId = $categoryId;
	}
}

?>