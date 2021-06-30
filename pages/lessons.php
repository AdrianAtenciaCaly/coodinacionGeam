<?php include_once('../includes/load.php');
if (!$session->isUserLoggedIn(true)) {
  redirect('../index', false);
}
$teachers = findAllTeachers();
$group = findAllgroup();
$group = findAllgroup();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Clases | GEAM</title>
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
   <!-- fullCalendar -->
   <link rel="stylesheet" href="../assets/plugins/fullcalendar/main.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
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
                <li class="breadcrumb-item active">Clase</li>
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
                <h3 class="card-title">Crear clase</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <form action="../includes/sentences/register_group.php" method="POST">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="inputProjectLeader">Fecha de la clase</label>
                        <input type="date" id="fechaclase" name="fechaclase"  class="form-control"  required>
                      </div>
                    </div>

                    <div class="col-md-8">
                      <div class="form-group">
                        <label for="inputProjectLeader">Nombre de la clase</label>
                        <input type="text" id="nombreclase" name="nombreclase" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="inputStatus">Profesor</label>
                      <select id="profesorclase" name="profesorclase" class="form-control select2" style="width: 100%;" required>
                        <option value="" selected disabled hidden>Choose here</option>
                          <?php foreach ($teachers as $teachers) : ?>
                            <option value="<?php echo removeJunk($teachers['id_teacher']); ?>"><?php echo removeJunk($teachers['fullname_teacher']); ?></option>
                          <?php endforeach; ?>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="inputStatus">Grupo</label>
                      <select id="grupoclase" name="grupoclase" class="form-control select2"  style="width: 100%;" required>
                        <option value="" selected disabled hidden>Choose here</option>
                          <?php foreach ($group as $group) : ?>
                            <option value="<?php echo removeJunk($group['id_group']); ?>"><?php echo removeJunk($group['name_group']); ?></option>
                          <?php endforeach; ?>
                        </select>
                    </div>
                  </div>
                  </div>
                  <div class="form-group">
                    <label for="inputProjectLeader">Observaciones</label>
                    <textarea class="form-control" id="observacionesgrupo" name="observacionesgrupo" rows="3" placeholder="Observaciones..."></textarea>
                  </div>

                  <br>
                  <div class="form-group">
                    <input type="submit" value="Guardar" class="btn btn-success float-right">
                  </div>


                </form>
              </div>

              <!-- /.card-body -->
            </div>
            <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="sticky-top mb-3">
              <div class="card">
             
              
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
            <!-- /.card -->
          </div>

        </div>

      </section>


    </div>
    <!-- /.content-wrapper -->


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
  $(function () {

  


    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = 25,
        m    = date.getMonth(),
        y    = 2021

    var Calendar = FullCalendar.Calendar;
  
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------


    var calendar = new Calendar(calendarEl, {
      headerToolbar: {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      themeSystem: 'bootstrap',
      //Random default events
      events: [
        {
          <?php echo "title          :'" . $group['cod_group']  ."'";?>,
          start          : new Date(y, m, 1),
          backgroundColor: '#f56954', //red
          borderColor    : '#f56954', //red
          allDay         : true
        },
        {
          title          : 'Long Event',
          start          : new Date(y, m, d - 5),
          end            : new Date(y, m, d - 2),
          backgroundColor: '#f39c12', //yellow
          borderColor    : '#f39c12' //yellow
        },
       
        {
          title          : 'Lunch',
          start          : new Date(y, m, d, 12, 30),
          end            : new Date(y, m, d, 14, 0),
          allDay         : false,
          backgroundColor: '#f56954', //red
          borderColor    : '#f56954', //red
        },
        {
          title          : 'Prueba',
          start          : new Date(25, m, d, 14, 30),
          end            : new Date(25, m, d, 15, 0),
          allDay         : false,
          backgroundColor: '#f56954', //red
          borderColor    : '#f56954', //red
        },
        {
          title          : 'Birthday Party',
          start          : new Date(y, m, d + 1, 19, 0),
          end            : new Date(y, m, d + 1, 22, 30),
          allDay         : false,
          backgroundColor: '#00a65a', //Success (green)
          borderColor    : '#00a65a' //Success (green)
        },
        {
          title          : 'Click for Google',
          start          : new Date(y, m, 28),
          end            : new Date(y, m, 29),
          url            : 'https://www.google.com/',
          backgroundColor: '#3c8dbc', //Primary (light-blue)
          borderColor    : '#3c8dbc' //Primary (light-blue)
        }
      ],
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      }
    });

    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    // Color chooser button
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      // Save color
      currColor = $(this).css('color')
      // Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      // Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      // Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.text(val)
      $('#external-events').prepend(event)

      // Add draggable funtionality
      ini_events(event)

      // Remove event from text input
      $('#new-event').val('')
    })
  })
</script>
</html>