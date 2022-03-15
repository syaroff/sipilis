<?php 

    session_start();
    if(@$_SESSION['level'] == 1) {
        header("Location: ./index.php");
    }
    else if(@$_SESSION['level'] == 2)  {
        header("Location: ./imtheone/");  
    }
    $url_login = "./cek_login.php";
    if(@$_GET['p']) {
      $url_login = "./cek_login.php?p=$_GET[p]";
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
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title>S I P I L I S - Sistem Pemilihan Ketua OSIS</title>
</head>
<body>
    <div class="container container-fluid">
        <div class="row align-items-center" style="min-height: 90vh;">
            <div class="col-11 col-lg-4 mx-auto">
                <div class="card">
                  <div class="card-body p-5">
                    <h4 class="card-title text-center fw-bold my-2">SIGN IN</h4>
                    <p class="text-center mb-3">Sistem Pemilihan Ketua OSIS</p>
                    <form action="<?=$url_login?>" method="post">
                        <div class="d-flex justify-content-center">
                            <div class="d-flex mx-2">
                              <input type="radio" name="level" id="level1" class="form-check-input" value="1" checked>
                              <label for="level1" style="margin-left: 5px;">Pemilih</label>
                            </div>
                            <div class="d-flex mx-2">
                              <input type="radio" name="level" id="level0" class="form-check-input" value="0">
                              <label for="level0" style="margin-left: 6px;">Pengurus</label>
                            </div>
                        </div>
                        <div class="input-group mb-3 mt-4">
                          <span class="input-group-text" id="basic-addon1"><div class="las la-user"></div></span>
                          <input type="text" class="form-control" name="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon1"><div class="las la-lock"></div></span>
                          <input type="password" class="form-control" name="sandi" placeholder="Kata Sandi" aria-describedby="basic-addon1">
                        </div>
                        <div class="col-12 mb-3">
                          <input type="submit" name="signin" value="SIGN IN" class="btn btn-primary w-100">
                        </div>
                    </form>
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
          <div class="col-12">
            <div class=" text-center text-md-start text-muted">
              © 2022 <a href="http://syaroff.github.io" class="fw-bold ml-1 text-decoration-none" target="_blank">Syaroful AR</a>
            </div>
          </div>
        </div>
      </div>
</footer>
</html>