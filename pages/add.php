<?php include_once('../includes/load.php');
if (!$session->isUserLoggedIn(true)) {
  redirect('../index.php', false);
}
$teachers = findAllTeachers();
$subject = findAllsubject();
$group = findAllgroup();
$asistance = findAllasistance();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrar asistencia | GEAM</title>
  <link rel="icon" href="../assets/dist/img/favicon.ico">
  <!-- Google Font: Source Sans Pro -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
            <?php echo displayMSG($msg); ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Registrar asistencia</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Colapso">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <form action="../includes/sentences/register_asistence.php" method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input type="date" id="fechaadd" name="fechaadd" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="horainicio">Hora de inicio</label>
                        <select id="horainicioadd" name="horainicioadd" class="form-control select2" style="width: 100%;" required>
                          <option value="" selected disabled hidden>Seleccione una opción </option>
                          <option value="07:00">07 : 00 a.m.</option>
                          <option value="07:15">07 : 15 a.m.</option>
                          <option value="07:30">07 : 30 a.m.</option>
                          <option value="07:45">07 : 45 a.m.</option>
                          <option value="08:00">08 : 00 a.m.</option>
                          <option value="08:15">08 : 15 a.m.</option>
                          <option value="08:30">08 : 30 a.m.</option>
                          <option value="08:45">08 : 45 a.m.</option>
                          <option value="09:00">09 : 00 a.m.</option>
                          <option value="09:15">09 : 15 a.m.</option>
                          <option value="09:30">09 : 30 a.m.</option>
                          <option value="09:45">09 : 45 a.m.</option>
                          <option value="10:00">10 : 00 a.m.</option>
                          <option value="10:15">10 : 15 a.m.</option>
                          <option value="10:30">10 : 30 a.m.</option>
                          <option value="10:45">10 : 45 a.m.</option>
                          <option value="11:00">11 : 00 a.m.</option>
                          <option value="11:15">11 : 15 a.m.</option>
                          <option value="11:30">11 : 30 a.m.</option>
                          <option value="11:45">11 : 45 a.m.</option>
                          <option value="12:00">12 : 00 p.m.</option>
                          <option value="12:15">12 : 15 p.m.</option>
                          <option value="12:30">12 : 30 p.m.</option>
                          <option value="12:45">12 : 45 p.m.</option>
                          <option value="13:00">01 : 00 p.m.</option>
                          <option value="13:15">01 : 15 p.m.</option>
                          <option value="13:30">01 : 30 p.m.</option>
                          <option value="13:45">01 : 45 p.m.</option>
                          <option value="14:00">02 : 00 p.m.</option>
                          <option value="14:15">02 : 15 p.m.</option>
                          <option value="14:30">02 : 30 p.m.</option>
                          <option value="14:45">02 : 45 p.m.</option>
                          <option value="15:00">03 : 00 p.m.</option>
                          <option value="15:15">03 : 15 p.m.</option>
                          <option value="15:30">03 : 30 p.m.</option>
                          <option value="15:45">03 : 45 p.m.</option>
                          <option value="16:00">04 : 00 p.m.</option>
                          <option value="16:15">04 : 15 p.m.</option>
                          <option value="16:30">04 : 30 p.m.</option>
                          <option value="16:45">04 : 45 p.m.</option>
                          <option value="17:00">05 : 00 p.m.</option>
                          <option value="17:15">05 : 15 p.m.</option>
                          <option value="17:30">05 : 30 p.m.</option>
                          <option value="17:45">05 : 45 p.m.</option>
                          <option value="18:00">06 : 00 p.m.</option>
                          <option value="18:15">06 : 15 p.m.</option>
                          <option value="18:30">06 : 30 p.m.</option>
                          <option value="18:45">06 : 45 p.m.</option>
                          <option value="19:00">07 : 00 p.m.</option>
                          <option value="19:15">07 : 15 p.m.</option>
                          <option value="19:30">07 : 30 p.m.</option>
                          <option value="19:45">07 : 45 p.m.</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="horafinal">Hora de final</label>
                        <select id="horafinaladd" name="horafinaladd" class="form-control select2" style="width: 100%;" required>
                          <option value="" selected disabled hidden>Seleccione una opción </option>
                          <option value="07:00">07 : 00 a.m.</option>
                          <option value="07:15">07 : 15 a.m.</option>
                          <option value="07:30">07 : 30 a.m.</option>
                          <option value="07:45">07 : 45 a.m.</option>
                          <option value="08:00">08 : 00 a.m.</option>
                          <option value="08:15">08 : 15 a.m.</option>
                          <option value="08:30">08 : 30 a.m.</option>
                          <option value="08:45">08 : 45 a.m.</option>
                          <option value="09:00">09 : 00 a.m.</option>
                          <option value="09:15">09 : 15 a.m.</option>
                          <option value="09:30">09 : 30 a.m.</option>
                          <option value="09:45">09 : 45 a.m.</option>
                          <option value="10:00">10 : 00 a.m.</option>
                          <option value="10:15">10 : 15 a.m.</option>
                          <option value="10:30">10 : 30 a.m.</option>
                          <option value="10:45">10 : 45 a.m.</option>
                          <option value="11:00">11 : 00 a.m.</option>
                          <option value="11:15">11 : 15 a.m.</option>
                          <option value="11:30">11 : 30 a.m.</option>
                          <option value="11:45">11 : 45 a.m.</option>
                          <option value="12:00">12 : 00 p.m.</option>
                          <option value="12:15">12 : 15 p.m.</option>
                          <option value="12:30">12 : 30 p.m.</option>
                          <option value="12:45">12 : 45 p.m.</option>
                          <option value="13:00">01 : 00 p.m.</option>
                          <option value="13:15">01 : 15 p.m.</option>
                          <option value="13:30">01 : 30 p.m.</option>
                          <option value="13:45">01 : 45 p.m.</option>
                          <option value="14:00">02 : 00 p.m.</option>
                          <option value="14:15">02 : 15 p.m.</option>
                          <option value="14:30">02 : 30 p.m.</option>
                          <option value="14:45">02 : 45 p.m.</option>
                          <option value="15:00">03 : 00 p.m.</option>
                          <option value="15:15">03 : 15 p.m.</option>
                          <option value="15:30">03 : 30 p.m.</option>
                          <option value="15:45">03 : 45 p.m.</option>
                          <option value="16:00">04 : 00 p.m.</option>
                          <option value="16:15">04 : 15 p.m.</option>
                          <option value="16:30">04 : 30 p.m.</option>
                          <option value="16:45">04 : 45 p.m.</option>
                          <option value="17:00">05 : 00 p.m.</option>
                          <option value="17:15">05 : 15 p.m.</option>
                          <option value="17:30">05 : 30 p.m.</option>
                          <option value="17:45">05 : 45 p.m.</option>
                          <option value="18:00">06 : 00 p.m.</option>
                          <option value="18:15">06 : 15 p.m.</option>
                          <option value="18:30">06 : 30 p.m.</option>
                          <option value="18:45">06 : 45 p.m.</option>
                          <option value="19:00">07 : 00 p.m.</option>
                          <option value="19:15">07 : 15 p.m.</option>
                          <option value="19:30">07 : 30 p.m.</option>
                          <option value="19:45">07 : 45 p.m.</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <!--   <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="duracionhora">Duración en hora </label>
                        <select id="duracionhora" name="duracionhora" class="form-control select2" style="width: 100%;" required>
                          <option value="" selected disabled hidden>Seleccione una opción </option>
                          <option value="01">1 Hora.</option>
                          <option value="02">2 Hora.</option>
                          <option value="03">3 Hora.</option>
                          <option value="04">4 Hora.</option>
                          <option value="05">5 Hora.</option>
                          <option value="06">6 Hora.</option>
                          <option value="07">7 Hora.</option>
                          <option value="08">8 Hora.</option>
                          <option value="09">9 Hora.</option>
                          <option value="10">10 Hora.</option>
                          <option value="11">11 Hora.</option>
                          <option value="12">12 Hora.</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="duracionminuto">Minutos.</label>
                        <select id="duracionminuto" name="duracionminuto" class="form-control select2" style="width: 100%;" required>
                          <option value="" selected disabled hidden>Seleccione una opción </option>
                          <option value="00">0 Minutos.</option>
                          <option value="15">15 Minutos.</option>
                          <option value="30">30 Minutos.</option>
                          <option value="45">45 Minutos.</option>
                        </select>
                      </div>
                    </div>
                  </div>-->
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="materialsocializado">Tiempo Trancurrido</label>
                      <input type="text" id="horas_justificacion_real" name="horas_justificacion_real" class="form-control">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="profesor">Profesor</label>
                        <select id="profesoradd" name="profesoradd" class="form-control select2" style="width: 100%;" required>
                          <option value="" selected disabled hidden>Seleccione una opción </option>
                          <?php foreach ($teachers as $teachers) : ?>
                            <option value="<?php echo removeJunk($teachers['id_teacher']); ?>"><?php echo removeJunk($teachers['fullname_teacher']); ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="asignatura">Asignatura</label>
                        <select id="asignaturaadd" name="asignaturaadd" class="form-control select2" style="width: 100%;" required>
                          <option value="" selected disabled hidden>Seleccione una opción </option>
                          <?php foreach ($subject as $subject) : ?>
                            <option value="<?php echo removeJunk($subject['id_subject']); ?>"><?php echo removeJunk($subject['name_subject']); ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="materialsocializado">Material socializado</label>
                      <input type="text" id="materialsocializadoadd" name="materialsocializadoadd" class="form-control" required>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="ejetematico">Eje temático</label>
                      <input class="form-control form-control-lg" id="ejetematicoadd" name="ejetematicoadd" type="text" placeholder="" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="institucion"> Institución </label>
                        <input type="text" id="institucionadd" name="institucionadd" class="form-control" required>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="grupo">Grupo</label>
                        <select id="grupoadd" name="grupoadd" class="form-control select2" style="width: 100%;" required>
                          <option value="" selected disabled hidden>Seleccione una opción </option>
                          <?php foreach ($group as $group) : ?>
                            <option value="<?php echo removeJunk($group['id_group']); ?>"><?php echo removeJunk($group['cod_group']) . " - " . removeJunk($group['name_group']); ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="observaciones">Observaciones</label>
                    <textarea class="form-control" rows="3" id="observacionesadd" name="observacionesadd" placeholder="Observaciones..."></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Adjuntar lista de asistencia (.txt / .docx / .jpg) </label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="evidenceadd" name="evidenceadd" onchange="return fileValidation(this.files[0].name)" />
                        <label class="custom-file-label" id="evidencelabel" name="evidencelabel" for="exampleInputFile"></label>
                      </div>
                    </div>
                    <input type="text" id="name" name="name" class="form-control" value="No se ha seleccionado un archivo" readonly>
                    <br>
                  </div>

                  <div class="form-group">
                    <input value="Guardar" type="submit" class="btn btn-success float-right">
                  </div>
                </form>
              </div>

              <!-- /.card-body -->
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Asistencias</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Fecha</th>
                      <th>Docente</th>
                      <th>Asignatura</th>
                      <th>Material socializado</th>
                      <th>Eje temático</th>
                      <th>Institución</th>
                      <th>Grupo</th>
                      <th>Evidencia</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($asistance as $asistance) : ?>
                      <tr>
                        <td class="text-center"><?php echo countId(); ?></td>
                        <td class="text-center"> <?php echo removeJunk($asistance['date']); ?></td>
                        <td class="text-center"> <?php echo removeJunk($asistance['fullname_teacher']); ?></td>
                        <td class="text-center"> <?php echo removeJunk($asistance['name_subject']); ?></td>
                        <td class="text-center"> <?php echo removeJunk($asistance['socialized_material_assistance']); ?></td>
                        <td class="text-center"> <?php echo removeJunk($asistance['main_theme_assistance']); ?></td>
                        <td class="text-center"> <?php echo removeJunk($asistance['institution_assistance']); ?></td>
                        <td class="text-center"> <?php echo removeJunk($asistance['name_group']); ?></td>
                        <td class="text-center">
                          <a class="btn btn-info btn-small btnVer" href="javascript:window.open('evidence.php?evicencia=<?php echo $asistance['evidence_assistance'] ?>','','width=800,height=650,left=50,top=50,toolbar=yes');void 0">
                            <i class="fa fa-eye"></i> </a>
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

    <div class="modal fade" id="modal-lg">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Large Modal</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <embed src="" type="application/pdf" id="visual" name="visual" width="100%" height="600px" />
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
  $(document).ready(function() {
    //Confirmar
    $(".btnConfirmar").click(function() {
      var fecha = document.getElementById("fechaadd").value;
      var profesor = document.getElementById("profesoradd").value;
      var profesor1 = $('#profesoradd').val();
      var asignatura = $('#asignaturaadd').val();
      var material = $('#materialsocializadoadd').val();
      var ejetematico = $('#ejetematicoadd').val();
      var institucion = $('#institucionadd').val();
      var grupo = $('#grupoadd').val();
      var observaciones = $('#observacionesadd').val();
      var evidencia = $('#evidenceadd').val();
      $("#fechaconfi").val(fecha);
      $("#profesorconfig").val(profesor1);
      $("#asignaturaconfig").val(asignatura);
      $("#materialsocializadoconfig").val(material);
      $("#ejetematicoconfig").val(ejetematico);
      $("#institucionconfig").val(institucion);
      $("#grupoconfig").val(grupo);
      $("#observacionesconfig").val(observaciones);
      $("#evidenceconfig").val(evidencia);
    });
    $('#asistenciaconfirmacion').on('submit', function(event) {
      var $fechaconfirmacion = $('#fechaconfi').val();
      var $profesorconfirmacion = $('#profesorconfig').val();
      var $asignaturaconfirmacion = $('#asignaturaconfig').val();
      var $materialconfirmacion = $('#materialsocializadoconfig').val();
      var $ejetematicoconfirmacion = $('#ejetematicoconfig').val();
      var $institucionconfirmacion = $('#institucionconfig').val();
      var $grupoconfirmacion = $('#grupoconfig').val();
      if ($fechaconfirmacion === "") {
        event.preventDefault();
        var error = '<br><span style="color: red;">Campo obligatorio.</span>';
        $('#fechaconfi').after($(error).fadeOut(2000));
        $('#fechaconfi').css("border-color", "red");
      }
      if ($profesorconfirmacion === "") {
        event.preventDefault();
        var error = '<br><span style="color: red;">Campo obligatorio.</span>';
        $('#profesorconfig').after($(error).fadeOut(2000));
        $('#profesorconfig').css("border-color", "red");
      }
      if ($asignaturaconfirmacion === "") {
        event.preventDefault();
        var error = '<br><span style="color: red;">Campo obligatorio.</span>';
        $('#asignaturaconfig').after($(error).fadeOut(2000));
        $('#asignaturaconfig').css("border-color", "red");
      }
      if ($materialconfirmacion === "") {
        event.preventDefault();
        var error = '<br><span style="color: red;">Campo obligatorio.</span>';
        $('#materialsocializadoconfig').after($(error).fadeOut(2000));
        $('#materialsocializadoconfig').css("border-color", "red");
      }
      if ($ejetematicoconfirmacion === "") {
        event.preventDefault();
        var error = '<br><span style="color: red;">Campo obligatorio.</span>';
        $('#ejetematicoconfig').after($(error).fadeOut(2000));
        $('#ejetematicoconfig').css("border-color", "red");
      }
      if ($institucionconfirmacion === "") {
        event.preventDefault();
        var error = '<br><span style="color: red;">Campo obligatorio.</span>';
        $('#institucionconfig').after($(error).fadeOut(2000));
        $('#institucionconfig').css("border-color", "red");
      }
      if ($grupoconfirmacion === "") {
        event.preventDefault();
        var error = '<br><span style="color: red;">Campo obligatorio.</span>';
        $('#grupoconfig').after($(error).fadeOut(2000));
        $('#grupoconfig').css("border-color", "red");
      }
    });
  });
</script>
<script>
  function fileValidation($name) {
    var fileInput = document.getElementById('evidenceadd');
    var filePath = fileInput.value;

    var allowedExtensions = /(.jpg|.jpeg|.png|.gif|.pdf)$/i;
    if (!allowedExtensions.exec(filePath)) {
      alert('El  archivo ' + $name + ' no contiene extensiones: .jpeg / .jpg / .png / .gif / .pdf');
      fileInput.value = '';
      return false;
    } else {
      $("#name").val($name);
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
  $(document).ready(function() {
    $(".btnVer").click(function() {

      idVer = $(this).data('id');
      var evidencia = $(this).data('evidencia');

      document.getElementById("visual").src = "../uploads/evidences/" + evidencia;
      $("#idVer").val(idVer);
    });
  });


  function calculardiferencia() {

    var hora_final = $('#horafinaladd').val();
    var hora_inicio = $('#horainicioadd').val();
    // console.log("- "+hora_inicio + hora_final);
    // Expresión regular para comprobar formato
    var formatohora = /^([01]?[0-9]|2[0-3]):[0-5][0-9]$/;

    // Si algún valor no tiene formato correcto sale
    if (!(hora_inicio.match(formatohora) &&
        hora_final.match(formatohora))) {
      return;
    }

    // Calcula los minutos de cada hora
    var minutos_inicio = hora_inicio.split(':')
      .reduce((p, c) => parseInt(p) * 60 + parseInt(c));
    var minutos_final = hora_final.split(':')
      .reduce((p, c) => parseInt(p) * 60 + parseInt(c));

    // Si la hora final es anterior a la hora inicial sale
    if (minutos_final < minutos_inicio) return;

    // Diferencia de minutos
    var diferencia = minutos_final - minutos_inicio;

    // Cálculo de horas y minutos de la diferencia
    var horas = Math.floor(diferencia / 60);
    var minutos = diferencia % 60;
    if (hora_final <= hora_inicio) {
      $('#horas_justificacion_real').val("Error, la hora final no puede ser menor a la hora de inicio.");
    } else {
      $('#horas_justificacion_real').val(horas + ':' +
        (minutos < 10 ? '0' : '') + minutos);
    }


  }

  $('#horainicioadd').change(calculardiferencia);
  $('#horafinaladd').change(calculardiferencia);
  calculardiferencia();
</script>


</html>