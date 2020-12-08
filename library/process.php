

<?php

class dbconnection
{
    private $localhost = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "kopisop";

    protected $mysqli;

    public function __construct()
    {
        $this->mysqli = new mysqli($this->localhost, $this->username, $this->password, $this->database);
        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }

        return $this->mysqli;
    }
}
