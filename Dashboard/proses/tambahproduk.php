<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../koneksi.php';

// membuat variabel untuk menampung data dari form
$namaikan   = $_POST['namaikan'];
$kode     = $_POST['kode'];
$stock    = $_POST['stock'];
$harga    = $_POST['harga'];
$berat     = $_POST['berat'];
$kondisi    = $_POST['kondisi'];
$kategori    = $_POST['kategori'];
$foto = $_FILES['foto']['name'];


//cek dulu jika ada gambar produk jalankan coding ini
if ($foto != "") {
  $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg',); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $foto); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['foto']['tmp_name'];
  $angka_acak     = rand(1, 999);
  $nama_gambar_baru = $angka_acak . '-' . $foto; //menggabungkan angka acak dengan nama file sebenarnya
  if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    move_uploaded_file($file_tmp, '../images/' . $nama_gambar_baru); //memindah file gambar ke folder gambar
    // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
    $query = "INSERT INTO produk (namaikan, kode, stock, harga, berat, kondisi, kategori, foto) VALUES ('$namaikan', '$kode', '$stock', '$harga', '$berat', '$kondisi', '$kategori', '$nama_gambar_baru')";
    $result = mysqli_query($koneksi, $query);
    // periska query apakah ada error
    if (!$result) {
      die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
        " - " . mysqli_error($koneksi));
    } else {
      //tampil alert dan akan redirect ke halaman index.php
      //silahkan ganti index.php sesuai halaman yang akan dituju
      echo "<script>alert('Prosuk berhasil ditambah.');window.location='../data-produk.php';</script>";
    }
  } else {
    //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
    echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambahproduk.php';</script>";
  }
} else {
  $query = "INSERT INTO produk (namaikan, kode, stock, harga, berat, kondisi, kategori, foto) VALUES ('$namaikan', '$kode', '$stock', '$harga', '$berat', '$kondisi', '$kategori', null)";
  $result = mysqli_query($koneksi, $query);
  // periska query apakah ada error
  if (!$result) {
    die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
      " - " . mysqli_error($koneksi));
  } else {
    //tampil alert dan akan redirect ke halaman index.php
    //silahkan ganti index.php sesuai halaman yang akan dituju
    echo "<script>alert('Produk berhasil ditambah.');window.location='../dataproduk.php';</script>";
  }
}
