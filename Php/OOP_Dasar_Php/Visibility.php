<?php

//public
//protected
//private

class Produk {
    public $judul,  //property
           $penulis,
           $penerbit;

    Protected $diskon = 0;


    private $harga;

    // Mengapa harus diletakkan di awal?
    // Parameter wajib harus dideklarasikan sebelum parameter opsional agar PHP dapat menentukan nilai yang diberikan ke masing-masing parameter tanpa kebingungan.
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;

    }//kenapa menggunakan __construct karena itu adalah magic method
    // dengan __construct dapat memastikan bahwa setiap objek memiliki nilai awal yang valid dan mengurangi duplikasi kode

    
    public function getHarga() {
        return $this->harga - ( $this->harga * $this->diskon / 100 );
    }

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
    public $jmlHalaman;

    public function __construct( $judul, $penulis, $penerbit, $harga, $jmlHalaman) {
       
        parent:: __construct( $judul, $penulis, $penerbit, $harga );
        //parent adalah keyword yang mengambil method atau property yang ada di class

        $this->jmlHalaman = $jmlHalaman;

        }

    public function getInfoProduk()
    {
        $str = "Komik : " . parent::getInfoProduk() . " - {$this->jmlHalaman} Halaman. ";
        return $str;
    }
}

    class Game extends Produk {
        public $waktuMain;
    
        public function __construct( $judul, $penulis, $penerbit, $harga, $waktuMain ) {
            parent::__construct($judul, $penulis, $penerbit, $harga);
            $this->waktuMain = $waktuMain;
        }
    
        public function setDiskon( $diskon ) {
            $this->diskon = $diskon;
        }
        
        public function getInfoProduk() {
            $str = "Game : " . parent::getInfoProduk() . " ~ {$this->waktuMain} Jam. ";
            return $str;
            
        }
    }
    

class CetakInfoProduk {
    public function cetak( $produk ) {
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }
}



$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony computer", 250000, 50);

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
echo "<hr>";


$produk2->setDiskon(50);
echo $produk2->getHarga();



