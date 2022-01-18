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
            <a href="<?=base_url('/admin')?>" class="nav-link">
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
              </p>
            </a>
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
            <a href="<?=base_url('/admin/settings')?>" class="nav-link active">
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
            <li class="breadcrumb-item"><a href="<?=base_url('/admin')?>">Panel Kontrolny</a></li>
              <li class="breadcrumb-item active">Ustawienia</li>
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
          <div class="col">
            <div class="card card-info">
              <div class="card-header d-flex">
                <div id="settings" class="mt-auto mb-auto">
                  Ustawienia Strony
                </div>
              </div>
              <form action="<?=env('app.baseURL')?>/admin/updateSettings" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="siteName">Nazwa Strony</label>
                    <input id="siteName" type="text" class="form-control" name="siteName" value="<?= getenv('app.siteName') ?>" aria-describedby="siteNameHelp" autocomplete="off">
                    <div id="siteNameHelp" class="form-text">Podaj nazwę strony</div>
                  </div>
                  <div class="form-group">
                    <label for="siteLogo">Logo Strony</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="siteLogo" name="siteLogo">
                      <label class="custom-file-label" for="siteLogo" aria-describedby="siteLogoHelp">Wyślij Plik</label>
                    </div>                    
                      <div id="siteLogoHelp" class="form-text">Wyślij logo strony</div>
                  </div>
                  <hr>
                  <h4>E-mail</h4>
                  <div class="form-group">
                    <label for="emailHost">Serwer SMTP E-mail</label>
                    <input id="emailHost" type="text" class="form-control" name="emailHost" value="<?= getenv('email.host') ?>" aria-describedby="emailHostHelp" autocomplete="off">
                    <div id="emailHostHelp" class="form-text">Podaj adres serwera smtp dla swojego adresu e-mail</div>
                  </div>
                  <div class="form-group">
                    <label for="emailUsername">Login SMTP E-mail</label>
                    <input id="emailUsername" type="text" class="form-control" name="emailUsername" value="<?= getenv('email.user') ?>" aria-describedby="emailUsernameHelp" autocomplete="off">
                    <div id="emailUsernameHelp" class="form-text">Podaj login do serwera SMTP</div>
                  </div>
                  <div class="form-group">
                    <label for="emailPassword">Hasło SMTP E-mail</label>
                    <input id="emailPassword" type="password" class="form-control" name="emailPassword"  value="<?= getenv('email.password') ?>" aria-describedby="emailPasswordHelp" autocomplete="off">
                    <div id="emailPasswordHelp" class="form-text">Podaj hasło do serwera SMTP</div>
                  </div>
                  <div class="form-group">
                    <label for="emailSender">Adres e-mail poczty wychodzącej</label>
                    <input id="emailSender" type="email" class="form-control" name="emailSender" value="<?= getenv('email.sender') ?>" aria-describedby="emailSenderHelp" autocomplete="off">
                    <div id="emailSenderHelp" class="form-text">Podaj adres e-mail do poczty wychodzącej</div>
                  </div>
                  <div class="form-group">
                    <label for="emailContact">Adres e-mail poczty przychodzącej</label>
                    <input id="emailContact" type="text" class="form-control" name="emailContact" value="<?= getenv('email.contact') ?>" aria-describedby="emailContactHelp" autocomplete="off">
                    <div id="emailContactHelp" class="form-text">Podaj adres e-mail dla poczty przychodzącej</div>
                  </div>
                  <div class="form-group">
                    <label for="emailPort">Port do serwera SMTP</label>
                    <input id="emailPort" type="text" class="form-control" name="emailPort" value="<?= getenv('email.port') ?>" aria-describedby="emailPortHelp" autocomplete="off">
                    <div id="emailPortHelp" class="form-text">Podaj adres serwera smtp dla swojego adresu e-mail</div>
                  </div>
                  <div id="otherErrors" class="form-group"></div>
                </div>
                <div class="card-footer">
                  <button id="updateSettings" class="btn btn-success">Zapisz Ustawienia</button>
                </div>
              </form>
            </div>
          </div>
        </div>
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

<script>
$(document).ready(function() {

  if(localStorage.getItem('reload-message'))
  {
    toastData = JSON.parse(localStorage.getItem('reload-message'))

    if(toastData.type === 'success')
    {
      $(document).Toasts('create', {
      title: 'Sukces!',
      body: toastData.message,
      autohide: true,
      delay: 5000,
      class: 'bg-success',
      });
    }
  }

  //Clear cookie reload-message
  localStorage.removeItem('reload-message');

});

$(function() {
  $('form').submit(function(event) {
    event.preventDefault();

    //Restore #titleHelp and #otherErrors state in case it was edited to show error before
    $('.form-text').each(function() {
      $(this).children().remove();
    })

    //Disable button
      $('#updateSettings').attr('disabled', true);

    //Get form and create FormData, using DOM because FormData() get's angry about jquery
    var form = document.querySelector('form');

    formData = new FormData(form);

    $.ajax({
      type: form.getAttribute('method'),
      url: form.getAttribute('action'),
      data: formData,
      processData: false,
      contentType: false,
    }).done(function(data) {
      //Parse data to json for easier response handling
      var data = JSON.parse(data);

      //Re-enable button
      $('#updateSettings').attr('disabled', false);
      
      //Check if response was invalid and if true display errors
      if(data.status === 'invalid')
      {
        for(error in data.errors) {
          $(`#${error}Help`).append(`<div class='invalid-feedback d-block'>${data.errors[error]}</div>`);
        }
      } else if (data.status === 'success')
      {
        //Reload page and display success popup
        reloadMessage = {
          'message' : data.message,
          'type' : 'success'
        };

        localStorage.setItem('reload-message', JSON.stringify(reloadMessage));
        window.location.reload();
      } else {
        console.log(data);
      }

    }).fail(function(data) {
      //Re-enable button
      $('#updateSettings').attr('disabled', false);
      
      $('#otherErrors').addClass('invalid-feedback d-block').text('Wystąpił nieznany błąd! Skontaktuj się z Administratorem Serwera');
    });
  });
});
</script>