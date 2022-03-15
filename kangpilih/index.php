<?php 

    require_once "../config/konek.php";
    session_start();
    
    if($_SESSION['id_user'] != $_GET['i']) {
        header("Location: ../index.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/main.style.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title>S I P I L I S - Sistem Pemilihan Ketua OSIS</title>
</head>
<body>
    <div class="container container-fluid my-5">
        <div class="row mt-5">
            <?php

            if(@$_GET['s'] == 1) {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> Akun anda berhasil diubah.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            else if(@$_GET['s'] == 2) {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal!</strong> Akun anda gagal diubah,coba lagi beberapa saat.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }

            ?>
            <div class="col-12 mx-auto">
                <div class="card">
                    <h3 class="text-center card-title my-4">Profile</h3>
                    <div class="card-body">
                        <form action="./change.php" method="POST">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-lg-6 mb-3">
                                        <label for="username" class="mb-2 fw-bold">Username</label>
                                        <input type="hidden" name="id_anggota" id="id_anggota">
                                        <input type="text" name="username" id="username" class="form-control" placeholder="alexa32" required>
                                    </div>
                                    <div class="col-12 col-lg-6 mb-3">
                                        <label for="nama_anggota" class="mb-2 fw-bold">Nama Lengkap</label>
                                        <input type="text" name="nama_anggota" placeholder="Alexander Pierce" id="nama_anggota" class="form-control" required>
                                    </div>
                                    <div class="col-12 col-lg-6 mb-3">
                                        <label for="kelas" class="mb-2 fw-bold">Kelas</label>
                                        <input type="text" name="kelas" id="kelas" placeholder="XII RPL 1" class="form-control" required>
                                    </div>
                                    <div class="col-12 col-lg-6 mb-3">
                                        <label for="no_hp" class="mb-2 fw-bold">No. Handphone</label>
                                        <input type="text" name="no_hp" placeholder="085732118921" id="no_hp" class="form-control" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="sandi" class="mb-2 fw-bold">Sandi</label>
                                        <small class="text-danger ml-3">*Tulis Sandi setiap melakukan perubahan.</small>
                                        <input type="password" name="sandi" id="sandi" class="form-control" placeholder="Min : 6 Characters" minlength="6" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                            <input type="submit" name="simpan" class="btn btn-primary float-end" value="Simpan">
                                            <a href="../" class="btn btn-secondary mx-2 float-end">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        $data = $konek->query("SELECT * FROM anggota WHERE id_anggota = $_GET[i]");
        $row = mysqli_fetch_assoc($data);
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    <script src="asssets/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script>
        $('#id_anggota').val('<?=$row['id_anggota']?>');
        $('#nama_anggota').val('<?=$row['nama_anggota']?>');
        $('#kelas').val('<?=$row['kelas']?>');
        $('#no_hp').val('<?=$row['no_hp']?>');
        $('#username').val('<?=$row['username']?>');
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
                        <a href="../login.php" class="nav-link">Sign In</a>
                      </li>
              <?php
                    }
                    else if(@$_SESSION['id_user']) {
              ?>
                        <li class="nav-item">
                          <a href="../logout.php" class="nav-link">Sign Out</a>
                        </li>
              <?php
                    }
              ?>
              <li class="nav-item">
                <a href="../hasil.php" class="nav-link">Hasil</a>
              </li>
              <?php 
              if(@$_SESSION['level'] > 0) {
              ?>
                <li class="nav-item">
                  <a href="../index.php" class="nav-link">Beranda</a>
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