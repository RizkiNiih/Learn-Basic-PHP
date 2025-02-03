<?php namespace App\Produk;

abstract class Produk {
    protected $judul,  //property
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

    abstract public function getInfo();
    
    
    
}