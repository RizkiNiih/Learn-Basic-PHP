<?php

class Buku {
    private $id;
    private $judul;
    private $penulis;
    private $tahunTerbit;
    private $harga;

    public function __construct($id, $judul, $penulis, $tahunTerbit, $harga) {
        $this->id = $id;
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->tahunTerbit = $tahunTerbit;
        $this->harga = $harga;
    }

    public function getjudul() {
        return $this->judul;
    }

    public function getpenulis() {
        return $this->penulis;
    }

    public function gettahunTerbit() {
        return $this->tahunTerbit;
    }

    public function getharga() {
        return $this->harga;
    }

}

?>