<?php

class SessionModel extends AbstractModel
{
    public function getUser($username)
    {   
        $query = $this->getDb()->prepare(" SELECT * FROM user WHERE username = :username ");
        $query->execute([
            'username' => $username
        ]);
        
        $result = $query->fetch();

        return $result;

    }


    public function createUser($username, $password)
    {
        $query = $this->getDb()->prepare(" INSERT INTO user (username, password) VALUES (:username, :password)");
        $query->execute([
            'username' => $username,
            'password' => password_hash($password, PASSWORD_BCRYPT)

        ]);

    }
}
