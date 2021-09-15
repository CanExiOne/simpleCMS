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
      <a href="<?=env('app.baseURL')?>/admin/news" class="nav-link text-white active">
        <i width="16" height="16" class="fas fa-newspaper nav-icon"></i>
        Ogłoszenia
      </a>
    </li>
    <li>
      <a href="<?=env('app.baseURL')?>/admin/users" class="nav-link text-white">
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
          <h4 class="mt-1">Zarządzanie Ogłoszeniami</h4>
        </div>
        <div class="card-body" style="background-color:#24282d;">
          <div class="row pb-3 border-bottom border-secondary">
            <div class="col">
            <strong>Poniżej możesz zarządzać ogłoszeniami oraz utworzyć nowe.</strong>
            </br>
            <button type="button" class="mt-3 btn btn-success" data-bs-toggle="modal" data-bs-target="#createNewsModal">Nowe Ogłoszenie</button>
            </div>
          </div>    
          <div class="row pt-3">
            <div class="col">
              <table class="table table-dark table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th style="width:2%">ID</th>
                    <th style="width:auto">Tytuł</th>
                    <th style="width:auto">Slug</th>
                    <th style="width:12%">Autor</th>
                    <th style="width:auto">Data Publikacji</th>
                    <th style="width:12%">Opcje</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Create for each loop to display all news -->
                  <?php
                    helper('text');
                    foreach($newsList as $news):
                      if(!$news['deleted_at'])
                      {
                        extract($news);

                        //Get the name of the author
                        $firstName = array_column($users, 'firstName');
                        $lastName = array_column($users, 'lastName');

                        //Substract 1 from the selected entry in array so it actually shows the correct name
                        $authorName = $firstName[$authorID-1] . ' ' . $lastName[$authorID-1];

                        $contentShort = word_limiter($content, 10);

                        echo(
                          "<tr>
                          <th style='width:2%'>$id</th>
                          <td style='width:auto'>$title</td>
                          <td style='width:auto'>$slug</td>
                          <td style='width:12%'>$authorName</td>
                          <td style='width:auto'>$created_at</td>
                          <td style='width:12%;' class='text-center'>
                          <button type='button' class='m-1 btn btn-warning btn-sm btn-editnews' 
                            data-id='$id' 
                            data-postTitle='$title' 
                            data-slug='$slug' 
                            data-postContent='$content' 
                            data-postDelta='$delta' 
                            data-authorID='$authorID'
                            data-published='$created_at'
                            data-bs-toggle='modal' data-bs-target='#editNewsModal'>Edytuj</button>

                            <button type='button' class='m-1 btn btn-sm btn-danger btn-deletenews' 
                            data-id='$id' 
                            data-postTitle='$title' 
                            data-postBody='$content'
                            data-bs-toggle='modal' data-bs-target='#deleteNewsModal'>Usuń</button>
                          </td>
                        </tr>"
                        );
                      }
                    
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

<div class="modal fade" id="createNewsModal" tabindex="-1" aria-labelledby="createNewsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header">
        <h5 class="modal-title" id="createNewsModalLabel">Nowe Ogłoszenie</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Zamknij"></button>
      </div>
      <div class="modal-body">
        <form id="createNewsForm" name="createNewsForm" accept-charset="utf-8">
          <label for="title" class="form-label">Tytuł Ogłoszenia</label>

            <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp">

          <div id="titleHelp" class="form-text">Podaj nazwę ogłoszenia</div>

          <label for="editor-create" class="mt-3 form-label">Zawartość Ogłoszenia</label>

          <div id="editor-create" class="bg-light text-dark">
            <div id="editor-container-create" tab-index="0" style="height:400px">
            </div>
            <div class="editor-counter"></div>
          </div>

        </form>
      </div>
      <div>
        <ul id="modal-response-createNews" class="list-group p-3">

        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
        <button id="createNewsSubmit" type="submit" class="btn btn-success">Napisz Ogłoszenie</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="editNewsModal" tabindex="-1" aria-labelledby="editNewsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content bg-dark text-white">
    <div class="modal-header">
        <h5 class="modal-title" id="editNewsModalLabel">Edytuj Ogłoszenie</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Zamknij"></button>
      </div>
      <div class="modal-body">
        <form id="editNewsForm" name="editNewsForm" accept-charset="utf-8">
          <label for="title" class="form-label">Tytuł Ogłoszenia</label>

            <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp">

          <div id="titleHelp" class="form-text">Podaj nazwę ogłoszenia</div>

          <label for="editor-edit" class="mt-3 form-label">Zawartość Ogłoszenia</label>

          <div id="editor-edit" class="bg-light text-dark">
            <div id="editor-container-edit" tab-index="0" style="height:400px">
            </div>
            <div class="editor-counter"></div>
          </div>

        </form>
      </div>
      <div>
        <ul id="modal-response-editNews" class="list-group p-3">

        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
        <button id="editNewsSubmit" type="submit" class="btn btn-success">Edytuj Ogłoszenie</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="deleteNewsModal" tabindex="-1" aria-labelledby="deleteNewsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteNewsModalLabel">Usuń Ogłoszenie</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Zamknij"></button>
      </div>
      <div class="modal-body">
        <form id="deleteNewsForm" name="deleteNewsForm">
          <label for="password" class="form-label">Podaj Hasło</label>

            <input type="password" class="form-control" id="password" name="password" aria-describedby="passwordHelp">

          <div id="passwordHelp" class="form-text">Podaj swoje hasło w celu weryfikacji tej akcji.</div>

          <label for="password-confirm" class="form-label">Potwierdź Hasło</label>

            <input type="password" class="form-control" id="password-confirm" name="password-confirm" aria-describedby="password-confirmHelp">

          <div id="password-confirmHelp" class="form-text">Potwierdź swoje hasło.</div>
        </form>
      </div>
      <div>
        <ul id="modal-response-deleteNews" class="list-group p-3">

        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
        <button id="deleteNewsSubmit" type="submit" class="btn btn-danger">Usuń Ogłoszenie</button>
      </div>
    </div>
  </div>
</div>
</main>

<script>
//Initialize Quill, it's an WYSIWYG Editor
var options = {
  debug: 'warn',
  modules: {
    counter: {
      container: ".editor-counter",
      unit: "letter",
    },
    toolbar: [
      [{ header: [1, 2, false] }],
      ['bold', 'italic', 'underline'],
      ['image', 'code-block']
    ]
  },
  placeholder: 'Compose an epic...',
  theme: 'snow'
};

var quill = new Quill('#editor-container-create', options);

var editQuill = new Quill('#editor-container-edit', options);

//Open modal for editing the user with user data already in place
var editNewsModal = document.getElementById('editNewsModal');

editNewsModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget;

  // Extract info from data-bs-* attributes
  var postId = button.getAttribute('data-id');
  var postTitle = button.getAttribute('data-postTitle');
  var postBody = button.getAttribute('data-postBody');
  var postDelta = button.getAttribute('data-postDelta');

  // Update the modal's content.
  var modalTitle = editNewsModal.querySelector('.modal-title');
  var modalPostTitle = editNewsModal.querySelector('.modal-body #title');
  
  editQuill.setContents(JSON.parse(postDelta));

  modalTitle.textContent = 'Edytuj Post - ' + postTitle;
  modalPostTitle.value = postTitle;

  document.querySelector("#editNewsSubmit").setAttribute("data-postId", postId);
});

//Modal to delete user
var deleteNewsModal = document.getElementById('deleteNewsModal');

deleteNewsModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget;
  // Extract info from data-bs-* attributes
  var postId = button.getAttribute('data-id');
  var postTitle = button.getAttribute('data-postTitle');

  var modalTitle = deleteNewsModal.querySelector('.modal-title');

  modalTitle.textContent = 'Potwierdź Usunięcie Ogłoszenia - ' + postTitle + ' ID:' + postId;

  document.querySelector("#deleteNewsSubmit").setAttribute("data-postId", postId);
});

//Clear user ID attribute from submit button
deleteNewsModal.addEventListener('hide.bs.modal', function (event) {
  document.querySelector("#deleteNewsSubmit").removeAttribute("data-userId");
});

//Clear user ID attribute from submit button
editNewsModal.addEventListener('hide.bs.modal', function (event) {
  document.querySelector("#editNewsSubmit").removeAttribute("data-userId");
});

//Create User and get response
document.getElementById("createNewsSubmit").addEventListener("click", function(event) {
  
  event.preventDefault();

  document.querySelectorAll(".response-message").forEach(e => e.remove());

  document.getElementById('createNewsSubmit').disabled = true;

  //Get form data
  let formData = new FormData(createNewsForm);

  var postBody = quill.root.innerHTML;

  var editorDelta = quill.getContents();

  formData.append('postBody', postBody);

  formData.append('editorDelta', JSON.stringify(editorDelta));

  console.log(Object.fromEntries(formData));

  //Send the data
  fetch('<?=env('app.baseURL')?>/admin/news/createNews', {
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
            el = document.getElementById('modal-response-createNews');

            el.insertAdjacentHTML('afterbegin', "<li class='response-message list-group-item list-group-item-success'>"+ data.message +"</li>");
          } else 
          {
            //Create an element for the response
            el = document.getElementById('modal-response-createNews');

            errors = data.message;

            for (const [key, value] of Object.entries(errors)) {
              el.insertAdjacentHTML('afterbegin', "<li class='response-message list-group-item list-group-item-danger'>"+ value +"</li>");
            }
          }

          //Enable button
          document.getElementById('createNewsSubmit').disabled = false;
      }).catch(function (error) {
          console.warn(error);
      });
});

//Edit User and get response
document.getElementById("editNewsSubmit").addEventListener("click", function(event) {
  
  event.preventDefault();

  document.querySelectorAll(".response-message").forEach(e => e.remove());

  document.getElementById('editNewsSubmit').disabled = true;

  //Get form data
  let formData = new FormData(editNewsForm);

  var postBody = editQuill.root.innerHTML;

  var editorDelta = editQuill.getContents();

  formData.append('postBody', postBody);

  formData.append('editorDelta', JSON.stringify(editorDelta));

  postId = document.querySelector('#editNewsSubmit').getAttribute("data-postId");

  formData.append('postId', postId)

  console.log(Object.fromEntries(formData));

  //Send the data
  fetch('<?=env('app.baseURL')?>/admin/news/editNews', {
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
            el = document.getElementById('modal-response-editNews');

            el.insertAdjacentHTML('afterbegin', "<li class='response-message list-group-item list-group-item-success'>"+ data.message +"</li>");
          } else 
          {
            //Create an element for the response
            el = document.getElementById('modal-response-editNews');

            errors = data.message;

            for (const [key, value] of Object.entries(errors)) {
              el.insertAdjacentHTML('afterbegin', "<li class='response-message list-group-item list-group-item-danger'>"+ value +"</li>");
            }
          }

          //Enable button
          document.getElementById('editNewsSubmit').disabled = false;
      }).catch(function (error) {
          console.warn(error);
      });
});

//Delete User and get response
document.getElementById("deleteNewsSubmit").addEventListener("click", function(event) {
  
  event.preventDefault();

  document.querySelectorAll(".response-message").forEach(e => e.remove());

  document.getElementById('deleteNewsSubmit').disabled = true;

  //Get form data
  let formData = new FormData(deleteNewsForm);

  postId = document.querySelector('#deleteNewsSubmit').getAttribute("data-postId");

  formData.append('postId', postId)

  //Send the data
  fetch('<?=env('app.baseURL')?>/admin/news/deleteNews', {
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
            el = document.getElementById('modal-response-deleteNews');

            el.insertAdjacentHTML('afterbegin', "<li class='response-message list-group-item list-group-item-success'>"+ data.message +"</li>");
          } else 
          {
            //Create an element for the response
            el = document.getElementById('modal-response-deleteNews');

            errors = data.message;

            for (const [key, value] of Object.entries(errors)) {
              el.insertAdjacentHTML('afterbegin', "<li class='response-message list-group-item list-group-item-danger'>"+ value +"</li>");
            }
          }

          //Enable button
          document.getElementById('deleteNewsSubmit').disabled = false;
      }).catch(function (error) {
        console.log(error);
      });
});
</script>