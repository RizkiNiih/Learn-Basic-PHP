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
        $result = mysqli_query($this->conn, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }
        return $rows;
    }


    function getUserByUsername($nama) {
        $query = $this->query("SELECT * FROM latihan_belajar WHERE nama = '$nama'");
        if (count($query) > 0) {
            return $query[0];
        }
        return null;
    }
    


    public function getUser() {
        $query = $this->query("SELECT * FROM latihan_belajar");
        return $query;
    }

    function passwordEnCode($email) {
        $options = [
            'cost' => 10,
        ];

        $password_hash = password_hash($email, PASSWORD_BCRYPT, $options);
        return $password_hash;
    }


    public function insertUser($nama, $nrp, $email, $jurusan, $gambar) {
    $rahasia = $this->passwordEnCode($email);
    $sql = "INSERT INTO latihan_belajar (`nama`, `nrp`, `email`, `jurusan`, `gambar`)
            VALUES ('$nama', '$nrp', '$rahasia', '$jurusan', '$gambar')";

    if (mysqli_query($this->conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
    }
}



    public function deleteUser($id) {
        $sql = "DELETE FROM latihan_belajar WHERE id = $id";

                if (mysqli_query($this->conn, $sql)) {
                  echo "Record deleted successfully";
                } else {
                  echo "Error deleting record: " . mysqli_error($this->conn);
                }
    }


    public function updateUser($id, $nama, $nrp, $email, $jurusan, $gambar) {
        $rahasia = $this->passwordEncode($email);
        $query = "UPDATE latihan_belajar SET nama = '$nama', nrp = '$nrp', email = '$rahasia', jurusan = '$jurusan', gambar = '$gambar' WHERE id = '$id'";

                if (mysqli_query($this->conn, $query)) {
                    echo "Record update successfully";
                  } else {
                    echo "Error updateting record: " . mysqli_error($this->conn);
                  }
    }


}

$db = new Database("root", "", "data_penjualan", "localhost");

echo var_dump($db->getUser());
// echo var_dump($db->getUserByUsername('Ipul dakar'));
// $db->insertUser('John Chena', '0987612345', 'contoh@example.com', 'Gammers', 'chena.jpg', '100');
// $db->deleteUser(7);
// $db->updateUser(8, 'Ipul', '67890', 'updated@example.com', 'Manajemen', 'updated.jpg');
// echo var_dump($db->getUser());