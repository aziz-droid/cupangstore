<?php
ob_start();
session_start();
if (!isset($_SESSION['username'])) {
	header("Location: ../login.php");
}
if ($_SESSION['hakakses'] != "pelanggan") {
	die("<b>Oops!</b> Access Failed.
		<button type='button' onclick=location.href='./'>Back</button>");
}

?>
<?php
include('../koneksi.php');
if (isset($_GET['id'])) {

    $id = ($_GET["id"]);

    $query = "SELECT * FROM produk WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query Error: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
            }

        $data = mysqli_fetch_assoc($result);

        if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='view.php';</script>";
              }
            } else {
                 echo "<script>alert('Masukkan data id.');window.location='view.php';</script>";
                }
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Cupang Store</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  
      <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
      <link rel="stylesheet" href="../css/styles2.css" />
      <link rel="stylesheet" href="css/customers.css" />
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      
   </head>
   <body>
   <nav>
        <div class="logo">
            <img src="../img/cs.png" width="30px"></img>
            <h3> Cupang Store</h3>
        </div>

        <ul>
            <li><a href="#"><b></b></a></li>
            <li><a href="../logout.php" class="button1" style="vertical-align:middle"><i style="font-size:15px" class="fa fa-sogn-in-alt">&#xf090;</i><span> Logout </span></a></li>
        </ul>
        <div class="menu-toggle">
            <input type="checkbox"></input>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
    
    <div class="content"  >
    <div class="row">
    <div class="col-lg-1"></div>
        <div class="col-lg-3">
            <div class="nameikan">
            <img src="../Dashboard/images/<?php echo $data['foto']; ?>" class="img-thumbnail"></td>
            </div>
        </div>
        <div class="col-lg-6">
        <div class="nameikan" style="font-size: 35px;" ><b><?php echo $data['namaikan']; ?></b></div>
        <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="kdst">
                        <div ><b>Kode : <?php echo $data['kode']; ?></b> </div>
                    </div>
                    <div class="hargaikan">
                        <div  style="font-size: 30px;" ><b>Rp. : <?php echo $data['harga']; ?></b> </div>
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="kdst2">
                        <div ><b>Stock :</b> <?php echo $data['stock']; ?>  </div>
                    </div>
                    <div class="kdst31">
                    <div ><b>Berat :</b> <?php echo $data['berat']; ?>  </div>
                    </div>
                    <div class="kdst3">
                        <div ><b>Kondisi :</b> <?php echo $data['kondisi']; ?>  </div>
                    </div>
                    <div class="kdst32">
                        <div ><b>Kategori :</b> <?php echo $data['kategori']; ?>  </div>
                    </div>
                </div>
                <a type="button" href="https://wa.me/6281217855368?text=Saya%20ingin%20memesan%20cupang" class="btn btn-success btn-lg btn-block">Pesan Sekarang Via Whatsapp</a>
                <a type="button" href="user.php" class="btn btn-danger btn-lg btn-block">Kembali</a>
            </div>
            
        <div class="col-lg-2"></div>
            <br><br>
        </div>
        
    </div>
    <hr class="fotterr" ></hr>
    <footer class="bg-danger text-white text-center text-lg-start">
  <!-- Grid container -->
  <div class="container p-4">
    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase">Cupang Store</h5>

        <p>
        Cupang Store adalah toko online ikan cupang hias terpercaya dan berpengalaman sejak tahun 2021. Kami berlokasi di Kota Surabaya dan melayani pembelian secara satuan, grosir, maupun partaian.
        </p>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase">Info Pemesanan</h5>
        <p>
        Untuk saat ini kami hanya menggunakan metode direct WhatsApp dengan pertimbangan kemudahan.
        </p>
        
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase mb-0">Alamat Sotre</h5>
        <p>
        Surabay , Jawatimur , Indonesia
        </p>
    
      </div>
      <!--Grid column-->
    </div>
    <!--Grid row-->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2021 Copyright:
    <a class="text-white" href="index.php">Cupang Store</a>
  </div>
  <!-- Copyright -->
</footer>
   </body>
   <script src="js/nav.js"></script>
</html>