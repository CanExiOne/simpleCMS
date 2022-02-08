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
          <div class="col-md">
            <div class="card">
              <div class="card-header bg-primary">
                Ustawienia Strony
              </div>
              <form action="/admin/settings/updateSettings" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label for="siteName">Nazwa Strony</label>
                  <input id="siteName" type="text" class="form-control" name="siteName" value="<?= esc($settings['siteName']) ?>" aria-describedby="siteNameHelp" autocomplete="off">
                  <div id="siteNameHelp" class="form-text">Podaj nazwę strony</div>
                </div>
                <div class="form-group">
                  <label for="siteLogo">Logo Strony</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="siteLogo" name="siteLogo">
                    <label class="custom-file-label" for="siteLogo" aria-describedby="siteLogoHelp">Wyślij Logo</label>
                  </div>                    
                    <div id="siteLogoHelp" class="form-text">Wyślij logo strony</div>
                </div>
                <div class="form-group">
                  <label for="companyNip">NIP Firmy</label>
                  <input id="companyNip" type="text" class="form-control" name="companyNip" value="<?= esc($settings['companyNIP']) ?>" aria-describedby="companyNipHelp" autocomplete="off">
                  <div id="companyNipHelp" class="form-text">Podaj NIP firmy</div>
                </div>
                <div class="form-group">
                  <label for="companyRegon">REGON Firmy</label>
                  <input id="companyRegon" type="text" class="form-control" name="companyRegon" value="<?= esc($settings['companyREGON']) ?>" aria-describedby="companyRegonHelp" autocomplete="off">
                  <div id="companyRegonHelp" class="form-text">Podaj REGON firmy</div>
                </div>
                <hr>
                <div class="form-row">
                  <div class="form-group col">
                    <label for="statsClients">Liczba Klientów</label>
                    <input id="statsClients" type="text" class="form-control" name="statsClients" value="<?= esc($settings['statsClients']) ?>" aria-describedby="statsClientsHelp" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" autocomplete="off">
                    <div id="statsClientsHelp" class="form-text">Podaj liczbę klientów do statystyk</div>
                  </div>
                  <div class="form-group col">
                    <label for="statsFinishedProjects">Ukończone Projekty</label>
                    <input id="statsFinishedProjects" type="text" class="form-control" name="statsFinishedProjects" value="<?= esc($settings['statsFinishedProjects']) ?>" aria-describedby="statsFinishedProjectsHelp" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" autocomplete="off">
                    <div id="statsFinishedProjectsHelp" class="form-text">Podaj liczbę ukończonych projektów do statystyk</div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col">
                    <label for="statsCurrentProjects">Aktualne Projekty</label>
                    <input id="statsCurrentProjects" type="text" class="form-control" name="statsCurrentProjects" value="<?= esc($settings['statsCurrentProjects']) ?>" aria-describedby="statsCurrentProjectsHelp" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" autocomplete="off">
                    <div id="statsCurrentProjectsHelp" class="form-text">Podaj liczbę aktualnych projektów do statystyk</div>
                  </div>
                  <div class="form-group col">
                    <label for="statsEmployees">Liczba Pracowników</label>
                    <input id="statsEmployees" type="text" class="form-control" name="statsEmployees" value="<?= esc($settings['statsEmployees']) ?>" aria-describedby="statsEmployeesHelp" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" autocomplete="off">
                    <div id="statsEmployeesHelp" class="form-text">Podaj liczbę aktualnych pracowinków</div>
                  </div>
                </div>

                <div class="response">

                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-success">Wyślij</button>
              </div>
              </form>
            </div>
          </div>
          <div class="col-md">
            <div class="card">
              <div class="card-header bg-warning">
                Ustawienia E-mail
              </div>
              <form action="/admin/settings/updateSettings" method="post">
              <div class="card-body">
                <div class="form-group">
                    <label for="emailHost">Serwer SMTP E-mail</label>
                    <input id="emailHost" type="text" class="form-control" name="emailHost" value="<?=esc($serverCfg['emailHost'])?>" aria-describedby="emailHostHelp" autocomplete="off">
                    <div id="emailHostHelp" class="form-text">Podaj adres serwera smtp dla swojego adresu e-mail</div>
                  </div>
                  <div class="form-group">
                    <label for="emailUser">Login SMTP E-mail</label>
                    <input id="emailUser" type="text" class="form-control" name="emailUser" value="<?=esc($serverCfg['emailUser'])?>" aria-describedby="emailUserHelp" autocomplete="off">
                    <div id="emailUserHelp" class="form-text">Podaj login do serwera SMTP</div>
                  </div>
                  <div class="form-group">
                    <label for="emailPassword">Hasło SMTP E-mail</label>
                    <input id="emailPassword" type="password" class="form-control" name="emailPassword"  value="<?=esc($serverCfg['emailPassword'])?>" aria-describedby="emailPasswordHelp" autocomplete="off">
                    <div id="emailPasswordHelp" class="form-text">Podaj hasło do serwera SMTP</div>
                  </div>
                  <div class="form-group">
                    <label for="emailSender">Adres e-mail poczty wychodzącej</label>
                    <input id="emailSender" type="email" class="form-control" name="emailSender" value="<?=esc($serverCfg['emailSender'])?>" aria-describedby="emailSenderHelp" autocomplete="off">
                    <div id="emailSenderHelp" class="form-text">Podaj adres e-mail do poczty wychodzącej</div>
                  </div>
                  <div class="form-group">
                    <label for="emailContact">Adres e-mail poczty przychodzącej</label>
                    <input id="emailContact" type="text" class="form-control" name="emailContact" value="<?=esc($settings['emailContact'])?>" aria-describedby="emailContactHelp" autocomplete="off">
                    <div id="emailContactHelp" class="form-text">Podaj adres e-mail dla poczty przychodzącej</div>
                  </div>
                  <div class="form-group">
                    <label for="emailPort">Port do serwera SMTP</label>
                    <input id="emailPort" type="text" class="form-control" name="emailPort" value="<?=esc($serverCfg['emailPort'])?>" aria-describedby="emailPortHelp" autocomplete="off">
                    <div id="emailPortHelp" class="form-text">Podaj port swojego serwera SMTP. Dla TLS użyj 587, a SSL 465</div>
                  </div>
                  <div class="form-group">
                    <label for="emailCrypto">Port do serwera SMTP</label>
                    <input id="emailCrypto" type="text" class="form-control" name="emailCrypto" value="<?=esc($serverCfg['emailCrypto'])?>" aria-describedby="emailCryptoHelp" autocomplete="off">
                    <div id="emailCryptoHelp" class="form-text">Jeśli posiadasz certyfikat to użyj SSL, jeśli nie to TLS</div>
                  </div>
                  <div class="response">

                  </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-success">Wyślij</button>
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

function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

$('input[type="file"]').on('change',function(e){
    //get the file name
    var fileName = e.target.files[0].name;
    //replace the "Choose a file" label
    $('.custom-file-label').html(fileName);
})

$(function() {
  $('form').submit(async function(event) {
    event.preventDefault();

    form = $(this);

    //Clear error messages
    $('.form-text').each(function() {
      $(this).find('.invalid-feedback').remove();
    })

    $('.response').text('');

    //Create clone of button
    var btnClone = form.find('button[type=submit]').clone();

    //Disable Button
    $('button[type=submit]').attr('disabled', true);

    //Make it go spinny
    form.find('button[type=submit]').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> <span class=''>Wysyłanie...</span>");
    await sleep(2500);

    formData = new FormData(this);

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
      form.find('button[type=submit]').replaceWith(btnClone);
      
      //Check if response was invalid and if true display errors
      if(response.status === 'invalid')
      {
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