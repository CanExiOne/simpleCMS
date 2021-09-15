<main>
<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
  <a href="<?=env('app.baseURL')?>/admin" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
    <span class="fs-4"><img src="<?= env('app.baseURL') ?>/theme/img/logo.png" alt="<?= env('app.siteName') ?>" width="120"></span>
  </a>
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <a href="<?=env('app.baseURL')?>/admin" class="nav-link text-white">
        <i width="16" height="16" class="fas fa-home nav-icon"></i>
        Home
      </a>
    </li>
    <li>
      <a href="<?=env('app.baseURL')?>/admin/news" class="nav-link text-white">
        <i width="16" height="16" class="fas fa-newspaper nav-icon"></i>
        Ogłoszenia
      </a>
    </li>
    <li>
      <a href="<?=env('app.baseURL')?>/admin/users" class="nav-link text-white active">
        <i width="16" height="16" class="fas fa-users-cog nav-icon"></i>
        Użytkownicy
      </a>
    </li>
    <li>
      <a href="<?=env('app.baseURL')?>/admin/settings" class="nav-link text-white">
        <i width="16" height="16" class="fas fa-cog nav-icon"></i>
        Ustawienia
      </a>
    </li>
  </ul>
  <hr>
  <div class="dropdown">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
      <img src="https://github.com/mdo.png" alt="" class="rounded-circle me-2" width="32" height="32">
      <strong>mdo</strong>
    </a>
    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
      <li><a class="dropdown-item" href="#">New project...</a></li>
      <li><a class="dropdown-item" href="#">Settings</a></li>
      <li><a class="dropdown-item" href="#">Profile</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="#">Sign out</a></li>
    </ul>
  </div>
</div>
<div style="overflow-y:scroll;" tab-index="0" class="container mt-5">
  <div class="row">
    <div class="col-md">
      <div class="card bg-dark text-white">
        <div class="card-header">
          <h4 class="mt-1">Zarządzanie Użytkownikami</h4>
        </div>
        <div class="card-body" style="background-color:#24282d;">
          <div class="row pb-3 border-bottom border-secondary">
            <div class="col">
            <strong>Poniżej możesz zarządzać użytkownikami oraz utworzyć nowe konta.</strong>
            </br>
            <button type="button" class="mt-3 btn btn-success" data-bs-toggle="modal" data-bs-target="#newUserModal">Nowy Użytkownik</button>
            </div>
          </div>    
          <div class="row pt-3">
            <div class="col">
              <table class="table table-dark table-striped table-bordered table-hover">
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
                        <button type='button' class='m-1 btn btn-warning btn-sm btn-edituser' 
                          data-id='$id' 
                          data-firstName='$firstName' 
                          data-lastName='$lastName' 
                          data-email='$email' 
                          data-group='$group'
                          data-isActive='$isActive'
                          data-bs-toggle='modal' data-bs-target='#editUserModal'>Edytuj</button>

                          <button type='button' class='m-1 btn btn-sm btn-danger btn-deleteuser' 
                          data-id='$id' 
                          data-firstName='$firstName' 
                          data-lastName='$lastName' 
                          data-bs-toggle='modal' data-bs-target='#deleteUserModal'>Usuń</button>
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
    </div>
  </div>
</div>

<div class="modal fade" id="newUserModal" tabindex="-1" aria-labelledby="newUserModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header">
        <h5 class="modal-title" id="newUserModalLabel">Nowy Uzytkownik</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Zamknij"></button>
      </div>
      <div class="modal-body">
        <form id="newUserForm" name="newUserForm">
          <label for="firstName" class="form-label">Imię Użytkownika</label>

            <input type="text" class="form-control" id="firstName" name="firstName" aria-describedby="firstNameHelp">

          <div id="firstNameHelp" class="form-text">Podaj imię użytkownika</div>

          <label for="lastName" class="form-label">Nazwisko Użytkownika</label>

            <input type="text" class="form-control" id="lastName" name="lastName" aria-describedby="lastNameHelp">

          <div id="lastNameHelp" class="form-text">Podaj nazwisko użytkownika</div>

          <label for="email" class="form-label">Adres E-mail</label>

            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">

          <div id="emailHelp" class="form-text">Podaj poprawny adres e-mail użytkownika. Na ten e-mail zostanie wysłany mail z linkiem do aktywowania konta i ustawienia hasła</div>

          <label for="group" class="form-label">Wybierz Grupę Użytkownika</label>
          <select class="form-select" id="group" name="group" aria-label="Wybierz grupę dla użytkownika" aria-describedby="groupHelp">
              <option value="3" selected>Użytkownik</option>
              <option value="2">Moderator</option>
              <option value="1">Administrator</option>
          </select>
          <div id="groupHelp" class="form-text">Grupa dla użytkownika, Administrator ma prawa do wszystkiego, moderator może wstawiać ogłoszenia, a użytkownik(domyślnie) ma tylko dostęp do panelu</div>
        </form>
      </div>
      <div>
        <ul id="modal-response-createUser" class="list-group p-3">

        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
        <button id="createUserSubmit" type="submit" class="btn btn-success">Utwórz Użytkownika</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header">
        <h5 class="modal-title" id="editUserModalLabel">Edytuj Użytkownika</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Zamknij"></button>
      </div>
      <div class="modal-body">
        <form id="editUserForm" name="editUserForm">
          <label for="firstName" class="form-label">Imię Użytkownika</label>

            <input type="text" class="form-control" id="firstName" name="firstName" aria-describedby="firstNameHelp">

          <div id="firstNameHelp" class="form-text">Podaj imię użytkownika</div>

          <label for="lastName" class="form-label">Nazwisko Użytkownika</label>

            <input type="text" class="form-control" id="lastName" name="lastName" aria-describedby="lastNameHelp">

          <div id="lastNameHelp" class="form-text">Podaj nazwisko użytkownika</div>

          <label for="email" class="form-label">Adres E-mail</label>

            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">

          <div id="emailHelp" class="form-text">Podaj poprawny adres e-mail użytkownika.</div>

          <label for="group" class="form-label">Wybierz Grupę Użytkownika</label>
          <select class="form-select" id="group" name="group" aria-label="Wybierz grupę dla użytkownika" aria-describedby="groupHelp">
              <option value="3" selected>Użytkownik</option>
              <option value="2">Moderator</option>
              <option value="1">Administrator</option>
          </select>
          <div id="groupHelp" class="form-text">Grupa dla użytkownika, Administrator ma prawa do wszystkiego, moderator może wstawiać ogłoszenia, a użytkownik(domyślnie) ma tylko dostęp do panelu</div>
        </form>
      </div>
      <div>
        <ul id="modal-response-editUser" class="list-group p-3">

        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
        <button id="editUserSubmit" type="submit" class="btn btn-success">Edytuj Użytkownika</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteUserModalLabel">Usuń Użytkownika</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Zamknij"></button>
      </div>
      <div class="modal-body">
        <form id="deleteUserForm" name="deleteUserForm">
          <label for="password" class="form-label">Podaj Hasło</label>

            <input type="password" class="form-control" id="password" name="password" aria-describedby="passwordHelp">

          <div id="passwordHelp" class="form-text">Podaj poprawny adres e-mail użytkownika.</div>

          <label for="password-confirm" class="form-label">Potwierdź Hasło</label>

            <input type="password" class="form-control" id="password-confirm" name="password-confirm" aria-describedby="password-confirmHelp">

          <div id="password-confirmHelp" class="form-text">Podaj poprawny adres e-mail użytkownika.</div>
        </form>
      </div>
      <div>
        <ul id="modal-response-deleteUser" class="list-group p-3">

        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
        <button id="deleteUserSubmit" type="submit" class="btn btn-danger">Usuń Użytkownika</button>
      </div>
    </div>
  </div>
</div>
</main>

<script>
//Open modal for editing the user with user data already in place
var editUserModal = document.getElementById('editUserModal');

editUserModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget;
  // Extract info from data-bs-* attributes
  var userId = button.getAttribute('data-id');
  var firstName = button.getAttribute('data-firstName');
  var lastName = button.getAttribute('data-lastName');
  var email = button.getAttribute('data-email');
  var group = button.getAttribute('data-group');
  var isActive = button.getAttribute('data-isActive');
  // Update the modal's content.
  var modalTitle = editUserModal.querySelector('.modal-title');
  var modalFirstName = editUserModal.querySelector('.modal-body #firstName');
  var modalLastName = editUserModal.querySelector('.modal-body #lastName');
  var modalEmail = editUserModal.querySelector('.modal-body #email');
  var modalGroup = editUserModal.querySelector('.modal-body #group');
  // var modalIsActive = editUserModal.querySelector('.modal-body #firstName');
  // var modalID = editUserModal.querySelector('.modal-body #firstName');

  modalTitle.textContent = 'Edytuj Użytkownika - ' + firstName + ' ' + lastName + ' ID:' + userId;
  modalFirstName.value = firstName;
  modalLastName.value = lastName;
  modalEmail.value = email;
  modalGroup.value = group;

  document.querySelector("#editUserSubmit").setAttribute("data-userId", userId);
});

//Modal to delete user
var deleteUserModal = document.getElementById('deleteUserModal');

deleteUserModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget;
  // Extract info from data-bs-* attributes
  var userId = button.getAttribute('data-id');
  var firstName = button.getAttribute('data-firstName');
  var lastName = button.getAttribute('data-lastName');

  var modalTitle = deleteUserModal.querySelector('.modal-title');

  modalTitle.textContent = 'Potwierdź Usunięcie Użytkownika - ' + firstName + ' ' + lastName + ' ID:' + userId;

  document.querySelector("#deleteUserSubmit").setAttribute("data-userId", userId);
});

//Clear user ID attribute from submit button
deleteUserModal.addEventListener('hide.bs.modal', function (event) {
  document.querySelector("#deleteUserSubmit").removeAttribute("data-userId");
});

//Clear user ID attribute from submit button
editUserModal.addEventListener('hide.bs.modal', function (event) {
  document.querySelector("#editUserSubmit").removeAttribute("data-userId");
});

//Create User and get response
document.getElementById("createUserSubmit").addEventListener("click", function(event) {
  
  event.preventDefault();

  document.querySelectorAll(".response-message").forEach(e => e.remove());

  console.log("clicked!")

  document.getElementById('createUserSubmit').disabled = true;

  //Get form data
  let formData = new FormData(newUserForm);

  //Send the data
  fetch('<?=env('app.baseURL')?>/admin/users/createUser', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json',
          'X-Requested-With': 'XMLHttpRequest'
      },
      body: JSON.stringify(Object.fromEntries(formData)),
      }).then(function (response) {
          if (response.ok) {
              return response.json();
          }
          return Promise.reject(response);
      }).then(function (data) {
          console.log(data);

          if(data.status === 'success')
          {
            el = document.getElementById('modal-response-createUser');

            el.insertAdjacentHTML('afterbegin', "<li class='response-message list-group-item list-group-item-success'>"+ data.message +"</li>");
          } else 
          {
            //Create an element for the response
            el = document.getElementById('modal-response-createUser');

            errors = data.message;

            for (const [key, value] of Object.entries(errors)) {
              el.insertAdjacentHTML('afterbegin', "<li class='response-message list-group-item list-group-item-danger'>"+ value +"</li>");
            }
          }

          //Enable button
          document.getElementById('createUserSubmit').disabled = false;
      }).catch(function (error) {
          console.warn(error);
      });
});

//Edit User and get response
document.getElementById("editUserSubmit").addEventListener("click", function(event) {
  
  event.preventDefault();

  document.querySelectorAll(".response-message").forEach(e => e.remove());

  document.getElementById('editUserSubmit').disabled = true;

  //Get form data
  let formData = new FormData(editUserForm);

  userId = document.querySelector('#editUserSubmit').getAttribute("data-userId");

  formData.append('id', userId)

  //Send the data
  fetch('<?=env('app.baseURL')?>/admin/users/updateUser', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json',
          'X-Requested-With': 'XMLHttpRequest'
      },
      body: JSON.stringify(Object.fromEntries(formData)),
      }).then(function (response) {
          if (response.ok) {
              return response.json();
          }
          return Promise.reject(response);
      }).then(function (data) {
          console.log(data);

          if(data.status === 'success')
          {
            el = document.getElementById('modal-response-editUser');

            el.insertAdjacentHTML('afterbegin', "<li class='response-message list-group-item list-group-item-success'>"+ data.message +"</li>");
          } else 
          {
            //Create an element for the response
            el = document.getElementById('modal-response-editUser');

            errors = data.message;

            for (const [key, value] of Object.entries(errors)) {
              el.insertAdjacentHTML('afterbegin', "<li class='response-message list-group-item list-group-item-danger'>"+ value +"</li>");
            }
          }

          //Enable button
          document.getElementById('editUserSubmit').disabled = false;
      }).catch(function (error) {
        console.log(error);
      });
});

//Delete User and get response
document.getElementById("deleteUserSubmit").addEventListener("click", function(event) {
  
  event.preventDefault();

  document.querySelectorAll(".response-message").forEach(e => e.remove());

  document.getElementById('deleteUserSubmit').disabled = true;

  //Get form data
  let formData = new FormData(deleteUserForm);

  userId = document.querySelector('#deleteUserSubmit').getAttribute("data-userId");

  formData.append('userId', userId)

  //Send the data
  fetch('<?=env('app.baseURL')?>/admin/users/deleteUser', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json',
          'X-Requested-With': 'XMLHttpRequest'
      },
      body: JSON.stringify(Object.fromEntries(formData)),
      }).then(function (response) {
          if (response.ok) {
              return response.json();
          }
          return Promise.reject(response);
      }).then(function (data) {
          console.log(data);

          if(data.status === 'success')
          {
            el = document.getElementById('modal-response-deleteUser');

            el.insertAdjacentHTML('afterbegin', "<li class='response-message list-group-item list-group-item-success'>"+ data.message +"</li>");
          } else 
          {
            //Create an element for the response
            el = document.getElementById('modal-response-deleteUser');

            errors = data.message;

            for (const [key, value] of Object.entries(errors)) {
              el.insertAdjacentHTML('afterbegin', "<li class='response-message list-group-item list-group-item-danger'>"+ value +"</li>");
            }
          }

          //Enable button
          document.getElementById('deleteUserSubmit').disabled = false;
      }).catch(function (error) {
        console.log(error);
      });
});
</script>