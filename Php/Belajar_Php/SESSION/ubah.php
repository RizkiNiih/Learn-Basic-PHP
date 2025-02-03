<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'koneksi.php';

$id = $_GET["id"];

$mhs = query("SELECT * FROM latihan_belajar WHERE id = $id")[0];

if( isset($_POST["submit"]) ) {
    
    if (ubah($_POST) > 0 ) {
        echo "
        <script>
            alert('data berhasil di ubah!');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
            <script>
            alert('data gagal di ubah!');
            document.location.href = 'index.php';
        </script>
        ";
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah data</title>
</head>
<body>
    <h1>Ubah data</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
        <input type="hidden" name="gambarlama" value="<?= $mhs["gambar"]; ?>">
        <ul>
            <li>
                <label for="nrp">NRP : </label>
                <input type="text" name="nrp" id="nrp" value="<?= $mhs["nrp"]; ?>">
            </li>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama"  id="nama" value="<?= $mhs["nama"]; ?>">
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email"
                required value="<?= $mhs["email"]; ?>">
            </li>
            <li>
                <label for="jurusan">Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan" value="<?= $mhs["jurusan"]; ?>">
            </li>
            <li>
                <label for="gambar">Gambar : </label><br>
                <img src="<?= $mhs['gambar'] ?>" width="55"><br>
                <input type="file" name="gambar" id="gambar">
            </li>

                <button type="submit" name="submit">Edit</button>

        </ul>
    </form>


</body>
</html>