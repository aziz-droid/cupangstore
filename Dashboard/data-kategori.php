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
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>Dashboard Ikan Cupang</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    

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
            <a class="nav-link " aria-current="page" href="index.php">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="data-produk.php">
              <span data-feather="file"></span>
              Data Produk
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active " href="data-kategori.php">
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
        <h1 class="h2">Data Kategori </h1>
      </div>
      <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" style="width:100%">
        <thead>
            <tr>
                <th class="th-sm">
                    No.
                </th>
                <th class="th-sm">
                    Kategori Produk
                </th>
                <th class="th-sm">
                    Aksi
                </th>
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
                <td><?php echo $row['kategori']; ?></td>
                <td>
                    <a class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data" name="tombol_hapus" href="proses/hapuskategori.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')"><i class="far fa-trash-alt"></i></a>
                </td>
            </tr>
            <?php
                $no++; 
                }
            ?>
        </tbody>
    </table>
    <nav aria-label="...">
        <ul class="pagination justify-content-end p-3">
        <li class="page-item">
            <a class="page-link" <?php if ($halaman > 1) {
                    echo "href='?hal=$previous'";
                } ?>><i class="fas fa-arrow-left"></i></a>
        </li>
        <?php
        for ($x = 1; $x <= $total_halaman; $x++) {
        ?>
        <li class="page-item"><a class="page-link" href="?hal=<?php echo $x ?>"><?php echo $x; ?></a></li>
        <?php
            }
        ?>
        <li class="page-item">
        <a class="page-link" <?php if ($halaman < $total_halaman) {
            echo "href='?hal=$next'";
            } ?>><i class="fas fa-arrow-right"></i></a>
                </li>
            </ul>
        </nav>



    </main>
  </div>
</div>




    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
