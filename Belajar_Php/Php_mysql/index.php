<!-- 
ambil data menggunakan (fetch)
 mysqli_fetch_row() // mengembalikam array numerik
 mysqli_fetch_assoc() // mengembalikan array associative
 mysqli_fetch_array() // mengembalikan keduanya
 mysqli_fetch_object() // 
-->


<?php 
require 'koneksi.php';
$latihan_belajar = query("SELECT * FROM latihan_belajar");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman admin</title>
</head>
<body>
    <center><h1>Daftar Mahasiswa</h1></center>

    <center><table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach( $latihan_belajar as $row ) : ?>
        <tr>
            <td>1</td>
            <td>
                <a href="">ubah</a>
                <a href="">hapus</a>
            </td>
            <td><img src="img1.jpg" width="60"></td>
            <td>098765432</td>
            <td>Alfa Rizki</td>
            <td>kepoya@gmail.com</td>
            <td>Gammers</td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>

    </table></center>
    <a href="tambah php"></a>
</body>
</html>