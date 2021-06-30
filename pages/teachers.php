<?php include_once('../includes/load.php');
if (!$session->isUserLoggedIn(true)) {
  redirect('../index', false);
}
$teachers = findAllTeachers();
$subject = findAllsubject();
$subjectE= findAllsubject();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Docentes | GEAM</title>
  <link rel="icon" href="../assets/dist/img/favicon.ico">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../assets/plugins/summernote/summernote-bs4.min.css">

  <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../assets/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>


<body class="hold-transition sidebar-mini layout-fixed">

  <div class="wrapper">


    <?php include('../layout/nav.php'); ?>

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
                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                <li class="breadcrumb-item active">Docentes</li>
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
                <h3 class="card-title">Registrar Docente</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <form action="../includes/sentences/register_teacher.php" method="POST" id="form_teacher">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="nombres">Nombres</label>
                        <input type="text" id="nombredocente" name="nombredocente" oninput="actualizarnombreCompleto()" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" required>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" id="apellidodocente" name="apellidodocente" oninput="actualizarnombreCompleto()" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="completo">Nombre completo</label>
                        <input type="text" id="nombrecompleto" name="nombrecompleto" class="form-control" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="asiganature">Asiganatura impartida</label>
                      <select id="asignaturedocente" name="asignaturedocente" class="form-control select2" required>
                        <option value="" selected disabled hidden>Seleccione una opción </option>
                        <?php foreach ($subject as $subject) : ?>
                          <option value="<?php echo removeJunk($subject['id_subject']); ?>"><?php echo removeJunk($subject['name_subject']); ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="observaciones">Observaciones</label>
                    <textarea class="form-control" id="observacionesdocente" name="observacionesdocente" rows="3" placeholder="Observaciones..."></textarea>
                  </div>

                  <br>
                  <div class="form-group">
                    <input type="submit" value="Guardar" class="btn btn-success float-right">
                  </div>


                </form>
              </div>

              <!-- /.card-body -->
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Docentes</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nombres</th>
                      <th>Apellidos</th>
                      <th>Asignatura</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($teachers as $teachers) : ?>
                      <tr>
                        <td class="text-center"><?php echo countId(); ?></td>
                        <td class="text-center"> <?php echo removeJunk($teachers['names_teacher']); ?></td>
                        <td class="text-center"> <?php echo removeJunk($teachers['surnames_teacher']); ?></td>
                        <td class="text-center"> <?php echo removeJunk($teachers['name_subject']); ?></td>
                        <td class="text-center">
                          <button title="Editar" class="btn btn-info btn-sm btnEditar" data-id="<?php echo $teachers['id_teacher']; ?>" data-nombres="<?php echo $teachers['names_teacher']; ?>" data-apellidos="<?php echo $teachers['surnames_teacher']; ?>" data-asiganatura="<?php echo $teachers['name_subject']; ?>" data-observaciones="<?php echo $teachers['observations_teacher']; ?>" data-toggle="modal" data-target="#modalEditar">
                            <i class="far fa-edit"></i> </button>
                          <!-- <button title="Eliminar" class="btn btn-danger btn-sm btnEliminar" data-id="<?php echo $teachers['id_teacher']; ?>" data-nombres="<?php echo $teachers['names_teacher']; ?>" data-nombrecompleto="<?php echo $teachers['surnames_teacher']; ?>" data-asiganatura="<?php echo $teachers['name_subject']; ?>" data-toggle="modal" data-target="#modalEliminar">
                            <i class="far fa-trash-alt"></i> </button>-->
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                  <!-- <tfoot>
                    <tr>
                      <th>Rendering engine</th>
                      <th>Browser</th>
                      <th>Platform(s)</th>
                      <th>Engine version</th>
                    </tr>
                  </tfoot>-->
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

        </div>

      </section>


    </div>
    <!-- /.content-wrapper -->
    <div class="modal fade" id="modalEditar">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Editar</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card card-primary">
              <?php echo displayMSG($msg); ?>
              <div class="card-header">
                <h3 class="card-title">Editar Docente</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <form action="../includes/sentences/update_teacher.php" method="POST" id="form_teacher">
                  <input type="hidden" id="iddocenteeditar" name="iddocenteeditar" required>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="nombres">Nombres</label>
                        <input type="text" id="nombredocenteeditar" name="nombredocenteeditar" oninput="actualizarnombreCompletoEditar()" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" id="apellidodocenteeditar" name="apellidodocenteeditar" oninput="actualizarnombreCompletoEditar()" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="completo">Nombre completo</label>
                        <input type="text" id="nombrecompletoeditar" name="nombrecompletoeditar" class="form-control" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="asiganature">Asiganatura impartida</label>
                      <select id="asignaturedocenteeditar" name="asignaturedocenteeditar" class="form-control select2" required>
                        <option value="" selected disabled hidden>Seleccione una opción </option>
                        <?php foreach ($subjectE as $subjectE) : ?>
                          <option value="<?php echo removeJunk($subjectE['id_subject']); ?>"><?php echo removeJunk($subjectE['name_subject']); ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="observaciones">Observaciones</label>
                    <textarea class="form-control" id="observacionesdocenteeditar" name="observacionesdocenteeditar" rows="3" placeholder="Observaciones..."></textarea>
                  </div>
                  <br>
                  <div class="form-group">
                    <input type="submit" value="Guardar" class="btn btn-success float-right">
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modalEliminar">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Eliminar </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">



          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>


    <?php include('../layout/footer.php'); ?>
</body>
<script>
  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2()
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
</script>
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
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
  function actualizarnombreCompleto() {
    let nombres = document.getElementById("nombredocente").value;
    let apellidos = document.getElementById("apellidodocente").value;
    //Se actualiza en municipio inm
    document.getElementById("nombrecompleto").value = nombres.toUpperCase() + " " + apellidos.toUpperCase();
  }

  function actualizarnombreCompletoEditar() {
    let nombres = document.getElementById("nombredocenteeditar").value;
    let apellidos = document.getElementById("apellidodocenteeditar").value;
    //Se actualiza en municipio inm
    document.getElementById("nombrecompletoeditar").value = nombres.toUpperCase() + " " + apellidos.toUpperCase();
  }
  $(document).ready(function() {
    var idEliminar = -1;
    var idEditar = -1;
    var fila;
    $(".btnEliminar").click(function() {
      idEliminar = $(this).data('id');
      fila = $(this).parent('td').parent('tr');

      var nombres = $(this).data('nombres');
      var apellidos = $(this).data('apellidos');
      var asignatura = $(this).data('asiganatura');
      var observaciones = $(this).data('observaciones');

    });

    $(".eliminar").click(function() {
      $.ajax({
        url: '../includes/sqlinsert/delete_product.php',
        method: 'POST',
        data: {
          id: idEliminar
        }
      }).done(function(res) {

        $(fila).fadeOut(1000);
      });

    });

    //Editar
    $(".btnEditar").click(function() {

      idEditar = $(this).data('id');
      var nombres = $(this).data('nombres');
      var apellidos = $(this).data('apellidos');
      var asignatura = $(this).data('asiganatura');
      var observaciones = $(this).data('observaciones');
      $("#iddocenteeditar").val(idEditar);
      $("#nombredocenteeditar").val(nombres);
      $("#apellidodocenteeditar").val(apellidos);
      $("#nombrecompletoeditar").val(nombres + " " + apellidos);
      $("#observacionesdocenteeditar").val(observaciones);

    });



  });
</script>

</html>