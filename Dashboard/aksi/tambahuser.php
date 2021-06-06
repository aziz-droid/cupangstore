<?php
ob_start();
session_start();
if (!isset($_SESSION['username'])) {
	header("Location: ../login.php");
}
if ($_SESSION['hakakses'] != "admin") {
	die("<b>Oops!</b> Access Failed.
		<button type='button' onclick=location.href='./'>Back</button>");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Dashboard Ikan Cupang</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    

<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    

    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Ikan Cupang</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="../logout.php">Sign out</a>
    </li>
  </ul>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../index.php">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../data-produk.php">
              <span data-feather="file"></span>
              Data Produk
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../data-kategori.php">
              <span data-feather="layers"></span>
              Kategori Produk
            </a>
          </li>
        </ul>

      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Produk</h1>

      </div>
      <div class="col-md-12">
                    <form action="" method="POST" enctype="multipart/form-data" >
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" placeholder="Masukkan nama lengkap"required="required" >
                        </div><br>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Masukkan username"required="required">
                        </div><br>
                        <div class="form-group">
                            <label for="exampleInputEmail1">password</label>
                            <input type="password" class="form-control" name="password" placeholder="Masukkan password"required="required">
                        </div><br>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Masukkan email"required="required">
                        </div><br>
                        <div class="form-group">
                            <label for="exampleInputEmail1">No. Telphone</label>
                            <input type="nomor" class="form-control" name="telp" placeholder="Masukkan nomor telephone"required="required">
                        </div><br>
                        <div class="form-group">
                            <label for="pwd">Hak Akses:</label>
                            <div class="input-group mb-3">
                            <select class="form-control" id="inputGroupSelect01" name="hakakses" >
                                <option selected>Choose...</option>
                                <option value="admin">admin</option>
                                <option value="pelanggan">pelanggan</option>
                            </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="proses" value="Simpan">Simpan</button>
                    </form>
                    <?php

                include('../../koneksi.php');
                
                if ( isset($_POST["proses"]) ) {
                    
                    $nama = $_POST["nama"];
                    $username = $_POST["username"];
                    $password = md5($_POST['password']);
                    $email = $_POST["email"];
                    $telp = $_POST["telp"];
                    $hakakases = $_POST["hakakses"];



                    $query = "INSERT INTO user
                                VALUES
                                ('','$nama','$username','$password','$email','$telp','$hakakases')
                            ";
                mysqli_query($koneksi, $query);


                if (mysqli_affected_rows($koneksi ) > 0 ) {
                    echo "<script>
                            alert('Berhasil ditambahlan');
                            document.location.href = '../data-user.php'
                         </script>";
                }

                }

            ?>

                </div>



    </main>
  </div>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>