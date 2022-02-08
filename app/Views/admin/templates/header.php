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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    
    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <!-- Moment -->
    <script src="/assets/plugins/moment/moment-with-locales.min.js"></script>
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="/assets/plugins/datatables/datatables.min.css" type="text/css"/>
    <link rel="stylesheet" href="/assets/plugins/bootstrap-slider/css/bootstrap-slider.min.css" type="text/css"/>
    <link rel="stylesheet" href="/assets/plugins/dropzone/min/dropzone.min.css" type="text/css"/>
    <link rel="stylesheet" href="/assets/plugins/daterangepicker/daterangepicker.css" type="text/css"/>

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
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="/assets/img/favicons/site.webmanifest">
    <link rel="mask-icon" href="/assets/img/favicons/safari-pinned-tab.svg" color="#7400ff">
    <link rel="shortcut icon" href="/assets/img/favicons/favicon.ico">
    <meta name="msapplication-TileColor" content="#9f00a7">
    <meta name="msapplication-config" content="/assets/img/favicons/browserconfig.xml">
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