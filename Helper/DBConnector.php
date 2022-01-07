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
    public static $name = "my_db";

    public function __construct()
    {
        $this->db = new mysqli(self::$servername, self::$username, self::$password, self::$name)
        or die("Could not connect to the database:<br />" . $this->db->connect_error);
        mysqli_select_db($this->db, self::$name)
        or die("Database error:<br />" . $this->db->connect_error);
    }

    /**
     * @throws \Exception
     * @return void
     */
    public function connect() : void
    {
        $conn = new mysqli(self::$servername, self::$username, self::$password, self::$name);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";
    }

    /**
     * @param string $query
     * @return bool
     */
    public function execQuery(string $query) : bool
    {
        return true;
    }

    /**
     * @param string $message
     * @throws \Exception
     * @return void
     */
    private function exceptionHandler(string $message): void
    {

    }
}