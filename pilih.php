<?php

    require_once "./config/konek.php";
    session_start();

    $cek_hak = $konek->query("SELECT * FROM hak_pilih WHERE id_anggota = $_SESSION[id_user] AND status_pilih = 1");
    $rows_hak = mysqli_num_rows($cek_hak);

    if(!@$_SESSION['id_user'] AND !@$_SESSION['level']) {
        header("Location: ./login.php?p=$_GET[p]");
    }
    else if(@$_SESSION['id_user'] AND @$_SESSION['level'] == 0) {
        header("Location: ./imtheone/");
    }
    else if(!@$_GET['p']  AND !@$_GET['s']) {
        header("Location: ./index.php");
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/main.style.css">
    <link rel="stylesheet" href="./assets/css/input.style.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title>S I P I L I S - Sistem Pemilihan Ketua OSIS</title>
</head>
<body>
    <div class="container container-fluid my-5">
        <div class="row my-5" style="min-height: 80vh;">
            <div class="col-12">
                <?php

                    if(@$_GET['s'] == 1) {
                ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> Pilihanmu sudah kami terima,silahkan cek hasil di halaman utama.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                <?php
                    }
                    else if(@$_GET['s'] == 2) {
                ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Gagal!</strong> Pilihanmu tidak bisa kami terima,coba lagi beberapa saat.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                <?php
                    }
                
                ?>
                <div class="card">
                    <div class="card-body" >
                        <div class="container-fluid">
                            <div class="row" >
                                <div class="col-12 col-md-6 text-end">
                                    <img src="./assets/img/paslon.jpg" alt="" class="img-fluid w-100">
                                </div>
                                <div class="col-12 col-md-6">
                                    <h4 class="fw-bold text-center text-md-start my-3 my-md-2"><span id="id_paslon"></span> | <span id="nama_paslon"></span></h4>
                                    <p class="mb-2">
                                        <b>Visi:</b> <br>
                                        <span id="visi">
                                            
                                        </span>
                                    </p>
                                    <p class="mb-2">
                                        <b>Misi:</b> <br>
                                        <span id="misi">

                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <?php
                            if($rows_hak) {
                        ?>
                                <button id="btn-pilih" class="btn btn-primary float-end">Submit Pilihan</button>
                        <?php
                            }
                            else  {
                        ?>
                                <button class="btn btn-primary float-end">Kamu sudah memilih</button>
                        <?php
                            }
                        ?>
                        <a href="./index.php" class="btn btn-secondary float-end mx-2">Kembali</a>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
    
    <?php
        if(@$_GET['p']) {
            $data = $konek->query("SELECT * FROM paslon WHERE id_paslon = $_GET[p]");
            $row = mysqli_fetch_assoc($data);
        }
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    <script src="asssets/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script>
        $('#id_paslon').text('<?=$row['id_paslon']?>');
        $('#nama_paslon').text('<?=$row['nama_paslon']?>');
        $('#visi').text('<?=$row['visi']?>');
        $('#misi').text('<?=$row['misi']?>');
        $('#btn-pilih').click(function (e) { 
            e.preventDefault();
            id_paslon = <?=$row['id_paslon']?>;
            $.ajax({
                type: "GET",
                url: "./memilih.php",
                data: {id_paslon : id_paslon},
                success: function (res) {
                    console.log(res)
                    if( res == 1 ) {
                        window.location.href= "./pilih.php?p=<?=$row['id_paslon']?>&s=1";
                    }
                    else if(res == 0) {
                        window.location.href= "./pilih.php?p=<?=$row['id_paslon']?>&s=2";
                    }
                }
            });
        });
    </script>
</body>
<footer class="mt-5 py-2">
      <div class="container">
        <div class="row align-items-center justify-content-md-between">
          <div class="col-12 col-md-6 text-center text-md-start d-none d-md-block">
            <div class=" text-xl-left text-muted">
              © 2022 <a href="http://syaroff.github.io" class="fw-bold ml-1 text-decoration-none" target="_blank">Syaroful AR</a>
            </div>
          </div>
          <div class="col-12 col-md-6 text-center">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <?php
                    if(empty($_SESSION['id_user'])) {
              ?>
                      <li class="nav-item">
                        <a href="./login.php" class="nav-link">Sign In</a>
                      </li>
              <?php
                    }
                    else if(@$_SESSION['id_user']) {
              ?>
                        <li class="nav-item">
                          <a href="./logout.php" class="nav-link">Sign Out</a>
                        </li>
              <?php
                    }
              ?>
              <li class="nav-item">
                <a href="./hasil.php" class="nav-link">Hasil</a>
              </li>
              <?php 
              if(@$_SESSION['level'] > 0) {
              ?>
                <li class="nav-item">
                  <a href="./kangpilih/" class="nav-link">Profile</a>
                </li>
              <?php
              }
              else if(@$_SESSION['level'] == 0) {
              ?>
                <li class="nav-item">
                  <a href="./imtheone/prof.php" class="nav-link">Profile</a>
                </li>
              <?php
              }
              ?>
            </ul>
          </div>
          <div class="col-12 col-md-6 text-center text-md-start d-block d-md-none mb-2">
              <hr>
            <div class=" text-xl-left text-muted">
              © 2022 <a href="http://syaroff.github.io" class="fw-bold ml-1 text-decoration-none" target="_blank">Syaroful AR</a>
            </div>
          </div>
        </div>
      </div>
</footer>
</html>