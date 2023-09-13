<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="og:image" content="assets/img/logo.png">

	<meta property="og:description" content="<?=esc($siteDesc)?>">

	<meta property="og:title" content="<?=esc($siteTitle)?>">

  <?= csrf_meta() ?>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" />
    
    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Moment -->
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/b-2.2.2/cr-1.5.5/fc-4.0.2/fh-3.2.2/r-2.2.9/rg-1.1.4/rr-1.2.8/sc-2.0.5/sb-1.3.2/sp-2.0.0/sl-1.3.4/sr-1.1.0/datatables.min.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/css/bootstrap-slider.min.css" type="text/css" />
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" type="text/css" />

    <!-- Import Quill stylesheet -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="<?=env('app.siteURL')?>/assets/plugins/quill/quill_counter.js"></script>

    <!-- FontAwesome -->    
    <script src="https://kit.fontawesome.com/c23f620e01.js" crossorigin="anonymous"></script>

    <!-- Main style CSS -->
    <link rel="stylesheet" type="text/css" href="/assets/css/admin.css">

    <!-- Main Javascript -->
    <script src="/assets/js/admin.js"></script>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/assets/img/favicons/favicon.png">
    <title><?=esc($siteTitle)?></title>
</head>

<?php if(uri_string() != 'admin/login') :?>
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
        <a class="nav-link" href="/admin/logout" role="button">
          Wyloguj się <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
<?php endif ?>