<?php

class RoomManager extends AbstractManager 
{

    public function getRoomById(int $id) : Room
    {
        $query = $this->db->prepare('SELECT * FROM rooms WHERE id = :id');
        $parameters = [
        'id' => $id
        ];
        $query->execute($parameters);
        $room = $query->fetch(PDO::FETCH_ASSOC);

        $RoomToLoad = new Room($room['name']);
        $RoomToLoad->setId($room['id']);

    }

    public function getAllRooms() : array
    {
        $roomsTab = [];

        $query = $this->db->prepare('SELECT * FROM rooms');
        $query->execute();
        $rooms = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach($rooms as $room)
        {
            $roomToPush = new Room($room["name"]);
            $roomToPush->setId($room["id"]);
            $roomsTab[] = $roomToPush;
        }

        return $roomsTab;
    }

    public function insertRoom(Room $room, int $categoryId) : ?Room
    {
        $query = $this->db->prepare('INSERT INTO rooms (`id`, `name`, `category_id`) VALUES(NULL, :name, :category_id)');

        $parameters = [
        'name' => $room->getName(),
        'category_id' => $categoryId
        ];
        $query->execute($parameters);
        $isValid = $query->execute($parameters);
       
       if(!$isValid)
       {
	      return null;
	   }

        $query = $db->prepare('SELECT LAST_INSERT_ID() FROM rooms');
        $query->execute();
        $roomSelected = $query->fetch(PDO::FETCH_ASSOC);

        return $this->getRoomById($roomSelected['id']);

    }

    public function editRoom(Room $room) : void
    {
        $query = $this->db->prepare('UPDATE rooms SET name = :name = :description WHERE id = :id ');
        $parameters = [
            'id' => $rooms->getId(),
            'name' => $room->getName()
            ];

        $query->execute($parameters);
    }
}

?>