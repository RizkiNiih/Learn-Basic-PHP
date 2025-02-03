<?php

include 'koneksi.php';

$id= $_GET['id'];
$result = mysqli_query($koneksi, "DELETE FROM author WHERE id=$id");
header("Location:tampilan.php");
?>