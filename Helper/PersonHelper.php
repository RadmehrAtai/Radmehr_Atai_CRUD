<?php

namespace CRUD\Helper;

use mysqli;

class PersonHelper
{

    public function insert(array $input)
    {
        $statement = "
            INSERT INTO person 
                (firstname, lastname, username)
            VALUES
                (:firstname, :lastname, :username);
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'firstname' => $input['firstname'],
                'lastname' => $input['lastname'],
                'username' => $input['username']
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function fetch(int $id)
    {
        $statement = "
            SELECT 
                id, firstname, lastname, username
            FROM
                person
            WHERE id = ?;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array($id));
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function fetchAll()
    {
        $statement = "
            SELECT 
                id, firstname, lastname, username
            FROM
                person;
        ";

        try {
            $statement = $this->db->query($statement);
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function update($username, array $input)
    {
        $statement = "
            UPDATE person
            SET 
                firstname = :firstname,
                lastname  = :lastname,
            WHERE username = :username;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'firstname' => $input['firstname'],
                'lastname' => $input['lastname'],
                'username' => $username
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function delete($username)
    {
        $statement = "
            DELETE FROM person
            WHERE username = :username;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array('username' => $username));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

}