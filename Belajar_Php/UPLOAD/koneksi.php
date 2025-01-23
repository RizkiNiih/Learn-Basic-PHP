<?php 
$koneksi = mysqli_connect("localhost", "root", "", "data_penjualan");

function query($query) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
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

    // Validasi gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    // Query insert
    $query = "INSERT INTO `latihan_belajar` (`id`, `nama`, `nrp`, `email`, `jurusan`, `gambar`) 
              VALUES (NULL, '$nama', '$nrp', '$email', '$jurusan', '$gambar')";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function upload() {
    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // Cek apakah ada file yang diunggah
    if ($error === 4) {
        echo "<script>
                alert('Pilih gambar terlebih dahulu!');
              </script>";
        return false;
    }

    // Cek ekstensi file
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namafile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('Yang Anda upload bukan gambar!');
              </script>";
        return false;
    }

    // Cek ukuran file
    if ($ukuranfile > 1000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar!');
              </script>";
        return false;
    }

    // Generate nama file baru
    $namafilebaru = uniqid() . '.' . $ekstensiGambar;

    // Pindahkan file ke folder tujuan
    move_uploaded_file($tmpName, 'img/' . $namafilebaru);

    // Kembalikan nama file untuk disimpan di database
    return $namafilebaru;
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
    $gambarlama = htmlspecialchars($data["gambarlama"]);

    // Validasi gambar
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarlama;
    } else {
        $gambar = upload();
        if (!$gambar) {
            return false;
        }
    }

    // Query update
    $query = "UPDATE latihan_belajar SET
              nrp = '$nrp',
              nama = '$nama',
              email = '$email',
              jurusan = '$jurusan',
              gambar = '$gambar'
              WHERE id = $id";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function cari($keyword) {
    $query = "SELECT * FROM latihan_belajar WHERE 
              nama LIKE '%$keyword%' OR
              nrp LIKE '%$keyword%' OR
              email LIKE '%$keyword%' OR
              jurusan LIKE '%$keyword%'";
    return query($query);
}
?>
