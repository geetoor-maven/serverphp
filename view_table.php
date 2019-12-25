<?php
require_once 'koneksi.php';
$query = "SELECT * FROM laporan_laporan_umum";
$result = mysqli_query($koneksi,$query);
$arraydata = array();

while($baris = mysqli_fetch_assoc($result)){
    $arraydata[]=$baris;   
}

echo json_encode($arraydata);
?>