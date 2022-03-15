<?php

    require_once "./config/konek.php";
    session_start();
    if(@$_POST['signin']) {

        if($_POST['level'] > 0 ) {
            
            $login = $konek->query("SELECT * FROM anggota WHERE sandi = MD5('$_POST[sandi]') AND username = '$_POST[username]'");

            foreach($login as $row) { $id_user = $row['id_anggota']; }
            if(mysqli_num_rows($login)) {

                $_SESSION['username'] = $_POST['username'];
                $_SESSION['id_user'] = $id_user;
                $_SESSION['level'] = 1;

                if(@$_GET['p']) {
                    header("Location: ./pilih.php?p=$_GET[p]");
                }
                else {
                    header("Location: ./index.php");
                }
            }
            else {
                if(@$_GET['p']) {
                    header("Location: ./login.php?err=1&p=$_GET[p]");
                }
                else  {
                    header("Location: ./login.php?err=1");
                }
               
            }

        }
        else {
            $login = $konek->query("SELECT * FROM pengurus WHERE sandi = MD5('$_POST[sandi]') AND username = '$_POST[username]'");

            foreach ($login as $row) { $id_user = $row['id_pengurus']; }

            if(mysqli_num_rows($login)) {

                $_SESSION['username'] = $_POST['username'];
                $_SESSION['id_user'] = $id_user;
                $_SESSION['level'] = 0;

                header("Location: ./imtheone/");
            }
            else  {
                if(@$_GET['p']) {
                    header("Location: ./login.php?err=1&p=$_GET[p]");
                }
                else  {
                    header("Location: ./login.php?err=1");
                }
            }
        }
    }

?>