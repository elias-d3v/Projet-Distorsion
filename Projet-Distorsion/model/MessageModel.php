<?php

class MessageModel extends AbstractModel
{
    public function getMessagesByRoom()
    {
        $query = $this->getDb()->prepare("SELECT * FROM message WHERE room_id = :room_id ORDER BY created_at ASC");
        $query->execute(['room_id' => $_GET['roomid']]);
        $messages = $query->fetchAll( PDO::FETCH_ASSOC );

        return $messages;
    }

    public function sendMessage($content, $room_id)
    {
        $query = $this->getDb()->prepare(" INSERT INTO message (content, room_id) VALUES (:content, :room_id) ");
        $query->execute([
            'content' => $content,
            'room_id' => $room_id
        ]);
    }

}