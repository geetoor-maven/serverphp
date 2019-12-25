<?php
$DB_USER = "root";
$DB_PASS = "";
$DB_HOST = "localhost";
$DB_NAME = "projek_PLN";

require_once('koneksi.php');
   $sql = "SELECT satuan FROM laporan_material";
$result = $koneksi->query($sql);

if ($result->num_rows >0) {

    while($row[] = $result->fetch_assoc()) {
    
    $tem = $row;
    
    $json = json_encode($tem);
    
    }
    
   } else {
    echo "0 results";
   }
    echo $json;
   $koneksi->close();
?>