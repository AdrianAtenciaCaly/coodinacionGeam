<?php include_once('includes/load.php');
if (!$session->isUserLoggedIn(true)) {
  redirect('index.php', false);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrar asistencia  | GEAM</title>
  <link rel="icon" href="assets/dist/img/favicon.ico">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">

  <div class="wrapper">


    <?php include('layout/nav.php'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Asistencia</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
  

      <section class="content">
      
   
        <div class="row">
        
          <div class="col-md-12">
          
            <div class="card card-primary">
            <?php echo displayMSG($msg); ?>
              <div class="card-header">
                <h3 class="card-title">Registrar asistencia</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Colapso">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <form action="prueba.php" method="POST">
                  <div class="form-group">
                    <label for="inputName">Fecha</label>
                    <input type="date" id="inputName" name="inputName" class="form-control">
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="inputStatus">Profesor</label>
                        <select id="inputStatus" class="form-control custom-select">
                          <option selected disabled>Seleccione el nombre del profesor.</option>
                          <option>Profesor</option>
                          <option>Profesor</option>
                          <option>Profesor</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="inputStatus">Asignatura</label>
                        <select id="inputStatus" class="form-control custom-select">
                          <option selected disabled>Seleccione el nombre de asignatura. </option>
                          <option>Asignatura</option>
                          <option>Asignatura</option>
                          <option>Asignatura</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="inputProjectLeader">Clase </label>
                        <input type="number" id="inputProjectLeader" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="inputProjectLeader">Material socializado</label>
                        <input type="text" id="inputProjectLeader" class="form-control">
                      </div>
                    </div>

                    
                  </div>
                  <div class="form-group">
                    <label for="inputClientCompany">Eje temático</label>
                    <input class="form-control form-control-lg" type="text" placeholder="">
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="inputProjectLeader"> Institución </label>
                        <input type="text" id="inputProjectLeader" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="inputProjectLeader">Grupo </label>
                        <input type="number" id="inputProjectLeader" class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputClientCompany">Eje temático</label>
                    <input class="form-control form-control-lg" type="text" placeholder="Eje temático.">
                  </div>


                  <div class="form-group">
                    <label for="inputProjectLeader">Observaciones</label>
                    <textarea class="form-control" rows="3" placeholder="Observaciones..."></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Adjuntar lista de asistencia (.txt / .docx / .jpg) </label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="evidenceFile" name="evidenceFile" onchange="return fileValidation(this.files[0].name)">
                        <label class="custom-file-label" id="evidenceFileLabel" name="evidenceFileLabel" for="exampleInputFile">Choose file</label>
                      </div>

                    </div>
                  </div>
                  <br>
                  <div class="form-group">
                    <input type="submit" value="Guardar" class="btn btn-success float-right">
                  </div>


                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

        </div>

      </section>


    </div>
    <!-- /.content-wrapper -->


    <?php include('layout/footer.php'); ?>
</body>

<script>
  function fileValidation(nombre) {
    var fileInput = document.getElementById('evidenceFile');
    var filePath = fileInput.value;
    var allowedExtensions = /(.jpg|.jpeg|.png|.gif)$/i;
    if (!allowedExtensions.exec(filePath)) {
      alert('Solo se permiten archivos con extensión .jpg .docx');
      fileInput.value = '';
      return false;
    } else {
      document.getElementById('evidenceFileLabel').innerHTML = nombre;
    }
  }
</script>

</html>