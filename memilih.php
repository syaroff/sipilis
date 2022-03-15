<?php

    require_once "./config/konek.php";
    session_start();
    $id_hak = 0;
    $data_hak  = $konek->query("SELECT * FROM hak_pilih WHERE id_anggota = '$_SESSION[id_user]' AND status_pilih = 1");
    $rows = mysqli_num_rows($data_hak);
    
    foreach($data_hak as $row) { $id_hak = $row['id_hak']; }
    

    $pilih = $konek->query("INSERT INTO pilihan (id_hak,id_paslon) VALUES ('$id_hak','$_GET[id_paslon]')");

    $upHakPilih = $konek->query("UPDATE hak_pilih SET id_anggota = null,status_pilih= 0 WHERE id_hak = '$id_hak'");
    
    if($rows) {
        echo $rows;
    }
    else {
        echo $rows;
    }

?>