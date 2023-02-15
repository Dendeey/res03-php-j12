<?php

class Message
{
    // Attributs //

    private int $id;
    private string $content;
    private int $roomId;
    private User $author;

    // Constructor //

    public function __construct(string $content, User $author, int $roomId)
    {
        $this->id = NULL;
        $this->content = $content;
        $this->author = $author;
        $this->roomId = $roomId;
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

    public function getRoomId() : int
    {
        return $this->roomId;
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

    public function setRoomId($roomId) : void
    {
        $this->roomId = $roomId;
    }
}

?>