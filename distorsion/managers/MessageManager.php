<?php

class MessageManager extends AbstractManager 
{

    public function getMessageById(int $id) : Message
    {
        $query = $this->db->prepare('SELECT * FROM messages WHERE id = :id');
        $parameters = [
        'id' => $id
        ];
        $query->execute($parameters);
        $message = $query->fetch(PDO::FETCH_ASSOC);

        $MessageToLoad = new Message($message['content'], $message['author']);
        $messageToLoad->setId($message['id']);

    }

    public function getAllMessages() : array
    {
        $messagesTab = [];

        $query = $this->db->prepare('SELECT * FROM messages');
        $query->execute();
        $messages = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach($messages as $message)
        {
            $messageToPush = new Message($message["content"], $message["author"]);
            $messageToPush->setId($message["id"]);
            $messagesTab[] = $messageToPush;
        }

        return $messagesTab;
    }

    public function insertMessage(Message $message, int $roomId) :Message
    {
        $query = $this->db->prepare('INSERT INTO messages (`id`, `content`, `room_id`) VALUES(NULL, :content, :room_id)');

        $parameters = [
        'content' => $message->getContent(),
        'room_id'=> $roomId
        ];
        $query->execute($parameters);

        $query = $db->prepare('SELECT LAST_INSERT_ID() FROM messages');
        $query->execute();
        $messageSelected = $query->fetch(PDO::FETCH_ASSOC);

        return $this->getmessageById($messageSelected['id']);

    }
}

?>