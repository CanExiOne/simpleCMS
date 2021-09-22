<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Moderna Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?=env('app.baseURL')?>/assets/img/favicon.png" rel="icon">
  <link href="<?=env('app.baseURL')?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?=env('app.baseURL')?>/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?=env('app.baseURL')?>/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?=env('app.baseURL')?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=env('app.baseURL')?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=env('app.baseURL')?>/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?=env('app.baseURL')?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?=env('app.baseURL')?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?=env('app.baseURL')?>/assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center <?php if($_SERVER['REQUEST_URI'] === '/') {echo('header-transparent');}?>">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1 class="text-light"><a href="<?=env('app.baseURL')?>/"><span><?=env('app.siteName')?></span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active " href="<?=env('app.baseURL')?>/">Home</a></li>
          <li><a href="<?=env('app.baseURL')?>/about-us">O Nas</a></li>
          <li><a href="<?=env('app.baseURL')?>/blog">Blog</a></li>
          <li><a href="<?=env('app.baseURL')?>/contact-us">Kontakt</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->