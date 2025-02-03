<?php

class Produk {
    public $judul,  //property
           $penulis,
           $penerbit,
           $harga,
           $jmlHalaman,
           $waktuMain,
           $tipe;

    // Mengapa harus diletakkan di awal?
    // Parameter wajib harus dideklarasikan sebelum parameter opsional agar PHP dapat menentukan nilai yang diberikan ke masing-masing parameter tanpa kebingungan.
    public function __construct( $tipe, $judul= "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0, $waktuMain = 0 ) {
       $this->judul = $judul;
       $this->penulis = $penulis;
       $this->penerbit = $penerbit;
       $this->harga = $harga;
       $this->jmlHalaman = $jmlHalaman;
       $this->waktuMain = $waktuMain;
       $this->tipe = $tipe;

    }//kenapa menggunakan __construct karena itu adalah magic method
    // dengan __construct dapat memastikan bahwa setiap objek memiliki nilai awal yang valid dan mengurangi duplikasi kode

    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    //untuk mengambil isi dari property dari dalam class dengan menambahkan $this->
    }

    public function getInfoLengkap() {
        $str = "{$this->tipe} : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga}) ";
        if( $this->tipe == "Komik" ) {
            $str .= " - {$this->jmlHalaman} Halaman.";
        } else if( $this->tipe == "Game" ) {
            $str .= " ~ {$this->waktuMain} Jam.";
        }

        return $str;
    }

}


class CetakInfoProduk {
    public function cetak( $produk ) {
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }
}



$produk1 = new Produk("Komik", "Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100, 0);
$produk2 = new Produk("Game", "Uncharted", "Neil Druckmann", "Sony computer", 250000, 0, 50);

echo $produk1->getInfoLengkap();
echo "<br>";
echo $produk2->getInfoLengkap();



