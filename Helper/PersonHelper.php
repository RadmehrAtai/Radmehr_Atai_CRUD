<?php

namespace CRUD\Helper;

class PersonHelper
{

    public function insert($person)
    {
        $dbConnector = new DBConnector();
        $statement = "
            INSERT INTO PERSON 
                (firstname, lastname, username)
            VALUES
                ($person->getFirstName(), $person->getLastName(), $person->getUsername());
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

    public function update($person)
    {
        $dbConnector = new DBConnector();
        $statement = "
            UPDATE PERSON
            SET 
                firstname = $person->getFirstName(),
                lastname  = $person->getLastName(),
            WHERE username = $person->getUsername();
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