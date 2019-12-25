<?php
require_once 'koneksi.php';
if($_SERVER['REQUEST_METHOD']=='POST' && $koneksi){
        $ulp =              $_POST['ulp'];
        $feder =            $_POST['feder'];
        $section =          $_POST['section'];
        $jenis_temuan =     $_POST['jenis_temuan'];
        $uraian_pekerjaan = $_POST['uraian_pekerjaan'];
        $detail_kerja =     $_POST['detail_kerja'];
        $satuan_material =  $_POST['satuan_material'];
        $satuan_kerja =     $_POST['satuan_kerja'];
        $vol_kerja =        $_POST['vol_kerja'];
        $status =           $_POST['urgensi'];
        $pemadaman =        $_POST['pemadaman'];
        $tim_pemelihara =   $_POST['tim_pemelihara'];
        $alamat =           $_POST['alamat'];
        $tgl_masuk =        $_POST['tgl_masuk'];
        $latitude =         $_POST['latitude'];
        $longtitude =       $_POST['longtitude'];
        $foto_sebelum =     $_POST['foto_sebelum'];

    
        require_once 'koneksi.php';
    
        $target_dir = "upload/images";


if(!file_exists($target_dir)){
        mkdir ($target_dir, 0777, true);
        chmod("pln/upload/images",777);
}

        $target_dir =$target_dir ."/".$latitude.".jpg";
        $server_url = "http://192.168.30.23/pln/$target_dir";

        $sql = "INSERT INTO laporan_laporan_umum
            (ulp, feder, section, jenis_temuan, uraian_pekerjaan, detail_kerja, satuan_material,satuan_kerja, vol_kerja, urgensi, pemadaman, tim_pemelihara, alamat, tgl_masuk, latitude, longtitude, foto_sebelum)
            VALUES
            ('$ulp','$feder','$section','$jenis_temuan','$uraian_pekerjaan','$detail_kerja','$satuan_material','$satuan_kerja','$vol_kerja','$status','$pemadaman','$tim_pemelihara','$alamat','$tgl_masuk','$latitude','$longtitude','$server_url')";

if(mysqli_query($koneksi,$sql)){
        if(file_put_contents($target_dir, base64_decode($foto_sebelum))){
            $result ["success"] = "1";
            $result ["massage"] = "success";
            echo json_encode($result);
            mysqli_close($koneksi);
                echo json_encode(array([
                    "Massage" => "file uploadeed.",
                    "status" => "ok"
                
                ]));
            $result ["succes"] = "1";
            $result ["massage"] = "succes";
            echo json_encode($result);
            mysqli_close($koneksi);
    }
    else
    {
            $result ["succes"] = "0";
            $result ["massage"] = "error";
            echo json_encode($result);
            mysqli_close($koneksi);
    }
}
}
else
{
            echo json_encode(array([
                "Massage" => "file not uploadeed.",
                "status" => "error"
            ]));
}


?>