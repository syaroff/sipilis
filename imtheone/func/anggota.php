<?php

    require_once "../../config/konek.php";
    
    if(@$_POST['simpan']) {
        $insert = $konek->query("INSERT INTO anggota (nama_anggota,kelas,no_hp,username,sandi) VALUES ('$_POST[nama_anggota]','$_POST[kelas]','$_POST[no_hp]','$_POST[username]',md5('$_POST[sandi]'))");
        
        $select = $konek->query("SELECT id_anggota FROM anggota ORDER BY id_anggota DESC LIMIT 1");
        $row = mysqli_fetch_assoc($select);$id_anggota = $row['id_anggota'];

        $hak_pilih = $konek->query("INSERT INTO hak_pilih (id_anggota,status_pilih) VALUES ($id_anggota,1)");

        if($insert) {
            header("Location: ../anggota.php?halaman=1&cs=1");
        }
    }
    else if(@$_POST['ubah']) {
        if(!empty($_POST['sandi'])) {
            $update = $konek->query("UPDATE anggota SET nama_anggota='$_POST[nama_anggota]',kelas='$_POST[kelas]',no_hp='$_POST[no_hp]',username='$_POST[username]',sandi=md5('$_POST[sandi]') WHERE id_anggota = $_POST[id_anggota]");
            if($update) {
                header("Location: ../anggota.php?halaman=1&cp=1");
            }
        }
        else {
            $update = $konek->query("UPDATE anggota SET nama_anggota='$_POST[nama_anggota]',kelas='$_POST[kelas]',no_hp='$_POST[no_hp]',username='$_POST[username]' WHERE id_anggota = $_POST[id_anggota]");
            if($update) {
                header("Location: ../anggota.php?halaman=1&cu=1");
            }
        }
   
    }
    else if(@$_GET['d']) {
        $hapus = $konek->query("DELETE FROM anggota WHERE id_anggota=$_GET[d]");
        $increment = $konek->query("ALTER TABLE anggota AUTO_INCREMENT = 1;ALTER TABLE hak_pilih AUTO_INCREMENT = 1");
        header("Location: ../anggota.php?halaman=1&cd=1");
    }
    
?>