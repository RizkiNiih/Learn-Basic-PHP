<?php 
require 'koneksi.php';

if( isset($_POST["submit"]) ) {


    
    if (tambah($_POST) > 0 ) {
        echo "
        <script>
            alert('data berhasil ditambahkan!');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
            <script>
            alert('data gagal ditambahkan!');
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
    <title>Tambah data</title>
</head>
<body>
    <h1>Tambah data</h1>

    <form action="" method="post" enctype="multipart/form-data"
        <ul>
            <li>
                <label for="nrp">NRP : </label>
                <input type="text" name="nrp" id="nrp">
            </li>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama"  id="nama">
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email"
                required>
            </li>
            <li>
                <label for="jurusan">Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan">
            </li>
            <li>
                <label for="gambar">Gambar : </label>
                <input type="file" name="gambar" id="gambar">
            </li>

                <button type="submit" name="submit">Kirim</button>

        </ul>
    </form>


</body>
</html>