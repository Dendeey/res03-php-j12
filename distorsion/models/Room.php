<?php

class Room 
{
    // Attributs //
    
    private int $id;
    private string $name;
    private array $messages;
    
    // Constructor //

    public function __construct(string $name)
    {
        $this->id = NULL;
        $this->name = $name;
        $this->messages = $messages;
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
}

?>