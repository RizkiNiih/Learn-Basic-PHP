<?php

class Produk {
    public $judul = "judul",  //property
           $penulis = "penulis",
           $penerbit = "penerbit",
           $harga = "0";

    public function __construct( $judul, $penulis, $penerbit, $harga ) {
       $this->judul = $judul;
       $this->penulis = $penulis;
       $this->penerbit = $penerbit;
       $this->harga = $harga;
    }//kenapa menggunakan __construct karena itu adalah magic method

    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    //untuk mengambil isi dari property dari dalam class dengan menambahkan $this->
    }

}

$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000);

echo "Komik : " . $produk1->getLabel();
echo "<br>";