<?php

namespace CRUD\Helper;

use mysqli;

class DBConnector
{

    /** @var mixed $db */
    private $db;

    public static $servername = "localhost";
    public static $username = "username";
    public static $password = "password";
    public static $dbname = "myDB";

    public function __construct()
    {
        $this->db = new mysqli(self::$servername, self::$username, self::$password, self::$dbname)
        or die("Could not connect to the database:<br />" . $this->db->connect_error);
        mysqli_select_db($this->db, self::$name)
        or die("Database error:<br />" . $this->db->connect_error);
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function connect(): void
    {
        $con = mysqli_connect("localhost","my_user","my_password","my_db");

        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
        echo "Connected successfully.";
    }

    /**
     * @param string $query
     * @return bool
     */
    public function execQuery(string $query): bool
    {
        $con = mysqli_connect("localhost","my_user","my_password","my_db");
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }

        if ($con->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param string $message
     * @return void
     * @throws \Exception
     */
    private function exceptionHandler(string $message): void
    {
        switch (\Exception::class) {
            case \PDOException::class:
                echo $message;
        }
    }
}