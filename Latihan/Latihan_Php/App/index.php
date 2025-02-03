<?php

require_once 'Latihan_Php/App/Produk/perpustakaan.php';

session_start();

if(!isset($_SESSION['perpustakaan'])) {
    $_SESSION['perpustakaan'] = serialize(new perpustakaan()); //serialize mengubah data menjadi string
}

$perpustakaan = unserialize($_SESSION['perpustakaan']); //unserialize mengubah kembali data yang telah diserialisasi (diubah menjadi string)

//hapus buku
if (isset ($_GET['hapus'])) {
    $judul = $_GET['hapus'];
    $perpustakaan->hapusBuku($judul);
    $_SESSION['perpustakaan'] = serialize('perpustakaan');
    header("Location: index.php");
    exit();

    $daftarBuku = $perpustakaan->getDaftarBuku();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
</head>
<body>
    <h1>Welcome to my bookstore</h1>

    <table border="1" cellpadding= "10" cellspacing= "0">
        <tr>
            <th scope="col">id</th>
            <th scope="col">Judul</th>
            <th scope="col">Penulis</th>
            <th scope="col">Tahun Terbit</th>
            <th scope="col">harga</th>
        </tr>

        <?php if (count($daftarBuku) > 0 ): ?>
            <?php foreach ($daftarBuku as $buku) : ?>
                <tr>
                    <td><?= $buku->getJudul(); ?></td>
                    <td><?= $buku->getPenulis(); ?></td>
                    <td><?= $buku->getTahunTerbit(); ?></td>
                    <td>Rp. <?= number_format($buku->getHarga(), 0, ',', '.'); ?></td> //
                    <td>
                        <a href="index.php?hapus=<?= $buku->getJudul(); ?>">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Tidak ada buku dalam daftar.</td>
                </tr>
            <?php endif; ?>
    </table>
</body>
</html>