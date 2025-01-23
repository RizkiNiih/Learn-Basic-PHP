<!-- 
// Variable Scope / lingkup variabel
// $x = 10; // untuk ini sendiri variabel local untuk halaman ini

// function tampilx() {
//     global $x; // fungsi dari global adalah mencari apakah ada variabel x nya diluar functionnya
//     // $x = 20; //variabel x tersebut adalah variabel lokal yang hanya untuk function itu saja 
// }
//     echo $x; 

// tampilx();
// echo "<br>";
// echo $x;

// Variabel Superglobals
//$_GET itu bisa memanggil kontennya melalui link url

//POST

//untuk membuat password jika kita ingin membuat orang tidak mengetuinya kita perlu menambahkan input type password
-->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST</title>
</head>
<body>
    <form action="index1.php9 " method="post">
        Masukkan nama :
        <input type="text" name="nama">
        <br>
        <button type="submit" name="submit">Kirim!</button>
    </form>
</body>
</html>