<?php
    include "koneksi.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE from `pendatang` where id=$id";
        $kon->query($sql);
    }
    header('location:/crud/index.php');
    exit;
?>