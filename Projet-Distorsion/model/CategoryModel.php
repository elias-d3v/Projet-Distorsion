<?php

class CategoryModel extends AbstractModel
{
    public function getCategories()
    {
        $query = $this->getDb()->prepare(" SELECT * FROM category ");
        $query->execute();
        $categories = $query->fetchAll( PDO::FETCH_ASSOC );

        return $categories;
    }

    public function createCategory($name)
    {
        $query = $this->getDb()->prepare(" INSERT INTO category (name) VALUES (:name) ");
        $query->execute([
            'name' => $name
        ]);
    }

}