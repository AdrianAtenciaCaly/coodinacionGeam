<?php include_once('includes/load.php');
if ($session->isUserLoggedIn(true)) {
  redirect('./pages/add', false);
}

if (isset($_POST['user']) && isset($_POST['password'])) {
  $req_fields = array('user', 'password');
  validate_fields($req_fields);
  $username = removeJunk($_POST['user']);
  $password = removeJunk($_POST['password']);

  if (empty($errors)) {
    $user_id = authenticate($username, $password);
    if ($user_id) {
      $session->login($user_id);
      updateLastLogIn($user_id);
      $user = current_user();
      $session->msg("s", "Bienvenido  de nuevo " . $user['name'] . " de nuevo!");
      header("Location: ./pages/add");
    } else {
      $session->msg("d", "Nombre de usuario y/o contraseña incorrecto.");
      header("Location: index");
    }
  } else {
    $session->msg("d", $errors);
    header("Location: index");
  }
} else {
  //$session->msg("d", "Ha ocurrido un error, intentelo de nuevo.");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Iniciar sesión | GEAM </title>
  <link rel="icon" href="assets/dist/img/favicon.ico">
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <?php echo displayMSG($msg); ?>
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <img src="assets/dist/img/logos/300 -63.png">
      </div>
      <div class="card-body">
        <p class="login-box-msg">Iniciar sesión</p>

        <form action="index.php" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" id="user" name="user" placeholder="Usuario">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Ver Contraseña
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <?php
        echo '<script type="text/javascript"> toastr.success("a.")</script>';
        ?>
      </div>
    </div>
  </div>


  <!-- jQuery -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/dist/js/adminlte.min.js"></script>
  <!-- jQuery -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="assets/plugins/toastr/toastr.min.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/dist/js/adminlte.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#remember').click(function() {
        if ($('#remember').is(':checked')) {
          $('#password').attr('type', 'text');
        } else {
          $('#password').attr('type', 'password');
        }
      });
    });
  </script>

</body>

</html>