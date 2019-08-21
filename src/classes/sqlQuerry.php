<?php

// require_once('src/classes/exception.php');
class Querry{
    private $results;
    private $connection;
    private $error;

    

    public function __construct($host,$user,$password,$database)
    {
        $this->connection = mysqli_connect($host, $user, $password);

        if (!$this->connection) {
            $this->error = new Exception('Error: could not establish database connection');
        }
        if (!mysqli_select_db($this->connection, $database)) {
            $this->error = new Exception('Error: could not select the database');
        }
    }

    public function Execute($querry){
        $this->results = mysqli_query($this->connection, $querry);
        if (!$this->results){
            $this->error = new Exception('querry error',500);
            return false;
    } else {
        if (mysqli_num_rows($this->results) == 0) {
            $this->error = new Exception('no data inside',404);
            return false;
        } else {
            return true;
        }
    }
    }

    public function GetError()
    {
        return $this->error;
    }

    public function GetResults()
    {
        return $this->results;
    }
}