<?php


if ($_SERVER = ['REQUEST_METHOD'] == 'POST') 
{
    require_once('koneksi.php');
    
    $uraian_pekerjaan = $_POST['uraian_pekerjaan'];
    $satuan_kerja =$_POST['satuan_kerja'];
    $vol_kerja =$_POST['vol_kerja'];
    $satuan_material = $_POST['satuan_material'];
    $id = $_POST['id'];
    
    $sql = "UPDATE laporan_laporan_umum SET uraian_pekerjaan = '$uraian_pekerjaan',
    satuan_kerja = '$satuan_kerja',
    vol_kerja = '$vol_kerja',
    satuan_material = '$satuan_material'
    WHERE id = '$id'";

    $exequery = mysqli_query($koneksi, $sql);

    

    echo ($exequery) ? json_encode(array('kode' =>1, 'pesan' => 'data berhasil update')) : json_encode(array('
    kode' =>2, 'pesan' => 'data gagal diupdate'));
}
else
{
   echo json_encode(array('kode' => 101, 'pesan' => 'request tidak valid'));
}

?> 