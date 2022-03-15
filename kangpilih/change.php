<?php

    require_once "../config/konek.php";
    session_start();
    if(@$_SESSION['id_user'] == $_POST['id_anggota']) {
        if(@$_POST['simpan']) {
            $update = $konek->query("UPDATE anggota SET nama_anggota = '$_POST[nama_anggota]',kelas = '$_POST[kelas]',no_hp = '$_POST[no_hp]',username = '$_POST[username]',sandi = MD5('$_POST[sandi]') WHERE id_anggota = $_POST[id_anggota]");
            if($update) {
                header("Location: ./?i=$_POST[id_anggota]&s=1");
            }
        }
    }

?>