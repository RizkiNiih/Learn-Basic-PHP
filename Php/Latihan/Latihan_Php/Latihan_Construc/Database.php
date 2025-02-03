<?php

class Database {
    public $conn;

    public function __construct($userName, $password, $database, $host)
    {
        $this->conn =  mysqli_connect($host, $userName, $password, $database);

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
          }
    }

    private function query ($query) {
        $result = mysqli_query($this->conn, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }
        return $rows;
    }

    function getUserByUsername($userName) {
        $query = $this->query("SELECT * FROM user WHERE username = '$userName'");
        if(count($query) >0){
            return $query[0];
        }
        return null;
    }

    public function getUser () {
        $query = $this->query("SELECT * FROM latihan_belajar");
        return $query;

    }

    function passwordEncode($password) {
        $options = [
            'cost' => 10,
        ];

        $password_hash = password_hash($password, PASSWORD_BCRYPT, $options);
        return $password_hash;
    }

    public function insertUser($userName, $password) {
        $rahasia = $this->passwordEncode($password);
        $sql = "INSERT INTO user (`username`, `password`)
                VALUES ('$userName', '$rahasia')";

                if (mysqli_query($this->conn, $sql)) {
                  echo "New record created successfully";
                } else {
                  echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
                }
                
                    }

    public function deleteUser($id) {
        $sql = "DELETE FROM user WHERE id = $id";

                if (mysqli_query($this->conn, $sql)) {
                  echo "Record deleted successfully";
                } else {
                  echo "Error deleting record: " . mysqli_error($this->conn);
                }
    }



    public function updateUser($id, $userName, $password) {
        $rahasia = $this->passwordEncode($password);
        $query = "UPDATE user SET username = '$userName', password = '$rahasia' WHERE id = '$id'";

                if (mysqli_query($this->conn, $query)) {
                    echo "Record update successfully";
                  } else {
                    echo "Error updateting record: " . mysqli_error($this->conn);
                  }
    }
}

$db = new Database("root", "", "data_penjualan", "Localhost");

echo var_dump($db->getUser());
// echo var_dump($db->getUserByUsername('test2'));
// $db->insertUser('test2', '456');
// // $db->deleteUser(10);
// $db->updateUser(11, 'test', 123);
// echo var_dump($db->getUser());