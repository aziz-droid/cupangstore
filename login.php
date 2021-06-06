<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    


<link href="Dashboard/assets/dist/css/bootstrap.min.css" rel="stylesheet">

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

    

    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form action="proses/ceklogin.php" method="post" >
    <img class="mb-4" src="img/cs.png" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Login</h1>

    <div class="form-floating">
      <input type="text" class="form-control" name="username" placeholder="username">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="password" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-danger"  name="login" type="submit">Sign in</button><br><br>
    <p class="text-bottom">Belum punya akun. <a href="register.php">Daftar Sekarang!</a></p>
  </form>
</main>


    
  </body>
</html>
