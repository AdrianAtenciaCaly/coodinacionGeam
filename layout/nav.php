    <?php
    include_once('../includes/load.php');
    if (!$session->isUserLoggedIn(true)) {
      redirect('../index.php', false);
    }
    $user = current_user();
    $numeroGrupo = countGroup();
    $numeroAsistencia = countAsistence();
    $numeroGrupo = countGroup();
    $AllGroup = findAllgroup()
    ?>
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="../assets/dist/img/LOGO.png" alt="AdminLTELogo" height="60" width="60">
      <p>Cargando...</p>
    </div>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link"></a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="../assets/dist/img/abelmendoza.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SGA-GEAM</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../assets/dist/img/abelmendozaC.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $user['tipo']; ?></a>
          </div>
        </div>
        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="../pages/dashboard" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item menu-open">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users-cog"></i>
                <p>
                  Gestión coordinación
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../pages/add" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Asistencia</p>
                    <span class="badge badge-info right"><?php echo $numeroAsistencia['total']; ?></span>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="../pages/teachers" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Profesores</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../pages/subject" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Asignatura</p>

                  </a>
                </li>
                <li class="nav-item">
                  <a href="../pages/institutions" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Instituciones</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-object-group"></i>
                <p>
                  Gestión estudiantes/grupos
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../pages/group" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Grupos</p>
                    <span class="badge badge-info right"><?php echo $numeroGrupo['total']; ?></span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../pages/students" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Estudiantes por grupos</p>
                  </a>
                </li>

              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                <p>
                 Grupos Creados
                  <i class="right fas fa-angle-left"></i>
                  <span class="badge badge-primary right"><?php echo  $numeroGrupo['total']; ?></span>
                </p>
              </a>
              <ul class="nav nav-treeview">
              <?php foreach ($AllGroup  as $AllGroup ) : 
                $cont = countStudentsGroup($AllGroup['id_group']);
                ?>
                <li class="nav-item">
            
                  <a href="../pages/groupdetails.php?id_group=<?php echo $AllGroup['id_group'] ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p><?php echo  $AllGroup['name_group'];?></p>
                    <span class="badge badge-info right"><?php echo $cont['total']; ?></span>
                  </a>
                </li>
                <?php endforeach; ?>

              </ul>
            </li>


            <li class="nav-header">Opciones de usuario.</li>
            <li class="nav-item">
              <a href="../includes/sentences/logout.php" class="nav-link">
                <i class="fas fa-sign-out-alt"></i>
                <p>Cerrar sesión</p>
              </a>
            </li>
            <li class="nav-header"></li>
            <li class="nav-header"></li>
            <li class="nav-header">Usuario: <?php echo $user['name']; ?></li>
            <li class="nav-header">Tipo: <?php echo $user['tipo']; ?></li>
            <li class="nav-header">Ubicacións: <?php echo $user['campus']; ?></li>
          </ul>
        </nav>
      </div>
    </aside>