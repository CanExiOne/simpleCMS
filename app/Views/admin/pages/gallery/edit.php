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
              <li class="breadcrumb-item"><a href="<?=base_url('/admin')?>">Panel Kontrolny</a></li>
              <li class="breadcrumb-item"><a href="<?=base_url('/admin/gallery')?>">Galeria</a></li>
              <li class="breadcrumb-item active"><?=esc($album['title'])?></li>
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
            <div class="card card-warning">
              <div class="card-header">
                <div>
                  Edytuj Album - <strong><?php echo($album['title'])?></strong>
                </div>
              </div>
              <form id="editAlbum" class="dropzone" method="post" action="/admin/gallery/editAlbum">
                <div class="card-body">
                  <div class="form-row">
                    <div class="form-group col-md-5">
                      <label for="title"><span style="color:red">*</span> Tytuł Albumu</label>

                      <input id="title" type="text" class="form-control" name="title" value="<?php echo($album['title']) ?>" aria-describedby="titleHelp" autocomplete="off">
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
                      <input id="client" type="text" class="form-control" name="client" value="<?php echo($album['client']) ?>" aria-describedby="clientHelp" autocomplete="off">
                      <div id="clientHelp" class="form-text">Podaj nazwę klienta</div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="form-group col-md-2">
                      <label for="date"><span style="color:red">*</span> Data Projektu</label>
                      <div class="input-group date">
                        <input id="date" type="text" name="date" value="<?=esc($album['date'])?>" class="form-control"  aria-describedby="dateHelp" autocomplete="off">
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
                      <textarea name="description" id="description" class="form-control" aria-describedby="descriptionHelp" placeholder="Wpisz opis albumu" autocomplete="off" maxlength="1000" rows="7"><?php echo($album['description']) ?></textarea>
                      <span class="pull-right badge badge-secondary" id="count_message"></span>
                      <div id="descriptionHelp" class="form-text">Podaj opis albumu</div>
                    </div>
                  </div>
                </div>
                <?= csrf_field() ?>
                <div id="otherErrors">

                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-warning">Edytuj Album</button>
                  <button id="removeAlbum" class="btn btn-danger float-right">Usuń Album</button>
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

<script>

//TO-DO
// Option to delete album
// Upload files to server on user uplaod
// Separate form from dropzone
// Send data from form


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

document.addEventListener("DOMContentLoaded", async function() {  

  <?php $images = unserialize($album['pictures']); ?>
  
  <?php echo "var images = ". json_encode($images) ?>

  Dropzone.options.editAlbum = {
    autoProcessQueue : false,
    addRemoveLinks: true,
    dictRemoveFileConfirmation: "Czy na pewno chcesz usunąć ten plik?",
    uploadMultiple: true,
    parallelUploads: 100,
    maxFiles: 100,
    init: function() {
      var myDropzone = this;

      images.forEach(function(image){
        let mockFile = { name: image, size: 12345, isMockFile: true };
        myDropzone.displayExistingFile(mockFile, `/uploads/${image}`);
      });
      
      this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
        e.preventDefault();
        e.stopPropagation();

        if(myDropzone.getQueuedFiles().length === 0)
        {
          var blob = new Blob()
          blob.upload = { 'chunked': myDropzone.options.chunking };
          myDropzone.uploadFile(blob);
        } else {
          myDropzone.processQueue();
        }
      });

      this.on("removedfile", async function(file) {
        if(file.isMockFile)
        {
          name = file.name;

          data = {
            name : name,
            csrf_token : $('input[name=csrf_token]').val(),
            albumid : <?php echo($album['id'])?>,
          }
          $.ajax({
            type: 'POST',
            url: '/admin/gallery/deletePicture',
            dataType: 'json',
            data : JSON.stringify(data),
            processData: true,
            contentType: 'application/json',
          }).done(function(response) {
            //Create Pop-up
            $(document).Toasts('create', {
              title: 'Sukces!!!',
              body: response.message,
              autohide: true,
              delay: 5000,
              class: 'bg-success',
            });

            //Refresh CSRF Token
            $('input[name=csrf_token]').val(response.csrf)
          }).fail(function(response) {
            // Create Pop-up
            $(document).Toasts('create', {
              title: 'Wystąpił Błąd!!',
              body: response.message,
              autohide: true,
              delay: 5000,
              class: 'bg-warning',
            });

            //Refresh CSRF Token
            $('input[name=csrf_token]').val(response.csrf)
          })
        }
      });

      this.on("sendingmultiple", async function(data, xhr, formData) {

        formData.set('id', <?php echo($album['id'])?>)

        //Remove error messages from form
        $('.form-text').each(async function() {
        $(this).children('.invalid-feedback').remove();
        });

        $('input, textarea').removeClass('is-invalid');
        
        $('#otherErrors').text('');

        //Disable button and wait for 2.5 seconds for nice UX (sleep is not working)
        $('button').attr('disabled', true);
        $('button[type=submit]').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> <span class=''>Wysyłanie...</span>");
        await sleep(2500);

      });

      this.on("successmultiple", function(files, response) {
        //Create pop-up for nice UX
        $(document).Toasts('create', {
        title: 'Sukces!!',
        body: response.message,
        autohide: true,
        delay: 5000,
        class: 'bg-success',
        });

        //Refresh CSRF Token
        $('input[name=csrf_token]').val(response.csrf)

        //Re-enable button
        $('button').attr('disabled', false);
        $('button[type=submit]').html("Edytuj Album");
      });

      this.on("errormultiple", function(files, response) {

        //Remove files, in future we should requeue them
        myDropzone.removeAllFiles(true);

        //Show errors
        $('#otherErrors').addClass('invalid-feedback d-block').text(response.message);
        for(error in response.errors) {
          $(`#${error}Help`).append(`<div class='invalid-feedback d-block'>${response.errors[error]}</div>`);
          $(`#${error}`).addClass('is-invalid');
        }

        //Refresh CSRF Token
        $('input[name=csrf_token]').val(response.csrf)
        
        //Re-enable button
        $('button').attr('disabled', false);
        $('button[type=submit]').html("Edytuj Album");

        //Create pop-up for nice UX
        $(document).Toasts('create', {
        title: 'Wystąpił Błąd!!',
        body: response.message,
        autohide: true,
        delay: 5000,
        class: 'bg-warning',
        });
      });

      //Completely delete album
      //I don't know why it's inside dropzone options
      $('#removeAlbum').click(function(e){
        e.preventDefault();
        e.stopPropagation();

        $('#otherErrors').text('');

        data = {
          id : <?php echo($album['id'])?>,
          csrf_token: $('input[name=csrf_token]').val(),
        }

        if(confirm('Usunięcie Albumu jest nieodwracalne! Jesteś pewny?') === true){
          $.ajax({
            type: 'POST',
            url: '/admin/gallery/deleteAlbum',
            dataType: 'json',
            data : JSON.stringify(data),
            processData: true,
            contentType: 'application/json',
          }).done(function(response) {

            //Re-enable button
            $('button').attr('disabled', false);
            
            //Check if response was invalid and if true display errors
            if(response.status === 'invalid')
            {
              //Create Pop-up
              $(document).Toasts('create', {
                title: 'Wystąpił Błąd!',
                body: response.message,
                autohide: true,
                delay: 5000,
                class: 'bg-danger',
              });

              //Display error message
              $('#otherErrors').addClass('invalid-feedback d-block').text(response.message);
            } 
            else if (response.status === 'success')
            {
              //Reload page and display success popup
              reloadMessage = {
                'title' : "Pomyślnie usunięto album <?php echo($album['title'])?>",
                'message' : response.message,
                'type' : 'success'
              };

              localStorage.setItem('reload-message', JSON.stringify(reloadMessage));
              window.location.href = '/admin/gallery';
            } 
            else 
            {
              //Create Pop-up
              $(document).Toasts('create', {
                title: 'Wystąpił Błąd!',
                body: response.message,
                autohide: true,
                delay: 5000,
                class: 'bg-danger',
              });

              //Display error message
              $('#otherErrors').addClass('invalid-feedback d-block').text(response.message);
            }

            //Refresh CSRF Token
            $('input[name=csrf_token]').val(response.csrf)
          }).fail(function(response) {
            //Re-enable button
            $('button').attr('disabled', false);

            //Create Pop-up
            $(document).Toasts('create', {
              title: 'Wystąpił Błąd!',
              body: response.message,
              autohide: true,
              delay: 5000,
              class: 'bg-danger',
            });

            //Display Unknown Error
            $('#otherErrors').addClass('invalid-feedback d-block').text('Wystąpił nieznany błąd! Skontaktuj się z Administratorem Serwera');

            //Refresh CSRF Token
            $('input[name=csrf_token]').val(response.csrf)
          });
        }
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