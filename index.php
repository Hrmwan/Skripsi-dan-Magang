<?php
session_start();

if (isset($_SESSION['username'])) {
  header("Location: home.php");
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Daftar pengguna dan kata sandi yang valid
  $valid_users = array(
    'finance' => 'pahalakencana',
    'owner' => 'anggramas'
  );

  // Periksa apakah pengguna dan kata sandi valid
  if (isset($valid_users[$username]) && $valid_users[$username] == $password) {
    $_SESSION['username'] = $username;
    header("Location: home.php");
    exit();
  } else {
    $error_message = "Login gagal. Silakan coba lagi.";
  }
}

?>
<!doctype html>
<html lang="en">

<head>
  <title>PT. SAFARI DARMA SAKTI</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">

  <!-- Favicon -->
  <link rel="icon" type="image" href="my-picture/logo.png">

  <!-- Bootstrap 4.6.0 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/stylelogin.css">
</head>

<body>
  <div id="stars"></div>
  <div id="stars2"></div>
  <div id="stars3"></div>
  <div class="section">
    <div class="container">
      <div class="row full-height justify-content-center">
        <div class="col-12 text-center align-self-center py-5">
          <div class="section pb-5 pt-5 pt-sm-2 text-center">
            <h6 class="mb-0 pb-3"><span>Log In </span><span>Profile</span></h6>
            <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
            <label for="reg-log"></label>
            <div class="card-3d-wrap mx-auto">
              <div class="card-3d-wrapper">
                <div class="card-front">
                  <div class="center-wrap">
                    <?php if (isset($error_message)) : ?>
                      <p style="color: red;"><?php echo $error_message; ?></p>
                    <?php endif; ?>
                    <div class="section text-center">
                      <h4 class="mb-4 pb-3">Log In</h4>
                      <form method="post" action="">
                        <div class="form-group">
                          <input type="text" class="form-style" placeholder="Masukan Username" name="username">
                          <i class="input-icon uil uil-user"></i>
                        </div>
                        <div class="form-group mt-2">
                          <input type="password" class="form-style" placeholder="Password" name="password">
                          <i class="input-icon uil uil-lock-alt"></i>
                        </div>
                        <button type="submit" class="btn mt-4">Login</button>
                    </div>
                  </div>
                  </form>
                </div>
                <div class="card-back">
                  <div class="center-wrap">
                    <div class="section text-center">
                      <img src="my-picture/logo.png" class="img-fluid" alt="logo">
                      <h4 class="mb-3 mt-3 pb-3">PT. SAFARI DARMASAKTI</h4>
                      <!-- <div class="form-group">
                      <input type="text" class="form-style" placeholder="Full Name">
                      <i class="input-icon uil uil-user"></i>
                    </div>	
                    <div class="form-group mt-2">
                      <input type="tel" class="form-style" placeholder="Phone Number">
                      <i class="input-icon uil uil-phone"></i>
                    </div>	
                    <div class="form-group mt-2">
                      <input type="email" class="form-style" placeholder="Email">
                      <i class="input-icon uil uil-at"></i>
                    </div>
                    <div class="form-group mt-2">
                      <input type="password" class="form-style" placeholder="Password">
                      <i class="input-icon uil uil-lock-alt"></i>
                    </div> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>