<?php
$servername="localhost";
$username="root";
$password="";
$db="dbpenjunjung";

$kon = new mysqli($servername,$username,$password,$db);
if($kon->connect_error){
    die("Koneksi Gagal!".$kon->connect_error);
}else{
echo "";
}
?>