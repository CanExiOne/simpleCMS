<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url('/admin')?>" class="brand-link">
      <img src="/assets/img/logo.png" alt="Logo" class="brand-image style="opacity: .8">
      <span class="brand-text font-weight-light"><?= env('app.siteName') ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel-->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/uploads/avatars/avatar_placeholder.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo($_SESSION['username']); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Panel Kontrolny
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('/admin/news')?>" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Ogłoszenia
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('/admin/gallery')?>" class="nav-link">
              <i class="nav-icon fas fa-images"></i>
              <p>
                Galeria
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/gallery" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Albumy</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/gallery/new" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nowy Album</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('/admin/users')?>" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Użytkownicy
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('/admin/settings')?>" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Ustawienia
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Panel Kontrolny</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Panel Kontrolny</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="small-box bg-gradient-success">
                <div class="inner">
                    <h3><?= esc($userCount) ?></h3>
                    <p>Użytkowników</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="<?= base_url('/admin/users')?>" class="small-box-footer">
                    Sprawdź <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-md-6">
            <div class="small-box bg-gradient-info">
                <div class="inner">
                    <h3><?= esc($newsCount) ?></h3>
                    <p>Ogłoszeń</p>
                </div>
                <div class="icon">
                    <i class="fas fa-newspaper"></i>
                </div>
                <a href="<?=base_url('/admin/news')?>" class="small-box-footer">
                    Sprawdź <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-md-6">
            <div class="small-box bg-gradient-warning">
                <div class="inner">
                    <h3>7</h3>
                    <p>Albumów</p>
                </div>
                <div class="icon">
                    <i class="fas fa-images"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Sprawdź <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-md-6">
            <div class="small-box bg-gradient-warning">
                <div class="inner">
                    <h3>54</h3>
                    <p>Zdjęć</p>
                </div>
                <div class="icon">
                    <i class="fas fa-image"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Sprawdź <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline font-small">
      Designed with <strong><a href="https://adminlte.io">AdminLTE.io</a></strong>
       & 
      Created by <strong>VGE Sites</strong>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021-<?= date('Y') ?> <a href="<?= base_url() ?>"><?=env('app.siteName')?></a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->
</body>
