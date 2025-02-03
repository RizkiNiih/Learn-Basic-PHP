<?php
// Menciptakan hierarki antar kelas (Parent & Child)
//Child Class, mewarisi semua properti dan method dari parent-nya (yang visible)
//Child Class, memperluas (extends) fungsionalitas dari parent-nya


class Produk {
    public $judul,  //property
           $penulis,
           $penerbit,
           $harga,
           $jmlHalaman,
           $waktuMain;

    // Mengapa harus diletakkan di awal?
    // Parameter wajib harus dideklarasikan sebelum parameter opsional agar PHP dapat menentukan nilai yang diberikan ke masing-masing parameter tanpa kebingungan.
    public function __construct( $judul= "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0, $waktuMain = 0 ) {
       $this->judul = $judul;
       $this->penulis = $penulis;
       $this->penerbit = $penerbit;
       $this->harga = $harga;
       $this->jmlHalaman = $jmlHalaman;
       $this->waktuMain = $waktuMain;

    }//kenapa menggunakan __construct karena itu adalah magic method
    // dengan __construct dapat memastikan bahwa setiap objek memiliki nilai awal yang valid dan mengurangi duplikasi kode

    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    //untuk mengambil isi dari property dari dalam class dengan menambahkan $this->
    }

    public function getInfoProduk() {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga}) ";

        return $str;
    }

}


class Komik extends Produk {
    public function getInfoProduk()
    {
        $str = "Komik : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga}) - {$this->jmlHalaman} Halaman. ";
        return $str;
    }
}


class Game extends Produk {
    public function getInfoProduk()
    {
        $str = "Game : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga}) - {$this->waktuMain} Jam. ";
        return $str;
    }
}


class CetakInfoProduk {
    public function cetak( $produk ) {
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }
}



$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100, 0);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony computer", 250000, 0, 50);

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();



