<?php

include '../../koneksi.php';


$id = $_POST['id'];
$namaikan   = $_POST['namaikan'];
$kode     = $_POST['kode'];
$stock    = $_POST['stock'];
$harga    = $_POST['harga'];
$berat     = $_POST['berat'];
$kondisi    = $_POST['kondisi'];
$kategori    = $_POST['kategori'];
$foto = $_FILES['foto']['name'];

if ($foto != "") {
  $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg',);
  $x = explode('.', $foto);
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['foto']['tmp_name'];
  $angka_acak     = rand(1, 999);
  $nama_gambar_baru = $angka_acak . '-' . $foto;
  if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    move_uploaded_file($file_tmp, '../images/' . $nama_gambar_baru);


    $query  = "UPDATE produk SET namaikan = '$namaikan', kode = '$kode', stock = '$stock', harga = '$harga', berat = '$berat', kondisi = '$kondisi',kategori = '$kategori', foto = '$nama_gambar_baru'";
    $query .= "WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
      die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
        " - " . mysqli_error($koneksi));
    } else {

      echo "<script>alert('Data berhasil diubah.');window.location='../data-produk.php';</script>";
    }
  } else {

    echo "<script>alert('Ekstensi gambar yang boleh hanya .jpg, .png, .jpeg');window.location='editproduk.php';</script>";
  }
} else {

  $query  = "UPDATE produk SET namaikan = '$namaikan', kode = '$kode', stock = '$stock', harga = '$harga', berat = '$berat', kondisi = '$kondisi', kategori = '$kategori'";
  $query .= "WHERE id = '$id'";
  $result = mysqli_query($koneksi, $query);

  if (!$result) {
    die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
      " - " . mysqli_error($koneksi));
  } else {

    echo "<script>alert('Produk berhasil diubah.');window.location='../data-produk.php';</script>";
  }
}
