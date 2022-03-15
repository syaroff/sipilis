<?php 
        session_start();
        require_once "../config/konek.php";
        if(!$_SESSION['username']) {
            header("Location: ../");
        }
        else if($_SESSION['level'] > 0 ) {
            header("Location: ../");
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    SIPILIS - Sistem Pemilihan Ketua OSIS
  </title>
  <!-- Favicon -->
  <link href="../assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="../assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />
</head>

<body class="">
  <?php include "../components/navside.php"?>
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark bg-gradient-primary" id="navbar-main">
      <div class="container-fluid">
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Search" type="text">
            </div>
          </div>
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="./profile.php?i=<?=$_SESSION['id_user']?>" >
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <i class="fa fa-user"></i>
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?= $_SESSION['username'] ?></span>
                </div>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="container-fluid pb-8 pt-2 pt-md-5">
      <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="px-2"><i class="fas fa-plus pr-2"></i> Tambah Anggota Baru</h3>
                </div>
                <div class="card-body">
                    <?php

                        if(@$_GET['cs']) {
                    ?>
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> Anggota baru berhasil ditambahkan.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                    <?php
                        }
                        else if(@$_GET['cp']) {
                    ?>
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> Akun anggota berhasil diperbarui beserta sandinya.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                    <?php
                        }
                        else if(@$_GET['cu']) {
                    ?>
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> Akun anggota berhasil diperbarui.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                    <?php
                        }
                        else if(@$_GET['cd']) {
                    ?>
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> Anggota Berhasil di Hapus.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                    <?php
                        }

                    ?>
                    <form action="./func/anggota.php" method="post">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xl-4 mb-3">
                                      <label for="nama_anggota">Nama Lengkap</label>
                                      <input type="hidden" name="id_anggota" id="id_anggota">
                                      <input type="text" name="nama_anggota" id="nama_anggota" class="form-control" placeholder="Alexander Pierce" required>
                                </div>
                                <div class="col-xl-4 mb-3">
                                    <label for="kelas">Kelas</label>
                                    <input type="text" name="kelas" id="kelas" class="form-control" placeholder="XII RPL 1" required>
                                </div>
                                <div class="col-xl-4 mb-3">
                                      <label for="no_hp">No. Handphone</label>
                                      <input type="number" name="no_hp" id="no_hp" class="form-control" placeholder="085982112342" required>
                                </div>
                                <div class="col-xl-6 mb-3">
                                      <label for="username">Username</label>
                                      <input type="text" name="username" id="username" class="form-control" placeholder="alexa212" required>
                                </div>
                                <div class="col-xl-6 mb-3">
                                      <label for="sandi">Kata Sandi</label>
                                      <input type="password" name="sandi" id="sandi" class="form-control" placeholder="Min : 6 Characters" minlength="6">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary float-right ml-2">
                        <input type="submit" name="ubah" value="Ubah" class="btn btn-warning float-right">
                    </form>
                </div>
            </div>
            <div class="card mt-4 mb-4 mb-md-0">
                <div class="card-header">
                    <h3 class="px-2"><i class="fas fa-users mr-2"></i> Tabel Data Anggota</h3>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush text-center">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>ID Anggota</th>
                                <th>Username</th>
                                <th>Nama Anggota</th>
                                <th>Kelas</th>
                                <th>No. HP</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                              <?php include "./func/readAnggota.php"; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!--   Core   -->
  <script src="../assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="../assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Argon JS   -->
  <script src="../assets/js/argon-dashboard.min.js?v=1.1.2"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
      const edit = (id_anggota,username,nama_anggota,kelas,no_hp) => {
          $('#id_anggota').val(id_anggota);
          $('#username').val(username);
          $('#nama_anggota').val(nama_anggota);
          $('#kelas').val(kelas);
          $('#no_hp').val(no_hp);
      }
  </script>
</body>

</html>