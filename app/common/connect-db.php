<?php
// Connect to DB
class Database {
    private $hostname = 'localhost';
    private $user = 'root';
    private $password = 'root';
    private $dbname = 'PublicationDB';
    private $conn = NULL;
    private $result = NULL;

    public function connect() {
        $this->conn = new mysqli($this->hostname, $this->user, $this->password, $this->dbname);
        if(!$this->conn) {
            echo "Failed to connect to Database: " . $this->conn->connect_error;
            exit();
        }
        else {
            mysqli_set_charset($this->conn, 'utf8');
        }
        return $this->conn;
    }

    //Execute Queries
    public function execute($sql) {
        $this->result = $this->conn->query($sql);
        return $this->result;
    }

    //Get data from DB
    public function getData() {
        if($this->result) {
            $data = mysqli_fetch_array($this->result);
        }
        else {
            $data = 0;
        }
        return $data;
    }

    //Get all data from DB
    public function getAllData() {
        if (!$this->result) {
            $data = 0;
        }
        else {
            while ($row = $this->getData()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    //Get number of records
    public function getNumRows() {
        if (!$this->result) {
            $num = 0;
        }
        else {
            $num = mysqli_num_rows($this->result);
        }
        return $num;
    }

    //Insert data to DB
    public function insertData($table, $fields, $values) {
        $sql = "INSERT INTO $table ($fields) VALUES ($values)";
        return $this->execute($sql);
    }
    
    //Update data in DB
    public function updateData($table, $fields, $values, $condition) {
        //Allow update multiple fields
        $set_tring = "";
        for ($i = 0; $i < count($fields); $i++) {
            $set_tring .= $fields[$i] . " = '". $values[$i] ."' ";
            if ($i < count($fields) - 1) {
                $set_tring .= ", ";
            }
        }
        $sql = "UPDATE $table SET $set_tring WHERE BINARY $condition";
        return $this->execute($sql);
    }
    
    //Delete data from DB
    public function deleteData($table, $condition) {
        $sql = "DELETE FROM $table WHERE BINARY $condition";
        return $this->execute($sql);
    }

    //Close connection
    public function close() {
        if ($this->conn) {
            $this->conn->close();
        }
    }



    // public function select($sql) {
    //     $result = $this->query($sql);
    //     if ($result->num_rows > 0) {
    //         while ($row = $result->fetch_assoc()) {
    //             $data[] = $row;
    //         }
    //     }
    //     return $data;
    // }

    }
?>