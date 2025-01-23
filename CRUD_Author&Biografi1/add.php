<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
</head>
<body>
    <center>Tambah</center> 
    <center>
        <form action="add.php" method="post" name="author">
            <table>
                <tr>
                    <td>ID</td>
                    <td><input type="text" name="id" required></td>
                </tr>
                <tr>
                    <td>First Name</td>
                    <td><input type="text" name="First_Name" required></td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td><input type="text" name="Last_Name" required></td>
                </tr>
                <tr>
                    <td>Birth Date</td>
                    <td><input type="date" name="Birth_Date" required></td>
                </tr>
                <tr>
                    <td>Summary</td>
                    <td><input type="text" name="summary"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Tambah" class="btn btn-success btn-lg"></td>
                </tr>
            </table>
        </form>
    </center>
    <?php 
    if (isset($_POST['submit'])) {
        // Ambil data dari form
        $id = $_POST['id'];
        $First_Name = $_POST['First_Name'];
        $Last_Name = $_POST['Last_Name'];
        $Birth_Date = $_POST['Birth_Date'];
        $summary = $_POST['summary'];

        // Format website_url jika kosong
        $website_url = "http://" . strtolower($First_Name) . strtolower($Last_Name) . "@gmail.com";

        // Koneksi ke database
        include 'koneksi.php';

        // Mulai transaksi
        mysqli_begin_transaction($koneksi);

        try {
            // Masukkan data ke tabel 'author'
            $query_author = "INSERT INTO author (id, First_Name, Last_Name, Birth_Date) 
                             VALUES ('$id', '$First_Name', '$Last_Name', '$Birth_Date')";
            $result_author = mysqli_query($koneksi, $query_author);

            if (!$result_author) {
                throw new Exception("Gagal menyisipkan data ke tabel author: " . mysqli_error($koneksi));
            }

            // Masukkan data ke tabel 'biographies'
            $query_biography = "INSERT INTO biographies (author_id, summary, website_url) 
                                VALUES ('$id', '$summary', '$website_url')";
            $result_biography = mysqli_query($koneksi, $query_biography);

            if (!$result_biography) {
                throw new Exception("Gagal menyisipkan data ke tabel biographies: " . mysqli_error($koneksi));
            }

            // Commit transaksi jika semua berhasil
            mysqli_commit($koneksi);

            // Redirect ke tampilan
            header("Location: tampilan.php");
            exit();

        } catch (Exception $e) {
            // Rollback jika ada kesalahan
            mysqli_rollback($koneksi);
            echo "<p style='color: red;'>Terjadi kesalahan: " . $e->getMessage() . "</p>";
        }
    }
    ?> 
</body>
</html>
