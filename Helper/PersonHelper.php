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
            if ($dbConnector->execQuery($statement)) {
                return true;
            } else {
                return false;
            }
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function fetch(int $id)
    {
        $dbConnector = new DBConnector();
        $statement = "
            SELECT 
                id, firstname, lastname, username
            FROM
                person
            WHERE id = $id;
        ";

        try {
            if ($dbConnector->execQuery($statement)) {
                return true;
            } else {
                return false;
            }
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function fetchAll()
    {
        $dbConnector = new DBConnector();
        $statement = "
            SELECT 
                id, firstname, lastname, username
            FROM
                person;
        ";

        try {
            if ($dbConnector->execQuery($statement)) {
                return true;
            } else {
                return false;
            }
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function update($username, array $input)
    {
        $dbConnector = new DBConnector();
        $statement = "
            UPDATE person
            SET 
                firstname = $input[0],
                lastname  = $input[1],
            WHERE username = $username;
        ";

        try {
            if ($dbConnector->execQuery($statement)) {
                return true;
            } else {
                return false;
            }
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function delete($username)
    {
        $dbConnector = new DBConnector();
        $statement = "
            DELETE FROM person
            WHERE username = $username;
        ";

        try {
            if ($dbConnector->execQuery($statement)) {
                return true;
            } else {
                return false;
            }
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

}