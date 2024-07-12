<?php

abstract class AbstractModel {

    private $db;

    private function setDb()
    {
        if ( !$this->db )
        {
            $this->db = new PDO(
                'mysql:host=localhost;port=3306;dbname=application',
                'root',
                ''
            );
        }

        return $this->db;
    }

    protected function getDb()
    {
        return $this->setDb();
    }
}