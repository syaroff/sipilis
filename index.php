<?php 

    require_once "config/konek.php";
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
        <div class="row mt-5">
            <div class="col-12 mx-auto text-center">
                <h2 class="fw-bold" style="letter-spacing: .3em;">SIPILIS</h2>
                <h3 style="letter-spacing: .1em;">SISTEM PEMILIHAN KETUA OSIS</h3>
            </div>
        </div>
        <div class="row mt-4">
            <?php 
                $data = $konek->query("SELECT * FROM paslon");
                foreach ($data as $row) {
            ?>
                    <div class="col-12 col-sm-8 col-lg-3 mx-auto my-3">
                        <div class="card">
                            <img src="./assets/img/<?=$row['foto']?>" alt="" class="card-img-top img-fluid w-100">
                            <div class="card-body">
                                <h4 class="text-center card-title"><?=$row['nama_paslon']?></h4>
                                <p class="my-3" style="text-align: justify;">
                                    <span class="fw-bold">
                                    Visi: <br>
                                    </span>
                                    <?=$row['visi']?>
                                </p>
                            </div>
                            <div class="card-footer text-center">
                                <button onclick="detail('<?=$row['id_paslon']?>','<?=$row['nama_paslon']?>','<?=$row['visi']?>','<?=$row['misi']?>','<?=$row['foto']?>')" class="btn btn-danger my-1">Detail</button>
                                <a href="./pilih.php?p=<?=$row['id_paslon']?>" class="btn btn-primary my-1">Pilih Paslon</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            ?>
            
           
        </div>
    </div>
    <div class="modal fade" id="modal-detail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable"">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"><span id="no-paslon"></span> | <span class="nama-paslon"></span></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <img src="" id="img-paslon" class="img-fluid text-center w-100">
              <h4 class="text-center my-4 nama-paslon">Alexander Pierce</h4>
              <p class="my-4">
                  <b>Visi :</b> <br>
                  <span id="visi"></span>
              </p>
              <p class="my-4">
                  <b>Misi :</b> <br>
                  <span id="misi"></span>
              </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <a href="./pilih.php?p=<?=$row['id_paslon']?>" class="btn btn-primary">Pilih Paslon</a>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    <script src="asssets/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script>
      const detail = (id_paslon,nama_paslon,visi,misi,foto) => {
        let url = "./assets/img/"+ foto;
        $('#modal-detail').modal('show');
        $('#no-paslon').text(id_paslon);
        $('.nama-paslon').text(nama_paslon);
        $('#visi').text(visi);
        $('#misi').text(misi);
        $('#img-paslon').attr('src',url);
      }
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
              if(!@$_SESSION['level']) {}
              else if(@$_SESSION['level'] > 0) {
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
              © 2022 <a href="http://syaroff.github.io" class="fw-bold ml-1 text-decoration-none" target="_blank">Syaroful AR</a>
            </div>
          </div>
        </div>
      </div>
</footer>
</html>