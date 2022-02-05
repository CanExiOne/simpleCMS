  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url('/admin')?>" class="brand-link">
      <img src="/assets/img/logo.png" alt="Logo" class="brand-image style="opacity: .8">
      <span class="brand-text font-weight-light"><?=esc($settings['siteName'])?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel-->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/uploads/avatars/avatar_placeholder.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/admin/profile" class="d-block"><?php echo($_SESSION['username']); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/admin" class="nav-link">
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
            <h1 class="m-0">Edytuj Profil</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=base_url('/admin')?>">Panel Kontrolny</a></li>
              <li class="breadcrumb-item active">Profil</li>
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
          <div class="col-md-8">
            <div class="card">
              <div class="card-header bg-info">
                Profil Użytkownika
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-2 text-center">
                    <img class="img-circle img-profile" src="/uploads/avatars/avatar_placeholder.png" alt="">
                    <p class="mt-3"><strong><?=esc($profile['firstName'])?> <?=esc($profile['lastName'])?></strong></p>
                    <p class="small-text"><?=esc($profile['email'])?></p>
                  </div>
                  <div class="vr"></div>
                  <div class="col">
                    <form action="/admin/profile/update" method="post">
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="firstName">Nowe Imię</label>
                          <input id="firstName" type="text" class="form-control" name="firstName" value="<?=esc($profile['firstName'])?>" aria-describedby="firstNameHelp" autocomplete="off">
                          <div id="firstNameHelp" class="form-text">Podaj nowę imię</div>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="lastName">Nowe Nazwisko</label>
                          <input id="lastName" type="text" class="form-control" name="lastName" value="<?=esc($profile['lastName'])?>" aria-describedby="lastNameHelp" autocomplete="off">
                          <div id="lastNameHelp" class="form-text">Podaj nowę nazwisko</div>
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="email">Nowy Adres E-mail</label>
                        <input id="email" type="email" class="form-control" name="email" value="<?=esc($profile['email'])?>" aria-describedby="emailHelp" autocomplete="off">
                        <div id="emailHelp" class="form-text">Podaj nowy adres e-mail</div>
                      </div>
                      <div class="response"></div>
                      <button class="btn btn-success" type="submit">Edytuj Profil</button>
                    </form>
                    <hr>
                    <div class="card-header bg-warning">
                      Zmiana Hasła
                    </div>
                      <form action="/admin/profile/changepassword" method="post">
                        <div class="form-group col-md-6">
                          <label for="newPassword">Nowe Hasło</label>
                          <input id="newPassword" type="password" class="form-control" name="newPassword" aria-describedby="newPasswordHelp" autocomplete="off">
                          <div id="newPasswordHelp" class="form-text">Podaj swoje nowe hasło</div>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="currPassword">Aktualne Hasło</label>
                          <input id="currPassword" type="password" class="form-control" name="currPassword" aria-describedby="currPasswordHelp" autocomplete="off">
                          <div id="currPasswordHelp" class="form-text">Podaj swoje aktualne hasło</div>
                        </div>
                        <div class="response"></div>
                        <button class="btn btn-warning" type="submit">Zmień Hasło</button>
                      </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
    <strong>Copyright &copy; 2021-<?= date('Y') ?> <a href="<?= base_url() ?>"><?=esc($settings['siteName'])?></a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->
</body>
<script>
function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

$(function() {
  $('form').submit(async function(event) {
    event.preventDefault();

    form = $(this);

    //Clear error messages
    $('.form-text').each(function() {
      $(this).children().remove();
    })

    $('.response').text('');

    //Create clone of button
    var btnClone = form.children('button[type=submit]').clone();

    //Disable Button
    $('button[type=submit]').attr('disabled', true);

    //Make it go spinny
    form.children('button[type=submit]').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> <span class=''>Wysyłanie...</span>");
    await sleep(2500);

    formData = new FormData(this);

    formData.set('userId', <?php echo($_SESSION['userId'])?>)

    $.ajax({
      type: this.getAttribute('method'),
      url: this.getAttribute('action'),
      data: formData,
      processData: false,
      contentType: false,
    }).done(function(response) {
      //Re-enable button
        $('button[type=submit]').attr('disabled', false);

      //Restore button
      form.children('button[type=submit]').replaceWith(btnClone);
      
      //Check if response was invalid and if true display errors
      if(response.status === 'invalid')
      {
        console.log(response);
        for(error in response.errors) {
          $(`#${error}Help`).append(`<div class='invalid-feedback d-block'>${response.errors[error]}</div>`);
        }

        form.find('.response').addClass('invalid-feedback d-block').text(response.message);

        $(document).Toasts('create', {
          title: 'Uwaga!!!',
          body: response.message,
          autohide: true,
          delay: 8000,
          class: 'bg-warning',
        });
      } 
      else if (response.status === 'success')
      {
        form.find('.response').addClass('valid-feedback d-block').text(response.message);

        $(document).Toasts('create', {
          title: 'Sukces!',
          body: response.message,
          autohide: true,
          delay: 8000,
          class: 'bg-success',
        });
      } 
      else 
      {
        form.find('.response').addClass('invalid-feedback d-block').text(response.message);

        $(document).Toasts('create', {
          title: 'Wystąpił Błąd!',
          body: response.message,
          autohide: true,
          delay: 8000,
          class: 'bg-danger',
        });
      }
    }).fail(function(response) {
      //Re-enable button
      $('button[type=submit]').attr('disabled', false);
      //Restore button
      form.find('button[type=submit]').replaceWith(btnClone);

      console.log(response)

      form.find('.response').addClass('invalid-feedback d-block').text(response.message);

      if(response.status === 'invalid')
      {
        console.log(response);
        for(error in response.errors) {
          $(`#${error}Help`).append(`<div class='invalid-feedback d-block'>${response.errors[error]}</div>`);
        }

        form.find('.response').addClass('invalid-feedback d-block').text(response.message);

        $(document).Toasts('create', {
          title: 'Uwaga!!!',
          body: response.message,
          autohide: true,
          delay: 8000,
          class: 'bg-warning',
        });
      } else {
        $(document).Toasts('create', {
          title: 'Wystąpił Błąd!',
          body: response.message,
          autohide: true,
          delay: 8000,
          class: 'bg-danger',
        });
      }
    });
  })
})
</script>