<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Query untuk mengambil data dari tabel `author` dan `biographies`
    $result = mysqli_query($koneksi, "
        SELECT 
            author.First_Name,
            author.Last_Name,
            author.Birth_Date,
            biographies.summary
        FROM 
            author
        LEFT JOIN 
            biographies
        ON 
            author.id = biographies.author_id
        WHERE 
            author.id = '$id'
    ");

    // Cek apakah data ditemukan
    if ($data = mysqli_fetch_assoc($result)) {
        $First_Name = $data['First_Name'];
        $Last_Name = $data['Last_Name'];
        $Birth_Date = $data['Birth_Date'];
        $summary = $data['summary'];
    } else {
        echo "Data tidak ditemukan.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <title>Edit Author</title>
</head>
<body>
    <center>
        <h1>Edit Author and Biography</h1>
        <form action="update.php" method="post">
            <table border="0">
                <tr>
                    <td>First Name</td>
                    <td><input type="text" name="First_Name" value="<?php echo htmlspecialchars($First_Name); ?>"></td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td><input type="text" name="Last_Name" value="<?php echo htmlspecialchars($Last_Name); ?>"></td>
                </tr>
                <tr>
                    <td>Birth Date</td>
                    <td><input type="date" name="Birth_Date" value="<?php echo htmlspecialchars($Birth_Date); ?>"></td>
                </tr>
                <tr>
                    <td>Summary</td>
                    <td><input type="text" name="summary" value="<?php echo htmlspecialchars($summary); ?>"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>"></td>
                    <td><input type="submit" name="update" value="Edit"></td>
                </tr>
            </table>
        </form>
    </center>

    <?php
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $First_Name = $_POST['First_Name'];
        $Last_Name = $_POST['Last_Name'];
        $Birth_Date = $_POST['Birth_Date'];
        $summary = $_POST['summary'];

        // Mulai transaksi untuk update ke dua tabel
        mysqli_begin_transaction($koneksi);

        try {
            // Update data di tabel `author`
            $update_author = mysqli_query($koneksi, "
                UPDATE author 
                SET First_Name = '$First_Name', Last_Name = '$Last_Name', Birth_Date = '$Birth_Date' 
                WHERE id = '$id'
            ");

            if (!$update_author) {
                throw new Exception("Gagal mengupdate tabel author: " . mysqli_error($koneksi));
            }

            // Update data di tabel `biographies`
            $update_biography = mysqli_query($koneksi, "
                UPDATE biographies 
                SET summary = '$summary' 
                WHERE author_id = '$id'
            ");

            if (!$update_biography) {
                throw new Exception("Gagal mengupdate tabel biographies: " . mysqli_error($koneksi));
            }

            // Commit transaksi
            mysqli_commit($koneksi);

            // Redirect setelah sukses
            header("Location: tampilan.php");
        } catch (Exception $e) {
            // Rollback jika terjadi error
            mysqli_rollback($koneksi);
            echo "Terjadi kesalahan: " . $e->getMessage();
        }
    }
    ?>
</body>
</html>
