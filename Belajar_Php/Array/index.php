<?php 
//cara baru menggunakan array tanpa mengetik nama array
//$contoh = [""];
//elemen pada array boleh memiliki tipe data yang berbeda
//cara menampilkan array yaitu menggunakan var_dump dan print_r
//untuk menghitung jumlah elemen yang ada pada array dengan menggunakan count()

$angka = [3,2,15,20,11,77,89,8];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Array</title>
    <style>
        div {
            width: 50px;
            height: 50px;
            background-color: lightblue;
            text-align: center;
            line-height: 50px;
            margin: 3px;
            float: left;
        }

    </style>
</head>
<body>

<?php for( $i = 0; $i < count ($angka); $i++ ) { ?>
    <div><?= $angka [$i]; ?></div>
<?php } ?>
</body>
</html>