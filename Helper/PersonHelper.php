<?php

namespace CRUD\Helper;

class PersonHelper
{

    public function insert(array $input)
    {
        $dbConnector = new DBConnector();
        $statement = "
            INSERT INTO person 
                (firstname, lastname, username)
            VALUES
                ($input[0], $input[1], $input[2]);
        ";

        try {
            $state = $dbConnector->getDb()->query($statement);
            return $state;
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage());
        }
    }

    public function fetch(int $id)
    {
        $dbConnector = new DBConnector();
        $statement = "
            SELECT 
                id, firstname, lastname, username
            FROM
                PERSON
            WHERE id = $id;
        ";

        try {
            $state = $dbConnector->getDb()->query($statement);
            return $state->fetchfield;
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage());
        }
    }

    public function fetchAll()
    {
        $dbConnector = new DBConnector();
        $statement = "
            SELECT 
                id, firstname, lastname, username
            FROM
                PERSON;
        ";

        try {
            $state = $dbConnector->getDb()->query($statement);
            return $state->fetchAll;
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage());
        }
    }

    public function update($username, array $input)
    {
        $dbConnector = new DBConnector();
        $statement = "
            UPDATE PERSON
            SET 
                firstname = $input[0],
                lastname  = $input[1],
            WHERE username = $username;
        ";

        try {
            $state = $dbConnector->getDb()->query($statement);
            return $state;
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage());
        }
    }

    public function delete($username)
    {
        $dbConnector = new DBConnector();
        $statement = "
            DELETE FROM PERSON
            WHERE username = $username;
        ";

        try {
            $state = $dbConnector->getDb()->query($statement);
            return $state;
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage());
        }
    }

}