<?php
class DBController
{
    public $db_host = "localhost";
    public $db_user = "root";
    public  $db_password = "";
    public $db_name = "rating";
    public $connection;
    public function openConnection()
    {
        $this->connection = new mysqli($this->db_host, $this->db_user, $this->db_password, $this->db_name);
        if ($this->connection->connect_error) {
            echo "error in connection:" . $this->connection->connect_error;
            return false;
        } else {
            return true;
        }
    }
    public function closeConnection()
    {
        if ($this->connection) {
            $this->connection->close();
        } else {
            echo "connection is not oppened";
        }
    }
    public function select($query)
    {
        $result = $this->connection->query($query);
        if (!$result) {
            echo "error:" . mysqli_error($this->connection);
            return false;
        } else {
            return $result->fetch_all(MYSQLI_NUM);
        }
    }
}
