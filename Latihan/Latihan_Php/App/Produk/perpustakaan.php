<?php

require_once 'Buku.php';
require_once 'manajemenBuku.php';

class Perpustakaan extends manajemenBuku {
    private $daftarBuku = [];

    public function tambahBuku(Buku $buku) {
        $this->daftarBuku[] = $buku;
    }

    public function hapusBuku($judul) {
        foreach ($this->daftarBuku as $index => $buku) {
            if ($buku->getJudul() === $judul) {
                unset($this->daftarBuku[$index]);
                return true;
            }
        }
        return false;
    }

    public function getDaftarBuku() {
        return $this->daftarBuku;
    }
}
