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


class CetakInfoProduk {
    public function cetak( $produk ) {
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }
}



$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100, 0, "Komik");
$produk2 = new Produk("Uncharted", "Neil Druckmann", "Sony computer", 250000, 0, 50, "Game");

echo "Komik : " . $produk1->getLabel();
echo "<br>";
echo "Game : ". $produk2->getLabel();
echo "<br>";



$infoproduk1 = new CetakInfoProduk();
$infoproduk2 = new CetakInfoProduk();
echo $infoproduk1->cetak($produk1);