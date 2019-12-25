<?php
require_once 'koneksi.php';
if(isset($_GET['key'])){
        $key = $_GET['key'];
        $query = "SELECT * FROM laporan_pekerjaan WHERE nama_pekerjaan LIKE '%$key%' ";
        $result = mysqli_query($koneksi, $query);
        $response = array();   
            while($row = mysqli_fetch_assoc($result)){
                    array_push($response,
                    array(
                        'id'=>$row['id'],
                        'kode'=>$row['kode'],
                        'satuan'=>$row['satuan'],
                        'harga'=>$row['harga'],
                        'nama_pekerjaan'=>$row['nama_pekerjaan']
                    ));
                }echo json_encode($response);
    }else{
            $query = "SELECT * FROM laporan_pekerjaan";
            $result = mysqli_query($koneksi, $query);
            $response = array();   
                while($row = mysqli_fetch_assoc($result)){
                        array_push($response,
                        array(
                        'id'=>$row['id'],
                        'kode'=>$row['kode'],
                        'satuan'=>$row['satuan'],
                        'harga'=>$row['harga'],
                        'nama_pekerjaan'=>$row['nama_pekerjaan']
                    ));
                }echo json_encode($response);
            }
            mysqli_close($koneksi);
            ?>