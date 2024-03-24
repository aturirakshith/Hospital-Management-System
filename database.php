<?php
class Database
{
    private $connection;

    public function __construct($host, $username, $password, $database)
    {
        $this->connection = mysqli_connect($host, $username, $password, $database);
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function query($query)
    {
        return mysqli_query($this->connection, $query);
    }

    public function num_rows($result){
        return mysqli_num_rows($result);
    }

    function db_connect() {
        $con = mysqli_connect("localhost", "root", "", "myhmsdb");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        return $con;
      }
      
      function execute_query($con, $query) {
        return mysqli_query($con, $query);
      }
      
      function fetch_array($result) {
        return mysqli_fetch_array($result);
      }

}