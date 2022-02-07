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
            <a href="<?=base_url('/admin/gallery')?>" class="nav-link active">
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
                <a href="/admin/gallery/new" class="nav-link active">
                  <i class="fas fa-circle nav-icon"></i>
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
              <li class="breadcrumb-item"><a href="<?=base_url('/admin')?>">Panel Kontrolny</a></li>
              <li class="breadcrumb-item"><a href="<?=base_url('/admin/gallery')?>">Galeria</a></li>
              <li class="breadcrumb-item active">Nowy Album</li>
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
          <div class="col-12">
            <div class="card card-success">
              <div class="card-header">
                <div>
                  Dodaj Nowy Album
                </div>
              </div>
              <form id="createAlbum" class="dropzone" method="post" action="/admin/gallery/createAlbum">
                <div class="card-body">
                  <div class="form-row">
                    <div class="form-group col-md-5">
                      <label for="title"><span style="color:red">*</span> Tytuł Albumu</label>

                      <input id="title" type="text" class="form-control" name="title" aria-describedby="titleHelp" autocomplete="off">
                      <div id="titleHelp" class="form-text">Podaj tytuł albumu</div>

                    </div>
                    <div class="col-md-1"></div>
                    <div class="form-group col-md-6">
                    <label for="categories"><span style="color:red">*</span> Kategoria</label>
                      <input list="categories-list" id="category" name="category" class="custom-select" autocomplete="off">
                        <datalist id="categories-list">
                          <option value="Test">Test</option>
                          <option value="Test1">Test1</option>
                          <option value="Test2">Test2</option>
                          <option value="Test3">Test3</option>
                        </datalist>
                      <div id="categoryHelp" class="form-text">Wybierz kategorię dla albumu</div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-5">
                      <label for="client">Klient</label>
                      <input id="client" type="text" class="form-control" name="client" aria-describedby="clientHelp" autocomplete="off">
                      <div id="clientHelp" class="form-text">Podaj nazwę klienta</div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="form-group col-md-2">
                      <label for="date"><span style="color:red">*</span> Data Projektu</label>
                      <div class="input-group date">
                        <input id="date" type="text" name="date" class="form-control" aria-describedby="dateHelp" autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                      <div id="dateHelp" class="form-text">Podaj datę zakończenia projektu</div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col">
                      <label for="description">Opis Albumu</label>
                      <textarea name="description" id="description" class="form-control" aria-describedby="descriptionHelp" placeholder="Wpisz opis albumu" autocomplete="off" maxlength="1000" rows="7"></textarea>
                      <span class="pull-right badge badge-secondary" id="count_message"></span>
                      <div id="descriptionHelp" class="form-text">Podaj opis albumu</div>
                    </div>
                  </div>
                </div>
                <div id="otherErrors">

                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Utwórz Album</button>
                </div>
              </form>
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

//Function for sleep, self-explanatory
function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

//Quick way to show number of letters in textarea, in future it should be turned into a function
var text_max = 1000;
  $('#count_message').html('0 / ' + text_max );

  $('#description').keyup(function() {
    var text_length = $('#description').val().length;
    var text_remaining = text_max - text_length;
    
    $('#count_message').html(text_length + ' / ' + text_max);
  });

document.addEventListener("DOMContentLoaded",async function() {

  Dropzone.options.createAlbum = {
    autoProcessQueue : false,
    addRemoveLinks: true,
    uploadMultiple: true,
    parallelUploads: 100,
    maxFiles: 100,
    init: function() {
      var myDropzone = this;
    
    this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
      e.preventDefault();

      if(myDropzone.getQueuedFiles().length === 0)
      {
        $('#otherErrors').addClass('invalid-feedback d-block').text('Musisz wysłać jakieś pliki!');
      }
      myDropzone.processQueue();
    });

    this.on("sendingmultiple", async function() {

      //Remove error messages from form
      $('.form-text').each(async function() {
      $(this).children('.invalid-feedback').remove();
      });

      $('input, textarea').removeClass('is-invalid');
      
      $('#otherErrors').text();

      //Disable button and wait for 2.5 seconds for nice UX
      $('button[type=submit]').attr('disabled', true);
      $('button[type=submit]').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> <span class=''>Wysyłanie...</span>");
      await sleep(2500);

    });

    this.on("successmultiple", function(files, response) {
      //Reload page and display success popup
      reloadMessage = {
        'title' : $('#title').val(),
        'message' : response.message,
        'type' : 'success'
      };

      localStorage.setItem('reload-message', JSON.stringify(reloadMessage));
      window.location.href = '/admin/gallery';

      //Re-enable button
      $('button[type=submit]').attr('disabled', false);
      $('button[type=submit]').html("Utwórz Album");
    });

    this.on("errormultiple", function(files, response) {
      console.log(response);

      //Remove files, in future we should requeue them
      myDropzone.removeAllFiles(true);

      //Show errors
      $('#otherErrors').addClass('invalid-feedback d-block').text(response.errors.file);
      for(error in response.errors) {
        $(`#${error}Help`).append(`<div class='invalid-feedback d-block'>${response.errors[error]}</div>`);
        $(`#${error}`).addClass('is-invalid');
      }

      //Re-enable button
      $('button[type=submit]').attr('disabled', false);
      $('button[type=submit]').html("Utwórz Album");

      //Create pop-up for nice UX
      $(document).Toasts('create', {
      title: 'Wystąpił Błąd!!',
      body: response.message,
      autohide: true,
      delay: 5000,
      class: 'bg-warning',
      });
    });
    }
  }
});

//Set locale fo daterangepicker and initialize it
$(function () {
  moment.locale('pl');
  $('input[name="date"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
  });
});
</script>