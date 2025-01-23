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
    return $query;
}


function hapus($id) {
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM latihan_belajar WHERE id = $id");

    return mysqli_affected_rows($koneksi);
}
?>