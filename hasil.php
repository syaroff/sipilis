<?php

    require_once "./config/konek.php";
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/main.style.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title>S I P I L I S - Sistem Pemilihan Ketua OSIS</title>
</head>
<body>
    
    <div class="container container-fluid my-5">
        <div class="row mt-5" style="min-height: 65vh;">
            <?php
                $data_paslon = $konek->query("SELECT * FROM paslon");
                foreach ($data_paslon as $row) {
            ?>
                    <div class="col-12 col-sm-8 col-lg-3 mx-auto my-3">
                        <div class="card">
                            <img src="./assets/img/<?=$row['foto']?>" alt="" class="card-img-top img-fluid w-100">
                            <div class="card-body">
                                <h4 class="text-center card-title"><?=$row['nama_paslon']?></h4>
                                <?php 
                                    $data_suara = $konek->query("SELECT * FROM pilihan WHERE id_paslon = $row[id_paslon]");
                                    $jumlah_suara = mysqli_num_rows($data_suara);
                                ?>
                                <h1 class="text-center card-title"><?=$jumlah_suara?></h1>
                                <h5 class="text-center card-title">Suara</h5>
                            </div>
                        </div>
                    </div>
            <?php
                }
            ?>
        </div>
        <div class="row mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container-flui">
                            <div class="row">
                                <div class="col-12 col-sm-8 col-lg-3 mx-auto my-3">
                                    <h4 class="text-center">Jumlah Pemilih</h4>
                                    <?php
                                        $data = $konek-> query("SELECT * FROM hak_pilih");
                                        $total_pemilih = mysqli_num_rows($data);
                                    ?>
                                    <h1 class="text-center"><?=$total_pemilih?></h1>
                                    <h4 class="text-center">Orang</h4>
                                </div>
                                <div class="col-12 col-sm-8 col-lg-3 mx-auto my-3">
                                    <h4 class="text-center">Telah Memilih</h4>
                                    <?php
                                        $data = $konek-> query("SELECT * FROM hak_pilih WHERE status_pilih = 0");
                                        $total_pemilih = mysqli_num_rows($data);
                                    ?>
                                    <h1 class="text-center"><?=$total_pemilih?></h1>
                                    <h4 class="text-center">Orang</h4>
                                </div>
                                <div class="col-12 col-sm-8 col-lg-3 mx-auto my-3">
                                    <h4 class="text-center">Belum Memilih</h4>
                                    <?php
                                        $data = $konek-> query("SELECT * FROM hak_pilih WHERE status_pilih = 1");
                                        $total_pemilih = mysqli_num_rows($data);
                                    ?>
                                    <h1 class="text-center"><?=$total_pemilih?></h1>
                                    <h4 class="text-center">Orang</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    <script src="asssets/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
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
                <a href="./index.php" class="nav-link">Beranda</a>
              </li>
              <?php 
              if(@$_SESSION['level'] > 0) {
              ?>
                <li class="nav-item">
                  <a href="./kangpilih/?i=<?=$_SESSION['id_user']?>" class="nav-link">Profile</a>
                </li>
              <?php
              }
              else if(@$_SESSION['level'] == 0) {
              ?>
                <li class="nav-item">
                  <a href="./imtheone/prof.php?i=<?=$_SESSION['id_user']?>" class="nav-link">Profile</a>
                </li>
              <?php
              }
              ?>
            </ul>
          </div>
          <div class="col-12 col-md-6 text-center text-md-start d-block d-md-none mb-2">
              <hr>
            <div class=" text-xl-left text-muted">
              © <?=date("Y")?> <a href="http://syaroff.github.io" class="fw-bold ml-1 text-decoration-none" target="_blank">Syaroful AR</a>
            </div>
          </div>
        </div>
      </div>
</footer>
</html>