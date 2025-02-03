<?php

// jika membuat variable tetapi kalu variablenya didalam class, itu sudah tidak dinamakan variable tetapi property
//jika ada function didalam objek maka itu tidak disebut function melainkan method

class Produk {
    public $judul = "judul",  //property
           $penulis = "penulis",
           $penerbit = "penerbit",
           $harga = "0";

    // sayHello()//setiapkita menulisakan fungsi ini akan menuliskan helloword
    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    //untuk mengambil isi dari property dari dalam class dengan menambahkan $this->
    }

}

$produk3 = new Produk();
$produk3->judul = "Naruto";
$produk3->penulis = "Masashi Kishimoto";
$produk3->penerbit = "Shonen Jump";
$produk3->harga = "30000";

echo "Komik : $produk3->penulis, $produk3->penerbit";
echo "<br>";
$produk3->getLabel();