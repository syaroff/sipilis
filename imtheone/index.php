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
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
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
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-6 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">ANGGOTA</h5>
                      <?php $data = mysqli_query($konek,"SELECT COUNT(*) AS total FROM anggota");$row=mysqli_fetch_assoc($data); ?>
                      <span class="h2 font-weight-bold mb-0"><?=$row['total']?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-nowrap">TOTAL ANGGOTA</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">PASLON</h5>
                      <?php $data = mysqli_query($konek,"SELECT * FROM paslon");$row=mysqli_num_rows($data) ?>
                      <span class="h2 font-weight-bold mb-0"><?=$row?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="fas fa-percent"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-nowrap">TOTAL PASANGAN CALON</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">
      <div class="row mt-5">
        <div class="col-xl-8">
            <div class="card">
                <h2 class="px-4 pt-2">Tabel Data Anggota</h2>
                <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered">
                          <thead class="thead-light">
                              <tr>
                                <th>No</th>
                                <th>ID Anggota</th>
                                <th>Nama </th>
                                <th>Kelas</th>
                                <th>No.Hp</th>
                              </tr>
                          </thead>
                          <tbody>
                          <?php 

                              if(!isset($_GET['q'])) {
                                  $data = mysqli_query($konek,"SELECT * FROM anggota LIMIT 10");
                                  $no = 1;
                                  foreach($data as $row) {
                              ?>
                                      <tr>
                                          <td><?=$no++;?></td>
                                          <td><?=$row['id_anggota']?></td>
                                          <td><?=$row['nama_anggota'];?></td>
                                          <td><?=$row['kelas'];?></td>
                                          <td><?=$row['no_hp'];?></td>
                                      </tr>
                              <?php
                                  }
                              } 
                              ?>
                          </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
          <div class="card">
          <h2 class="px-4 pt-2">Tabel Data Paslon</h2>
                <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered">
                          <thead class="thead-light">
                              <tr>
                                <th>No</th>
                                <th>ID Paslon</th>
                                <th>Nama Paslon</th>
                              </tr>
                          </thead>
                          <tbody>
                          <?php 

                              if(!isset($_GET['q'])) {
                                  $data = mysqli_query($konek,"SELECT * FROM paslon LIMIT 10");
                                  $no = 1;
                                  foreach($data as $row) {
                              ?>
                                      <tr>
                                          <td><?=$no++;?></td>
                                          <td><?=$row['id_paslon'];?></td>
                                          <td><?=$row['nama_paslon'];?></td>
                                      </tr>
                              <?php
                                  }
                              } 
                              ?>
                          </tbody>
                      </table>
                    </div>
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
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
</body>

</html>