<?php 
    //User-defined Function

        function salam($waktu = "Datang", $nama = "Rizki") {
            return "Selamat $waktu, $nama! ";
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mengetahui Function</title>
</head>
<body>
    <h1><?= salam(); ?></h1>
</body>
</html>