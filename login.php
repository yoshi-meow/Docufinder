<?php
if(isset($_POST['button_login'])) {
  global $link;

  $checking = mysqli_query($link,"SELECT * FROM accounts_tbl WHERE email = '$email' AND status = 1 AND user_type = 1");
  if(mysqli_num_rows($checking) > 0) {
    $row = mysqli_fetch_object($checking);
    $hash = $row->password;
    if(password_verify($password,$hash)) {
      $message = base64_encode(urlencode('Successfully Login'));
      $_SESSION['id']     = $row->id;
      header('location: home.php?success=true&message='.$message);
    } else {
      $message = base64_encode(urlencode('This website is not functional; it is for show purposes only.'));
      header('location: login.php?success=false&message='.$message);
    }
  } else {
    $message = base64_encode(urlencode('This website is not functional; it is for show purposes only.'));
    header('location: login.php?success=false&message='.$message);
  }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Barangay 168 Deparo | Login</title>
    <link rel="icon" href="assets/images/brgy.png" type="image/x-icon">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <style type="text/css">
    .gradient-custom-2 {
    /* fallback for old browsers */
    background: #fccb90;

    /* Chrome 10-25, Safari 5.1-6 */
    background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background: linear-gradient(to right, #ee7724, #d8363a);
    }

    @media (min-width: 768px) {
      .gradient-form {
        height: 100vh !important;
      }
    }
    @media (min-width: 769px) {
      .gradient-custom-2 {
        border-top-right-radius: .3rem;
        border-bottom-right-radius: .3rem;
      }
    }
    </style>

</head>
<body>
  <div class="alert alert-danger alert-server" role="alert" style="margin-bottom: 0px; text-align: center;">
      <strong>Attention!</strong> This website is not functional; it is for show purposes only.
  </div> 

  <section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <a type="button" href="index.php" class="btn btn-light btn-lg"><i class="fa fa-angle-left"></i></a>
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">
              <?php if(isset($_GET['message'])) { ?>
                  <div class="alert alert-danger"><?=urldecode(base64_decode($_GET['message']))?></div>
                <?php } ?>
                <div class="text-center">
                  <img src="assets/images/brgy.png" style="width: 185px;" alt="logo">
                </div>

                <form method="POST">
                  <h5 style="text-align: center;">Login to your account</h5>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example11">Email Address</label>
                    <input type="email" id="form2Example11" name="email" class="form-control" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example22">Password</label>
                    <input type="password" id="form2Example22" name="password" class="form-control" />
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-danger btn-block fa-lg gradient-custom-2 mb-3" style="height: 50px; border: none;">Log in</button> <!-- removing type="submit"  name="button_login"  -->
                    <a class="text-muted" href="forgot_password.php">Forgot password?</a>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2" style="padding-right: 10px;">Don't have an account? </p>
                    <a href="sign_up.php" style="text-decoration: none;" class="btn btn-outline-danger">Create new</a>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <img src="assets/images/login.png" style="width: 100%; height: 100%;" alt="login">
                <h4 class="mb-4" style="padding-top: 10px;">Our Service</h4>
                <p class="small mb-0">Ang layunin nito ay mag silbing pahina na makukuhanan ng balita't Impormasyon, at mga pangyayaring nagaganap sa ating Barangay.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>