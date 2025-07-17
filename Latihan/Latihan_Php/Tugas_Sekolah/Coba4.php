<?php 
echo "<h1>Operator Perbandingan & Logika</h1><br>";
$a = 3;
$b = 5;
echo "a= $a<br>";
echo "b= $b<br>";
echo "a==b :".($a == $b)."<br>";
echo "a != b :".($a != $b)."<br>";
echo "a > b :". ($a > $b)."<br>";
echo "ab".($a < $b)."<br>";
echo "(a != b) && (ab) :".(($a != $b) && ($a < $b))."<br>";
echo "(a != b) || (ab) :".(($a != $b) || ($a < $b))."<br>";
?>