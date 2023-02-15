<?php

class Category
{
    // Attributs //

    private int $id;
    private string $name;
    private string $description;
    private array $rooms;

    // Constructor //

    public function __construct(string $name, string $description)
    {
        $this->id = NULL;
        $this->name = $name;
        $this->description = $description;
        $this->rooms = [];
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

    public function getDescription() : string
    {
        return $this->description;
    }

	public function getRooms() : array
    {
        return $this->rooms;
    }

    // Setters //

    public function setId(int $id) : void
    {
        $this->id = $id;
    }

    public function setName(string $name) : void
    {
        $this->name = $name;
    }

    public function setDescription(string $description) : void
    {
        $this->description = $description;
    }

	public function setRooms(array $rooms) : void
    {
        $this->rooms = $rooms;
    }

    public function addRoom(Room $room) : void
    {
        $this->rooms[] = $room;
    }

}

?>