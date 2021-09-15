<main>
<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
  <a href="<?=env('app.baseURL')?>/admin" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
    <span class="fs-4"><img src="<?= env('app.baseURL') ?>/theme/img/logo.png" alt="<?= env('app.siteName') ?>" width="120"></span>
  </a>
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <a href="<?=env('app.baseURL')?>/admin" class="nav-link text-white active" aria-current="page">
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
<div class="container mt-5">
  <div class="row">
    <div class="col-md">
      <div class="card bg-dark text-white">
        <div class="card-header">
          Panel Administracyjny
        </div>
        <div class="card-body" style="background-color:#24282d;">
            Witaj w Panelu Administratora, wybierz menu po lewej aby zacząć edytować stronę :).
        </div>
      </div>
    </div>
  </div>
</div>
</main>

<!-- <form id="myForm" name="myForm">
    <label for="firstName" class="form-label">firstName</label>
    <input type="text" class="form-control" id="firstName" name="firstName" aria-describedby="firstNameHelp">
    <div id="firstNameHelp" class="form-text">firstName</div>
    <label for="lastName" class="form-label">lastName</label>
    <input type="text" class="form-control" id="lastName" name="lastName" aria-describedby="lastNameHelp">
    <div id="lastNameHelp" class="form-text">lastName</div>
    <label for="email" class="form-label">email</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">email</div>
    <select class="form-select" id="group" name="group" aria-label="Default select example">
        <option selected>Open this select menu</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select>
  <button type="submit" id="submitForm" class="btn btn-primary">Submit</button>

  'firstName' => $this->request->getPost('firstName'),
                        'lastName' => $this->request->getPost('lastName'),
                        'email' => $this->request->getPost('email'),
                        'password' => $pwd_hash,
                        'group' => $this->request->getPost('group')
</form> -->

<script>
document.addEventListener('submit', function (event) {

event.preventDefault();

//Get form data
let formData = new FormData(myForm);

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
    }).catch(function (error) {
        console.warn(error);
    });
});
</script>