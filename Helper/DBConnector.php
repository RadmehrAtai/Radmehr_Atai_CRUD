<?php

namespace CRUD\Helper;

class DBConnector
{

    /** @var mixed $db */
    private $db;

    private $servername;
    private $username;
    private $password;
    private $dbname;

    public function __construct($servername="localhost", $username="admin", $password="123456", $dbname="WEB1")
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function connect(): void
    {
        $con = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

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
        if ($this->db->query($query)) {
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

    /**
     * @return mixed
     */
    public function getDb(): mixed
    {
        return $this->db;
    }
}