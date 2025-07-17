<?php
echo "<h1>Konversi Type Data</h1><br>";
$bayar = "500.77 Rupiah";
echo "Tipe data string: $bayar<br>";
settype($bayar, "double"); //tambahkan kutip, jika tidak maka akan terjadi error. dapat disederhanakan dengan menggantikan kata double dengan float
echo "Tipe data double: $bayar<br>";
settype($bayar, "integer"); //dapat disederhanakan dengan menggantikan kata double dengan int
echo "Tipe data integer: $bayar<br>";
?>