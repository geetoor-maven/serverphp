<?php
require_once 'koneksi.php';

if($_SERVER['REQUEST_METHOD']=='POST' && $koneksi){
    $nama =         $_POST['nama_surveyor'];
    $ulp =          $_POST['ulp'];
    $jenis_temuan = $_POST['jenis_temuan'];
    $alamat =       $_POST['alamat'];
    $tanggal =      $_POST['tgl_masuk'];
    $latitude =     $_POST['latitude'];
    $longtitude =   $_POST['longtitude'];
    $foto_sebelum = $_POST['foto_sebelum'];
    
    require_once 'koneksi.php';
   
    $target_dir = "upload/images";


if(!file_exists($target_dir)){
    mkdir ($target_dir, 0777, true);
    chmod("pln/upload/images",777);
}

    $target_dir =$target_dir ."/".$nama.".jpg";
    $server_url = "http://192.168.30.23/pln/$target_dir";


    $sql = "INSERT INTO laporan_laporan_umum
            (nama_surveyor, ulp, jenis_temuan, alamat, tgl_masuk, latitude, longtitude, foto_sebelum)
            VALUES
            ('$nama', '$ulp', '$jenis_temuan','$alamat', '$tanggal', '$latitude','$longtitude','$server_url')";


    
if(mysqli_query($koneksi,$sql) ){
        if(file_put_contents($target_dir, base64_decode($foto_sebelum))){
                $result ["success"] = "1";
                $result ["massage"] = "success";
                echo json_encode($result);
                mysqli_close($koneksi);
                    echo json_encode(array([
                        "Massage" => "file uploadeed.",
                        "status" => "ok"
                
                    ]));
                $result ["success"] = "1";
                $result ["massage"] = "success";
                echo json_encode($result);
                mysqli_close($koneksi); 
    }
    else
    {
                $result ["success"] = "0";
                $result ["massage"] = "error";
                echo json_encode($result);
                mysqli_close($koneksi);
    }
    
    
}
    
}else
{
                    echo json_encode(array([
                        "Massage" => "file not uploadeed.",
                        "status" => "error"
                    ]));
}
mysqli_close($koneksi);



?>