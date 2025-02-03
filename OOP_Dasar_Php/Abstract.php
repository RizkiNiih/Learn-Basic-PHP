<?php

 

abstract class Produk {
    private $judul,  //property
           $penulis,
           $penerbit,
           $harga,
           $diskon = 0;



    // Mengapa harus diletakkan di awal?
    // Parameter wajib harus dideklarasikan sebelum parameter opsional agar PHP dapat menentukan nilai yang diberikan ke masing-masing parameter tanpa kebingungan.
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;

    }//kenapa menggunakan __construct karena itu adalah magic method
    // dengan __construct dapat memastikan bahwa setiap objek memiliki nilai awal yang valid dan mengurangi duplikasi kode

    public function setJudul( $judul ) {
        $this->judul = $judul;
    }

    public function getJudul() {
        return $this->judul;
    }

    public function setPenulis( $penulis ) {
        $this->penulis = $penulis;
    }
    
    public function getPenulis() {
        return $this->penulis;
    }

    public function setPenerbit( $penerbit ) {
        $this->penerbit = $penerbit;
    }

    public function getPenerbit() {
        return $this->penerbit;
    }

    public function setDiskon( $diskon ) {
        $this->diskon = $diskon;
    }

    public function getdiskon() {
        return $this->diskon;
    }


    public function setHarga( $harga ) {
        $this->harga = $harga;
    }

    public function getHarga() {
        return $this->harga - ( $this->harga * $this->diskon / 100 );
    }

    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    //untuk mengambil isi dari property dari dalam class dengan menambahkan $this->
    }

    abstract public function getInfoProduk();
    
    public function getInfo() {
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
        $str = "Komik : " . $this->getInfo() . " - {$this->jmlHalaman} Halaman. ";
        return $str;
    }
}

    class Game extends Produk {
        public $waktuMain;
    
        public function __construct( $judul, $penulis, $penerbit, $harga, $waktuMain ) {
            parent::__construct($judul, $penulis, $penerbit, $harga);
            $this->waktuMain = $waktuMain;
        }
               
        public function getInfoProduk() {
            $str = "Game : " . $this->getInfo() . " ~ {$this->waktuMain} Jam. ";
            return $str;
            
        }
    }
    

class CetakInfoProduk {
    public $daftarProduk = array();

    public function tambahProduk( Produk $produk ) {
        $this->daftarProduk[] = $produk;
    }

    public function cetak() {
        $str = "DAFTAR PRODUK : <br>";

        foreach( $this->daftarProduk as $p ) {
            $str .= "- {$p->getInfoProduk()} <br>";
        }

        return $str;
    }
}



$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony computer", 250000, 50);

$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk( $produk1 );
$cetakProduk->tambahProduk( $produk2 );
echo $cetakProduk->cetak();

