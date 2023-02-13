<?php

class Message 
{
    // Attributs //
    
    private int $id;
    private string $content;
    private User $author;
    
    // Constructor //

    public function __construct(string $content, User $author)
    {
        $this->id = NULL;
        $this->content = $content;
        $this->author = $author;
    }

    // Getters //
    
    public function getId() : int
    {
        return $this->id;
    }

    public function getContent() : string
    {
        return $this->content;
    }
    
    // Setters //
    
    public function setId($id) : void
    {
        $this->id = $id;
    }

    public function setContent($content) : void
    {
        $this->content = $content;
    }
}

?>