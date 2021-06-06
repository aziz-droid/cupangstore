<?php
include '../../koneksi.php';
// menyimpan data kedalam variabel
$id = $_POST['id'];
$nama = $_POST["nama"];
$username = $_POST["username"];
$password = md5($_POST['password']);
$email = $_POST["email"];
$telp = $_POST["telp"];
$hakakses = $_POST["hakakses"];
// query SQL untuk insert data
$query="UPDATE user SET nama='$nama',username='$username',password='$password',email='$email',telp='$telp',hakakses='$hakakses' where id='$id'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
echo "<script>alert('Data berhasil diubah.');window.location='../data-user.php';</script>";
?>