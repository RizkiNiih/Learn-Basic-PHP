<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'koneksi.php';
$latihan_belajar = query("SELECT * FROM latihan_belajar");

if ( isset($_POST["cari"]) ) {
    $latihan_belajar = cari($_POST["keyword"]);
}

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

    <center><form action="" method="post">

        <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan apa yang kamu cari!" autocomplete="off">
        <button type="submit" name="cari">Cari</button>

    </form></center>

    <center><table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>NRP</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach( $latihan_belajar as $row ) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td>
            <a href="ubah.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin ingin di ubah?');">ubah</a> |
                <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin ingin dihapus?');">hapus</a>
            </td>
            <td><img src="<?= $row["gambar"]; ?>" width="60"></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["nrp"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["jurusan"]; ?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>

    </table></center>
    <center><a href="tambah.php">Tambah</a></center>
    <center><a href="logout.php">Logout</a></center>
</body>
</html>

