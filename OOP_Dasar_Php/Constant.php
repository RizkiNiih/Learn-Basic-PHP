<?php 

//define() itu tidak bisa disimpan didalam class dan harus diletakkan diluar,
// dan const dapat disimpan didalam class


// define('NAMA', 'RizkiNiih');

// echo NAMA;

// echo "<br>";

// const UMUR = 17;
// echo UMUR;

class Coba {
    const NAMA = 'RizkiNiih';
    const UMUR = 17;
}

echo Coba::NAMA;
echo "<br>";
echo Coba::UMUR;    

echo __NAMESPACE__;

?>