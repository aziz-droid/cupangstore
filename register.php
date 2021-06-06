<?php
include('koneksi.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Register</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
	<style>
		body {
			color: #fff;
			background: #a12525;
		}

		.logo {
			margin-bottom: 50px;
		}

		.title-menu {
			text-align: left;
			color: #a12525;
			padding-bottom: 8px;
		}

		.text-center {
			color: #a12525;
		}

		.form-control {
			min-height: 41px;
			background: #f2f2f2;
			box-shadow: none !important;
			border: transparent;
		}

		.form-control:focus {
			background: #e2e2e2;
		}

		.form-control,
		.btn {
			border-radius: 2px;
		}

		.login-form {
			width: 450px;
			margin: 30px auto;
			text-align: center;
		}

		.login-form h2 {
			margin: 10px 0 25px;
		}

		.login-form form {
			color: #7a7a7a;
			border-radius: 3px;
			margin-bottom: 15px;
			background: #fff;
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			padding: 30px;
		}

		.login-form .btn {
			font-size: 16px;
			font-weight: bold;
			background: #a12525;
			border: none;
			outline: none !important;
		}

		.login-form .btn:hover,
		.login-form .btn:focus {
			background: #a12525;
		}

		.login-form a {
			color: #fff;
			text-decoration: underline;
		}

		.login-form a:hover {
			text-decoration: none;
		}

		.login-form form a {
			color: #7a7a7a;
			text-decoration: none;
		}

		.login-form form a:hover {
			text-decoration: underline;
		}
	</style>
</head>

<body>
	<div class="login-form">
		<form action="" method="post">
			<h2 class="text-center">Register</h2>
			<div class="form-group">
				<div class="title-menu"><i class="fas fa-user"></i> Nama Lengkap</div>
				<input type="text" class="form-control" name="nama" placeholder="masukkan nama lengkap" required="required">
			</div>
			<div class="form-group has-error">
				<div class="title-menu"><i class="fas fa-user"></i> Username</div>
				<input type="text" class="form-control" name="username" placeholder="masukkan username" required="required">
			</div>
			<div class="form-group ">
				<div class="title-menu"><i class="fa fa-envelope" aria-hidden="true"></i> Email</div>
				<input type="email" class="form-control" name="email" placeholder="masukkan email" required="required">
			</div>
			<div class="form-group">
				<div class="title-menu"><i class="fa fa-key" aria-hidden="true"></i> Password</div>
				<input type="password" class="form-control" name="password" placeholder="masukkan password" required="required">
			</div>
            <div class="form-group">
				<div class="title-menu"><i class="fa fa-phone" aria-hidden="true"></i> No. Telphone</div>
				<input type="text" class="form-control" name="telp" placeholder="masukkan telphone" required="required">
			</div>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" name="hakakses" value="pelanggan" required="required"> Saya menyetujui Syarat dan Ketentuan serta Kebijakan Privasi yang ada pada website ini.
                </label>
            </div>
			<div class="form-group">
				<button type="submit" name="proses" class="btn btn-primary btn-lg btn-block">Sign Up</button>
			</div>
			<p class="text-bottom">Sudah punya akun. <a href="login.php">Login Sekarang!</a></p>
		</form>

	</div>
</body>

</html>

<?php

                include('koneksi.php');
                
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
                            alert('Berhasil Registrasi. Silahkan login');
                            document.location.href = 'login.php'
                         </script>";
                }

                }

            ?>