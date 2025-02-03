    <?php

    use Dom\Mysql;

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


        private function query($query) {
            $result = mysqli_query($this->conn, $query);
            $rows = [];
            while( $row = mysqli_fetch_assoc($result) ) {
                $rows[] = $row;
            }
            return $rows;
        }


        function getUserByName($nama) {
            $query = $this->query("SELECT * FROM barang WHERE nama = '$nama'");
            if(count($query) > 0) {
                return $query[0];
            }
            return null;
        }


        public function getUser() {
            $query = $this->query("SELECT * FROM barang");
            return $query;
        }


        function passwordEnCode($harga) {
            $options = [
                'cost' => 10,
            ];

            $password_hash = password_hash($harga, PASSWORD_BCRYPT, $options);
            return $password_hash;
        }


        public function insertUser($nama, $harga) {
            $rahasia = $this->passwordEnCode($harga);
            $sql = "INSERT INTO barang (`nama`, `harga`) VALUES ('$nama', '$rahasia')";

                if (mysqli_query($this->conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
                }
             
        }


        public function deleteUser($id) {
            $sql = "DELETE FROM barang WHERE id = $id";

            if(mysqli_query($this->conn, $sql)) {
                echo "Record deleted successfully";
            } else {
                echo "Error deleting record: " . mysqli_error($this->conn);
            }
        }

        public function updateUser($id, $nama, $harga) {
            $rahasia = $this->passwordEnCode($harga);
            $query = "UPDATE barang SET nama = '$nama', harga = '$rahasia' WHERE id = '$id'";

            if(mysqli_query($this->conn, $query)) {
                echo "Record update successfully";
            } else {
                echo "Error updateting record: " . mysqli_error($this->conn);
            }
        }

    }

    $db = new Database("root", "", "data_penjualan", "localhost");

    // echo var_dump($db->getUser());
    echo var_dump($db->getUserByName('Siomay'));
    // $db->insertUser('Siomay', '5000');
    // $db->deleteUser(7);
    // $db->updateUser(5, 'RizkiJR', '17');
    // echo var_dump($db->getUser());