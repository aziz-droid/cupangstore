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
        
            <li><a ><b></b></a></li>

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
    <?php
        include('../koneksi.php');
		$tampilPeg    = mysqli_query($koneksi, "SELECT * FROM user WHERE nama='$_SESSION[nama]'");
		$peg    = mysqli_fetch_array($tampilPeg);
		?>
    <div class="nameuser" > <b>SELAMAT DATANG <?= $peg['nama'] ?></b></div>
    <div class="userp" > Dapatkan Ikan Cupang Berkualitas. Selamat Berbelanja</div>

        <div class="container-fluid px-md-4" >
    <div class="row">
			<div class="col-md-12">
				<div class="row">
                    <div class="col-md-12 mt-lg-4 mt-4">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <center><h1 class="h3 mb-0 text-gray-800">Produk Terbaru</h1></center>
                		</div>
                    </div>
	<?php
      include('../koneksi.php');
      $query = "SELECT * FROM produk ORDER BY id ASC";
      $result = mysqli_query($koneksi, $query);
 
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }


      $no = 1; 

      while($row = mysqli_fetch_assoc($result))
      {
      ?>
					<div class="col-md-3">
						<div class="card" style="width: 18rem;">
                            <img src="../Dashboard/images/<?php echo $row['foto']; ?>" class="card-img-top" alt="..." >
                            <div class="card-body">
                                 <h5 class="card-title"><?php echo $row['namaikan']; ?></h5>
                                <p class="card-text">Harga Ikan : <?php echo $row['harga']; ?> </p>
                            </div>
                            <div class="card-footer text-muted">
                            <center><a href="view.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">   Beli   </a></center>
                             </div>
                        </div>
					</div>
                    <?php
             $no++;
             }
        ?>
				</div>
            </div>
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
        Cupang Store adalah toko online ikan cupang hias terpercaya dan berpengalaman sejak tahun 2021. Kami berlokasi di Kota Sidoarjo dan melayani pembelian secara satuan, grosir, maupun partaian.
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
        <h5 class="text-uppercase mb-0">Alamat Store</h5>
        <p>
        Ds.Waru Kec.Waru Kab.Sidoarjo, Jawatimur Indonesia
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
    </div>
   </body>
   <script src="js/nav.js"></script>
</html>