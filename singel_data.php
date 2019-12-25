<?php
require_once 'koneksi.php';
$id = $_GET['id'];
$query = "SELECT * FROM laporan_laporan_umum WHERE id = '$id'";
$sql = mysqli_query($koneksi,$query);
$ray = array();
while ($row = mysqli_fetch_array($sql)) {
    array_push($ray, array(
        "id"=>$row['id'],
        "uraian_pekerjaan"=>$row['uraian_pekerjaan'],
        "tgl_masuk"=>$row['tgl_masuk'],
        "satuan_kerja"=>$row['satuan_kerja'],
        "vol_kerja"=>$row['vol_kerja'],
        "satuan_material"=>$row['satuan_material'],
        "foto_sebelum"=>$row['foto_sebelum']
        
    ));
        
}echo json_encode($ray);
mysqli_close($koneksi);

?>