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
include('../koneksi.php');

$data1 = mysqli_query($koneksi, "SELECT nama FROM user");
$jumlah_data1 = mysqli_num_rows($data1);


$data2 = mysqli_query($koneksi, "SELECT namaikan FROM produk");
$jumlah_data2 = mysqli_num_rows($data2);

$data3 = mysqli_query($koneksi, "SELECT namaikan FROM produk");
$jumlah_data3 = mysqli_num_rows($data3);


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
      .rwt{
        padding-top: 30px;
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
            <a class="nav-link active" aria-current="page" href="index.php">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="data-produk.php">
              <span data-feather="file"></span>
              Data Produk
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="data-kategori.php">
              <span data-feather="layers"></span>
              Kategori Produk
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="data-user.php">
              <span data-feather="users"></span>
              Data User
            </a>
          </li>
        </ul>

      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>

      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Produk</h5>
              <p class="card-text">Jumlah data produk adalah : <?php echo $jumlah_data2; ?> </p>
              <a href="data-produk.php" class="btn btn-primary">Lihat Selengkapnya</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Kategori</h5>
              <p class="card-text">Jumlah data produk adalah : <?php echo $jumlah_data3; ?></p>
              <a href="data-kategori.php" class="btn btn-primary">Lihat Selengkapnya</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data User & Admin</h5>
              <p class="card-text">Jumlah data produk adalah : <?php echo $jumlah_data1; ?></p>
              <a href="data-user.php" class="btn btn-primary">Lihat Selengkapnya</a>
            </div>
          </div>
        </div><br><br>
        <h2 class="rwt" >Riwayat Terbaru Produk</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Ikan</th>
              <th>Kode</th>
              <th>Stock</th>
              <th>Harga</th>
              <th>Berat</th>
              <th>Kondisi</th>
              <th>Kategori</th>
            </tr>
          </thead>
          <tbody>
          <?php
                            include('../koneksi.php');

                            $batas = 5;
                            $halaman = isset($_GET['hal']) ? (int)$_GET['hal'] : 1;
                            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                            $previous = $halaman - 1;
                            $next = $halaman + 1;

                            $data = mysqli_query($koneksi, "select * from produk");
                            $jumlah_data = mysqli_num_rows($data);
                            $total_halaman = ceil($jumlah_data / $batas);

    
                            $query = "SELECT * FROM produk ORDER BY id ASC limit $halaman_awal, $batas";
                            $result = mysqli_query($koneksi, $query);

     
                            if (!$result) {
                                die("Query Error: " . mysqli_errno($koneksi) .
                                    " - " . mysqli_error($koneksi));
                            }

                            $no = 1; 
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $row['namaikan']; ?></td>
              <td><?php echo $row['kode']; ?></td>
              <td><?php echo $row['stock']; ?></td>
              <td><?php echo $row['harga']; ?></td>
              <td><?php echo $row['berat']; ?></td>
              <td><?php echo $row['kondisi']; ?></td>
              <td><?php echo $row['kategori']; ?></td>
            </tr>
            <?php
                $no++; 
                }
            ?>
          </tbody>
        </table>
      </div>
      </div>


    </main>
  </div>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
