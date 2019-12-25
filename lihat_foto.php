<?php
require_once 'koneksi.php';

if($_SERVER['REQUEST_METHOD']=='POST' && $koneksi){
    require_once 'singel_data.php';
    
    $foto_sebelum = $_POST['foto_sebelum'];
    echo($foto_sebelum);
}
mysqli_close($koneksi);
?>