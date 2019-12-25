<?php

 
if($_SERVER['REQUEST_METHOD']=='POST' ){
    require_once('koneksi.php');
   
    $id = $_POST['id'];
    $uraian_pekerjaan = $_POST['uraian_pekerjaan'];
    $satuan_kerja =$_POST['satuan_kerja'];
    $vol_kerja =$_POST['vol_kerja'];
    $satuan_material = $_POST['satuan_material'];
    
    $foto_sebelum = $_POST['foto_sebelum'];
    
    require_once 'koneksi.php';
    //here
    $target_dir = "upload/images";


if(!file_exists($target_dir)){
    mkdir ($target_dir, 0777, true);
    chmod("pln/upload/images",777);
}

$target_dir =$target_dir ."/".$vol_kerja.".jpg";
$server_url = "http://192.168.30.23/pln/$target_dir";

   
    $query = "UPDATE `laporan_laporan_umum` SET 
    `uraian_pekerjaan` = '$uraian_pekerjaan', 
    `satuan_kerja` = '$satuan_kerja', 
    `vol_kerja` = '$vol_kerja',
    `satuan_material` = '$satuan_material',
    `foto_sebelum` = '$server_url'
    WHERE `laporan_laporan_umum`.`id` = $id ";

if(mysqli_query($koneksi,$query) ){
    if(file_put_contents($target_dir, base64_decode($foto_sebelum))){
        $result ["success"] = "1";
        $result ["massage"] = "success";
        echo json_encode($result);
        mysqli_close($koneksi);
        echo json_encode(array([
            "Massage" => "file uploadeed.",
            "status" => "ok"
            
        ]));
  
        require_once('koneksi.php');
        $result ["success"] = "1";
        $result ["massage"] = "success";
        echo json_encode($result);
        mysqli_close($koneksi); 
}else{
    $result ["success"] = "0";
    $result ["massage"] = "error";
    echo json_encode($result);
    mysqli_close($koneksi);
}


}
}else{
    echo json_encode(array([
        "Massage" => "file not uploadeed.",
        "status" => "error"
    ]));
    
    
    }


?>