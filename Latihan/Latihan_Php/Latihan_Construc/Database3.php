<?php

class Database {
    public $conn;

    public function __construct($userName, $password, $database, $host)
    {
        $this->conn = mysqli_connect($host, $userName, $password, $database);

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
          }

    }


    private function query ($query) {
        $result = mysqli_query($this->conn,
        $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc
        ($result) ) {
            $rows[] = $row;
        }
        return $rows;

    }


    function getUserByUsername($nama) {
        $query = $this->query("SELECT * FROM form_mini WHERE nama = '$nama'");
        if (count($query) > 0) {
            return $query[0];
        }
        return null;
    }


    public function getUser() {
        $query = $this->query("SELECT * FROM form_mini");
        return $query;
    }


    function passwordEnCode($umur) {
        $options = [
            'cost' => 10,
        ];

        $password_hash = password_hash($umur, PASSWORD_BCRYPT, $options);
        return $password_hash;
    }
    


    public function insertUser($nama, $umur, $gender, $hobi, $agama) {
        $rahasia = $this->passwordEnCode($umur);
        $sql = "INSERT INTO form_mini (`nama`, `umur`, `gender`, `hobi`, `agama`)
                VALUES ('$nama', '$rahasia', '$gender', '$hobi', '$agama')";
    
        if (mysqli_query($this->conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        }
    }


    public function deleteUser($id) {
        $sql = "DELETE FROM form_mini WHERE id = $id";

                if (mysqli_query($this->conn, $sql)) {
                  echo "Record deleted successfully";
                } else {
                  echo "Error deleting record: " . mysqli_error($this->conn);
                }
    }


    public function updateUser($id, $nama, $umur, $gender, $hobi, $agama) {
        $rahasia = $this->passwordEncode($umur);
        $query = "UPDATE form_mini SET nama = '$nama', umur = '$rahasia', gender = '$gender', hobi = '$hobi', agama = '$agama' WHERE id = '$id'";

                if (mysqli_query($this->conn, $query)) {
                    echo "Record update successfully";
                  } else {
                    echo "Error updateting record: " . mysqli_error($this->conn);
                  }
    }

}

$db = new Database("root", "", "data_penjualan", "localhost");

// echo var_dump($db->getUser());
echo var_dump($db->getUserByUsername('RizkiJR'));
// $db->insertUser('RizkiJR', '17', 'Pria', 'Futsal', 'Islam');
// $db->deleteUser(7);
// $db->updateUser(5, 'RizkiJR', '17', 'Pria', 'Mancing', 'Islam');
// echo var_dump($db->getUser());