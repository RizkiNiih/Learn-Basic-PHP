<?php

abstract class manajemenBuku {
    abstract public function tambahBuku(Buku $buku);
    abstract public function hapusBuku($judul);
    abstract public function getDaftarBuku();
    
}

?>