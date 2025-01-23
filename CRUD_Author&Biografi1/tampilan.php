<?php 
include 'koneksi.php';

// Query dengan JOIN untuk menggabungkan data dari tabel `author` dan `biographies`
$result = mysqli_query($koneksi, "
    SELECT 
        author.id,
        author.First_Name,
        author.Last_Name,
        author.Birth_Date,
        biographies.summary,
        biographies.website_url
    FROM 
        author
    LEFT JOIN 
        biographies
    ON 
        author.id = biographies.author_id
    ORDER BY 
        author.id DESC
");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <title>CRUD</title>
</head>
<body>
    <center><h1>Author and Biography Data</h1></center>
    <center>
        <table class="table table-bordered">
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Birth Date</th>
                <th>Summary</th>
                <th>Website URL</th>
                <th>Actions</th>
            </tr>
            <?php 
            // Iterasi hasil query untuk menampilkan data
            while ($data = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($data['id']) . "</td>";
                echo "<td>" . htmlspecialchars($data['First_Name']) . "</td>";
                echo "<td>" . htmlspecialchars($data['Last_Name']) . "</td>";
                echo "<td>" . htmlspecialchars($data['Birth_Date']) . "</td>";
                echo "<td>" . htmlspecialchars($data['summary'] ?? 'N/A') . "</td>";
                echo "<td><a href='" . htmlspecialchars($data['website_url'] ?? '#') . "' target='_blank'>" . htmlspecialchars($data['website_url'] ?? 'N/A') . "</a></td>";
                echo "<td>
                        <a href='update.php?id=" . htmlspecialchars($data['id']) . "'>Edit</a> | 
                        <a href='delete.php?id=" . htmlspecialchars($data['id']) . "'>Delete</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </center>
    <center><a href="add.php">Tambah Data</a></center>
</body>
</html>
