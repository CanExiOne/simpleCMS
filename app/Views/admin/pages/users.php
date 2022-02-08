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
            <a href="<?=base_url('/admin/users')?>" class="nav-link active">
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
            <h1 class="m-0">Użytkownicy</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=base_url('/admin')?>">Panel Kontrolny</a></li>
              <li class="breadcrumb-item active">Użytkownicy</li>
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
          <div class="col-sm-12">
            <div class="card card-success">
              <div class="card-header d-flex">
                <div id="userEditorTitle" class="mt-auto mb-auto">
                Utwórz Użytkownika
                </div>
                <div class="ml-auto">
                  <button class="btn btn-transparent text-white" data-toggle="collapse" data-target=".user-collapse"><i class="far fa-eye"></i></button>
                </div>
              </div>
              <form id="userForm" class="display user-collapse show" method="post" action="<?=env('app.baseURL')?>/admin/users/createUser" data-action-type="create" novalidate>
                <div class="card-body">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <input id="userId" type="hidden" value="0" readonly/>
                      <label for="firstName">Imię Użytkownika</label>

                      <input id="firstName" type="text" class="form-control" name="userFirstName" aria-describedby="firstNameHelp" autocomplete="off">
                      <div id="firstNameHelp" class="form-text">Podaj imię użytkownika</div>

                    </div>
                    <div class="form-group col-md-6">
                      <label for="lastName">Nazwisko Użytkownika</label>

                      <input id="lastName" type="text" class="form-control" name="userLastName" aria-describedby="lastNameHelp" autocomplete="off">
                      <div id="lastNameHelp" class="form-text">Podaj nazwisko użytkownika</div>

                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="userEmail">Adres E-mail</label>

                    <input id="userEmail" type="email" class="form-control" name="userEmail" aria-describedby="userEmailHelp" autocomplete="off">
                    <div id="userEmailHelp" class="form-text">Podaj adres e-mail użytkownika</div>

                  </div>
                  <div class="form-group">
                    <label for="userGroup">Wybierz Grupę Użytkownika</label>
                    <select class="form-control col-md-3" id="userGroup" name="userGroup" aria-label="Wybierz grupę dla użytkownika" aria-describedby="userGroupHelp">
                        <option value="3" selected>Użytkownik</option>
                        <option value="2">Moderator</option>
                        <option value="1">Administrator</option>
                    </select>
                    <div id="userGroupHelp" class="form-text">Wybierz grupę dla użytkownika</div>

                  </div>
                  <?= csrf_field() ?>

                  <div id="otherErrors" class="form-group"></div>
                </div>
                <div class="card-footer">
                  <button id="createUser" class="btn btn-success">Utwórz Użytkownika</button>
                  <button id="editUser" class="btn btn-warning d-none" disabled>Edytuj Użytkownika</button>
                  <button type="button" id="cancelEdit" class="btn btn-danger d-none" disabled>Anuluj</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-sm-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-sm-12">
            <div class="card card-primary">
              <div class="card-header">
                Lista Użytkowników
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-12">
                    <table id="usersTable" class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th style="width:2%">ID</th>
                          <th style="width:auto">Imię</th>
                          <th style="width:auto">Nazwisko</th>
                          <th style="width:auto">E-mail</th>
                          <th style="width:5%">Grupa</th>
                          <th style="width:5%">Aktywny</th>
                          <th style="width:12%">Opcje</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- Create for each loop to display all users -->
                        <?php
                          foreach($users as $user):
                            extract($user);

                            if($id == $_SESSION['userId'])
                            {
                              continue;
                            }

                            echo(
                              "<tr>
                              <th style='width:2%'>$id</th>
                              <td style='width:auto'>$firstName</td>
                              <td style='width:auto'>$lastName</td>
                              <td style='width:auto'>$email</td>
                              <td style='width:5%'>$group</td>
                              <td style='width:5%'>$isActive</td>
                              <td style='width:12%;' class='text-center'>
                              <button type='button' class='editUser m-1 btn btn-warning btn-sm' 
                                data-id='$id' 
                                data-firstName='$firstName' 
                                data-lastName='$lastName' 
                                data-email='$email' 
                                data-group='$group'
                                data-isActive='$isActive'>Edytuj</button>

                                <button type='button' class='deleteUser m-1 btn btn-sm btn-danger' 
                                data-id='$id' 
                                data-firstName='$firstName' 
                                data-lastName='$lastName'>Usuń</button>
                              </td>
                            </tr>"
                            );
                          
                          endforeach;

                        ?>
                      </tbody>
                    </table> 
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-sm-12 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Delete User Confirmation Modal -->
  <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h5 class="modal-title" id="deleteUserModalTitle">Usuwanie Użytkownika</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="deleteUser" action="<?=env('app.baseURL')?>/admin/users/deleteUser" method="post" novalidate>
            <div class="form-row">
              <div class="form-group col">
              <input id="userIdDelete" type="hidden" value="0" readonly/>
                <label for="confirmPassword">
                  Potwierdź Hasło
                </label>
                <input id="confirmPassword" class="form-control" type="password" name="confirmPassword" aria-describedby="confirmPasswordHelp" autocomplete="off">
                <div id="confirmPasswordHelp" class="form-text">Potwierdź usunięcie użytkownika podając swoje hasło</div>
              </div>
              <?= csrf_field() ?>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
          <button id="deleteUserConfirm" type="button" class="btn btn-primary">Potwierdź</button>
        </div>
      </div>
    </div>
  </div>

<script>
$(document).ready(function() {
  //Create data table with all users
  $('#usersTable').DataTable({
    "order" : [[0, 'desc']],
  });

  //Change button icon on collapse
  $('.new-user-collapse')
    .on('hide.bs.collapse', function () {
      $(this)
            .parent()
            .find(".fa-eye")
            .removeClass("fa-eye")
            .addClass("fa-eye-slash");
    })
    .on('show.bs.collapse', function () {
      $(this)
            .parent()
            .find(".fa-eye-slash")
            .removeClass("fa-eye-slash")
            .addClass("fa-eye");
    });

  if(localStorage.getItem('reload-message'))
  {
    toastData = JSON.parse(localStorage.getItem('reload-message'))

    console.log(toastData);

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

$('.deleteUser').click(function() {
  $('#deleteUserModal').modal('show');

  $('#confirmPassword').val('');
  $('#userIdDelete').val($(this).attr('data-id'));
  $('#deleteUserModalTitle').text("Potwierdź Usunięcie Użytkownika - " + $(this).attr('data-firstName') + " " + $(this).attr('data-lastName') + " - ID:" + $(this).attr('data-id'));
})

$('.editUser').click(function() {
  //Change User Form Header
  $('#userEditorTitle')
    .text("Edytuj Użytkownika - " + $(this).attr('data-firstName') + " " + $(this).attr('data-lastName') + " - ID:" + $(this).attr('data-id')) 
    .parent()
    .parent()
    .removeClass("card-success")
    .addClass("card-warning")

  //Change button and assign attributes to it
  if(!$('#createUser').hasClass('d-none'))
  {
    $('#createUser').addClass('d-none')
  }

  if($('#editUser').hasClass('d-none'))
  {
    $('#editUser').removeClass('d-none')
    $('#cancelEdit').removeClass('d-none')
  }
  
  $('#editUser').attr('data-postId', $(this).attr('data-id'));


  //Disable create button and enable edit button
  $('#createUser').attr('disabled', true);

  $('#editUser').attr('disabled', false);
  $('#cancelEdit').attr('disabled', false);

  $('#userForm').attr('action', "<?=env('app.baseURL')?>/admin/users/updateUser");

  //Populate User Form Contents
  $('#userId').val($(this).attr('data-id'));
  $('#firstName').val($(this).attr('data-firstname'));
  $('#lastName').val($(this).attr('data-lastname'));
  $('#userEmail').val($(this).attr('data-email'));
  $('#userGroup').val($(this).attr('data-group'));

  //Check if card is collapsed, if true then show it
  if(!$('.editor-collapse').collapse('show'))
  {
    $('editor.collapse').collapse('show')
  }

  //Set current state of form to allow for easier handling of submit buttons
  $('#userForm').attr('data-action-type', 'edit');

  $(window).scrollTop(0)
});

$('#cancelEdit').click(function() {
  //Change User Form Header
  $('#userEditorTitle')
    .text("Utwórz Użytkownika") 
    .parent()
    .parent()
    .removeClass("card-warning")
    .addClass("card-success")

  //Change button and remove attributes from it
  if($('#createUser').hasClass('d-none'))
  {
    $('#createUser').removeClass('d-none')
  }

  if(!$('#editUser').hasClass('d-none'))
  {
    $('#editUser').addClass('d-none')
    $('#cancelEdit').addClass('d-none')
  }
  
  $('#editUser').attr('data-postId', '');


  //Disable edit button and enable create button
  $('#createUser').attr('disabled', false);

  $('#editUser').attr('disabled', true);
  $('#editUser').attr('disabled', true);

  $('#userForm').attr('action', "<?=env('app.baseURL')?>/admin/users/createUser");

  //Clear User Form
  $('#userId').val('');
  $('#firstName').val('');
  $('#lastName').val('');
  $('#userEmail').val('');
  $('#userGroup').val('3');

  //Set current state of form to allow for easier handling of submit buttons
  $('#userForm').attr('data-action-type', 'create');
});

//Remove user after confirming admin password
$(function() {
  $('#deleteUserConfirm').click(function(event) {
    event.preventDefault();

    //Disable Button
    $('#deleteUserConfirm').attr('disabled', true);

    //Restore state of input help
    $('#confirmPasswordHelp').replaceWith('<div id="confirmPasswordHelp" class="form-text">Potwierdź usunięcie użytkownika podając swoje hasło</div>');
    $('#confirmPassword').removeClass('is-invalid');

    var form = document.querySelector('#deleteUser');

    formData = new FormData(form);

    formData.set('userId', $('#userIdDelete').val());

    $.ajax({
      type: form.getAttribute('method'),
      url: form.getAttribute('action'),
      data: formData,
      processData: false,
      contentType: false,
    }).done(function(data) {
      //Parse data to json for easier response handling
      var data = JSON.parse(data);

      //Re-enable button but first check form state
        $('#deleteUserConfirm').attr('disabled', false);

        console.log(data);
      
      //Check if response was invalid and if true display errors
      if(data.status === 'invalid')
      {
        if(data.errors.confirmPassword)
        {
          $('#confirmPasswordHelp').addClass('invalid-feedback d-block').text(data.errors.confirmPassword);
          $('#confirmPassword').addClass('is-invalid');
        }

        console.log(data.errors);
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
        $('#deleteUserConfirm').attr('disabled', false);

      
      $('#confirmPassword').addClass('invalid-feedback d-block').text('Wystąpił nieznany błąd! Skontaktuj się z Administratorem Serwera');
    });
  })
})

//Send data to server on user create or edit
$(function() {
  $('form').submit(function(event) {
    event.preventDefault();

    //Restore #titleHelp and #otherErrors state in case it was edited to show error before
    $('#firstNameHelp').replaceWith('<div id="firstNameHelp" class="form-text">Podaj imię użytkownika</div>');
    $('#lastNameHelp').replaceWith('<div id="lastNameHelp" class="form-text">Podaj nazwisko użytkownika</div>');
    $('#userEmailHelp').replaceWith('<div id="userEmailHelp" class="form-text">Podaj adres e-mail użytkownika</div>');
    $('#userGroupHelp').replaceWith('<div id="userGroupHelp" class="form-text">Wybierz grupę dla użytkownika</div>');
    $('#otherErrors').replaceWith('<div id="otherErrors" class="form-group"></div>');

    //Disable button but first check form state
    if($('#userForm').attr('data-action-type') === 'create')
    {
      $('#createUser').attr('disabled', true);
    } else {
      $('#editUser').attr('disabled', true)
    }

    //Get form and create FormData, using DOM because FormData() get's angry about jquery
    var form = document.querySelector('#userForm');

    formData = new FormData(form);

    //Append to FormData user id if editing user
    if($('#userForm').attr('data-action-type') === 'edit')
    {
      formData.set('userId', $('#userId').val())
    }
    $.ajax({
      type: form.getAttribute('method'),
      url: form.getAttribute('action'),
      data: formData,
      processData: false,
      contentType: false,
    }).done(function(data) {
      //Parse data to json for easier response handling
      var data = JSON.parse(data);

      //Re-enable button but first check form state
      if($('#userForm').attr('data-action-type') === 'create')
      {
        $('#createUser').attr('disabled', false);
      } else {
        $('#editUser').attr('disabled', false)
      }
      
      //Check if response was invalid and if true display errors
      if(data.status === 'invalid')
      {
        if(data.errors.userFirstName)
        {
          $('#firstNameHelp').addClass('invalid-feedback d-block').text(data.errors.userFirstName);
          $('#firstName').addClass('is-invalid');
        } 
        if(data.errors.userLastName)
        {
          $('#lastNameHelp').addClass('invalid-feedback d-block').text(data.errors.userLastName);
          $('#lastName').addClass('is-invalid');
        } 
        if(data.errors.userEmail)
        {
          $('#userEmailHelp').addClass('invalid-feedback d-block').text(data.errors.userEmail);
          $('#userEmail').addClass('is-invalid');
        } 
        if(data.errors.userGroup)
        {
          $('#userGroupHelp').addClass('invalid-feedback d-block').text(data.errors.userGroup);
          $('#userGroup').addClass('is-invalid');
        } 

        console.log(data.errors);
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
      //Re-enable button but first check form state
      if($('#userForm').attr('data-action-type') === 'create')
      {
        $('#createUser').attr('disabled', false);
      } else {
        $('#editUser').attr('disabled', false)
      }
      
      $('#otherErrors').addClass('invalid-feedback d-block').text('Wystąpił nieznany błąd! Skontaktuj się z Administratorem Serwera');
    });
  });
});
</script>