<?php

class RoomModel extends AbstractModel
{
    public function getRooms()
    {
        $query = $this->getDb()->prepare(" SELECT * FROM room ");
        $query->execute();
        $rooms = $query->fetchAll( PDO::FETCH_ASSOC );

        return $rooms;
    }

    public function createRoom($name, $category_id)
    {
        $query = $this->getDb()->prepare(" INSERT INTO room (name, category_id) VALUES (:name, :category_id) ");
        $query->execute([
            'name' => $name,
            'category_id' => $category_id
        ]);
    }

}