<?php 
    $koneksi = mysqli_connect("Localhost", "root", "", "data_penjualan");


    function query ($query) {
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }
        return $rows;
    }


    function tambah($data) {
        global $koneksi;
        $nama = htmlspecialchars($data["nama"]);
        $nrp = htmlspecialchars($data["nrp"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $gambar = htmlspecialchars($data["gambar"]);


        $query = "INSERT INTO `latihan_belajar` (`id`, `nama`, `nrp`, `email`, `jurusan`, `gambar`) VALUES (NULL, '$nama', '$nrp', '$email', '$jurusan','$gambar')";
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
}


function hapus($id) {
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM latihan_belajar WHERE id = $id");

    return mysqli_affected_rows($koneksi);
}



function ubah($data) {
        global $koneksi;

        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $nrp = htmlspecialchars($data["nrp"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $gambar = htmlspecialchars($data["gambar"]);


        $query = "UPDATE latihan_belajar SET
            nrp = '$nrp',
            nama = '$nama',
            email = '$email',
            jurusan = '$jurusan',
            gambar = '$gambar'
            WHERE id = $id
            ";
        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }   

    function cari($keyword) {
        $query = "SELECT * FROM  latihan_belajar WHERE 
        nama LIKE '%$keyword%'OR
        nrp LIKE '%$keyword%' OR
        email LIKE '%$keyword%'OR
        jurusan LIKE '%$keyword%'";
        return query($query);
    }

?>