<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?=esc($siteTitle)?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons
    <link href="<?=env('app.baseURL')?>/assets/img/favicon.png" rel="icon"> 
  -->
  <link href="https://imgur.com/a/5U0ReI3" rel="icon">
  <link href="<?=env('app.baseURL')?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Boostrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />

  <!-- JQuery -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
  <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
  <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>

  <!-- Template Main CSS Files -->
  <link href="<?=env('app.baseURL')?>/assets/css/style.css" rel="stylesheet">
  <link href="<?=env('app.baseURL')?>/assets/css/custom.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center <?php if($_SERVER['REQUEST_URI'] === '/') {echo('header-transparent');}?>">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1 class="text-light"><a href="<?=env('app.baseURL')?>/"><span><?=esc($settings['siteName'])?></span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a id="home" href="<?=env('app.baseURL')?>/">Home</a></li>
          <li><a id="about-us" href="<?=env('app.baseURL')?>/about-us">O Nas</a></li>
          <li><a id="blog" href="<?=env('app.baseURL')?>/blog">Blog</a></li>
          <li><a id="portfolio" href="<?=env('app.baseURL')?>/portfolio">Galeria</a></li>
          <li><a id="contact-us" href="<?=env('app.baseURL')?>/contact-us">Kontakt</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
