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

    private function query($query)
    {
        $result = mysqli_query($this->conn, $query);

        if (!$result) {
            echo "Query Error: " . mysqli_error($this->conn);
            return false;
        }

        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    private function execute($query)
    {
        $result = mysqli_query($this->conn, $query);
        if (!$result) {
            echo "Query Error: " . mysqli_error($this->conn);
            return false;
        }
        return true;
    }

    public function getUser()
    {
        $query = "SELECT * FROM user";
        return $this->query($query);
    }

    public function insertUser($userName, $password)
    {
        // Gunakan escape untuk menghindari SQL Injection
        $userName = mysqli_real_escape_string($this->conn, $userName);
        $password = mysqli_real_escape_string($this->conn, $password);

        $query = "INSERT INTO user (username, password) VALUES ('$userName', '$password')";
        return $this->execute($query);
    }

    public function deleteUser($id)
    {
        // Escape untuk menghindari SQL Injection
        $id = mysqli_real_escape_string($this->conn, $id);

        $query = "DELETE FROM user WHERE id = '$id'";
        return $this->execute($query);
    }

    public function updateUser($id, $userName, $password)
    {
        // Escape untuk menghindari SQL Injection
        $id = mysqli_real_escape_string($this->conn, $id);
        $userName = mysqli_real_escape_string($this->conn, $userName);
        $password = mysqli_real_escape_string($this->conn, $password);

        $query = "UPDATE user SET username = '$userName', password = '$password' WHERE id = '$id'";
        return $this->execute($query);
    }
}

// Contoh penggunaan
$db = new Database("root", "", "data_penjualan", "localhost");

// Menampilkan data user
echo "<pre>";
print_r($db->getUser());
echo "</pre>";

// Menambah user baru
if ($db->insertUser("new_user", "new_password")) {
    echo "User berhasil ditambahkan!";
}

// Menghapus user berdasarkan ID
if ($db->deleteUser(1)) {
    echo "User berhasil dihapus!";
}

// Mengupdate user berdasarkan ID
if ($db->updateUser(2, "updated_user", "updated_password")) {
    echo "User berhasil diupdate!";
}
    