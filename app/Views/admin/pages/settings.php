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
      <a href="<?=env('app.baseURL')?>/admin/users" class="nav-link text-white">
        <i width="16" height="16" class="fas fa-users-cog nav-icon"></i>
        Użytkownicy
      </a>
    </li>
    <li>
      <a href="<?=env('app.baseURL')?>/admin/settings" class="nav-link text-white active">
        <i width="16" height="16" class="fas fa-cog nav-icon"></i>
        Ustawienia
      </a>
    </li>
  </ul>
  <hr>
  <div class="dropdown">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
      <img src="/uploads/avatars/avatar_placeholder.png" alt="" class="rounded-circle me-2" width="32" height="32">
      <strong><?php echo($_SESSION['username']); ?></strong>
    </a>
    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
      <li><a class="dropdown-item" href="/admin/logout">Wyloguj się</a></li>
    </ul>
  </div>
</div>
<div style="overflow-y:scroll;" class="container mt-5">
  <div class="row">
    <div class="col-md">
      <div class="card bg-dark text-white">
        <div class="card-header">
          <h4 class="mt-1">Zarządzanie Ustawieniami</h4>
        </div>
        <div class="card-body" style="background-color:#24282d;">
          <div class="row pb-3 border-bottom border-secondary">
            <div class="col">
            <strong>Tutaj możesz zmienić ustawienia swojej strony.</strong>
            </br>
            <form id='updateSettings' name='updateSettings' autocomplete="off">
              <label for="baseURL" class="form-label">Adres Strony</label>

                <input type="text" class="form-control" id="baseURL" name="baseURL" value="<?php echo($cfg['baseURL'])?>" aria-describedby="baseURLHelp">

              <div id="baseURLHelp" class="form-text">Podaj adres strony, jeśli posiadasz certyfikat ssl to skorzystaj z https://, przykład: https://domena.pl.</div>
              
              <label for="siteName" class="form-label">Nazwa Strony</label>

                <input type="text" class="form-control" id="siteName" name="siteName" value="<?php echo($cfg['siteName'])?>" aria-describedby="siteNameHelp">

              <div id="siteNameHelp" class="form-text">Podaj nazwę strony</div>

              <label for="siteLogo" class="form-label">Logo Strony</label>

                <input type="file" class="form-control" id="siteLogo" name="siteLogo" aria-describedby="siteLogoHelp"/>

              <div id="siteLogoHelp" class="form-text">Wyślij nowe logo strony</div>
              
              <h3 class='mt-3'>Ustawienia E-mail</h3>

              <label for="emailHost" class="form-label">Serwer E-mail</label>

                <input type="text" class="form-control" id="emailHost" name="emailHost" value="<?= getenv('email.host') ?>" aria-describedby="emailHostHelp" autocomplete="off">

              <div id="emailHostHelp" class="form-text">Podaj adres hosta konta pocztowego</div>
              
              <label for="emailUsername" class="form-label">Login E-mail</label>

                <input type="text" class="form-control" id="emailUsername" name="emailUsername" value="<?= getenv('email.user') ?>" aria-describedby="emailUsernameHelp">

              <div id="emailUsernameHelp" class="form-text">Podaj nazwę użytkownila/login do konta pocztowego</div>
              
              <label for="emailPassword" class="form-label">Hasło E-mail</label>

                <input type="password" class="form-control" id="emailPassword" name="emailPassword" value="<?= getenv('email.password') ?>" aria-describedby="emailPasswordHelp">

              <div id="emailPasswordHelp" class="form-text">Podaj hasło do konta pocztowego</div>
              
              <label for="emailSender" class="form-label">Adres e-mail poczty wychodzącej</label>

                <input type="text" class="form-control" id="emailSender" name="emailSender" value="<?= getenv('email.sender') ?>" aria-describedby="emailSenderHelp">

              <div id="emailSenderHelp" class="form-text">Adres e-mail poczty wychodzącej, przykładowo: noreply@domain.com</div>
              
              <label for="emailContact" class="form-label">Adres e-mail poczty przychodzącej</label>

                <input type="text" class="form-control" id="emailContact" name="emailContact" value="<?= getenv('email.contact') ?>" aria-describedby="emailContactHelp">

              <div id="emailContactHelp" class="form-text">Adres e-mail poczty przychodzącej, na który przychodzą wiadomości z formularza kontaktowego oraz adres, który jest wyświetlany jako sposób kontaktu</div>
              
              <label for="emailPort" class="form-label">Port serwera pocztowego</label>

                <input type="text" class="form-control" id="emailPort" name="emailPort" value="<?= getenv('email.port') ?>" aria-describedby="emailPortHelp">

              <div id="emailPortHelp" class="form-text">Port serwera pocztowego SMTP, domyślnie 465</div>
            </form>
            <button id="updateSettingsSubmit" type="submit" class="mt-3 btn btn-success">Zapisz Ustawienia</button>
            <div>
              <ul id="request-response" class="list-group p-3">

              </ul>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</main>

<script>
document.getElementById("updateSettingsSubmit").addEventListener("click", function(event) {
  
  event.preventDefault();

  document.querySelectorAll(".response-message").forEach(e => e.remove());

  document.getElementById('updateSettingsSubmit').disabled = true;

  //Get form data
  let formData = new FormData(updateSettings);

  // var siteLogo = formData.get('siteLogo');

  // siteLogo = {
  //   'lastModified'     : siteLogo.lastModified,
  //   'name'             : siteLogo.name,
  //   'size'             : siteLogo.size,
  //   'type'             : siteLogo.type 
  // };

  // formData.set('siteLogo', JSON.stringify(siteLogo))

  console.log(Object.fromEntries(formData));

  //Send the data
  fetch('<?=env('app.baseURL')?>/admin/updateSettings', {
      method: 'POST',
      processData: false,
      headers: {
          //'Content-Type': 'application/json',
          'X-Requested-With': 'XMLHttpRequest'
      },
      body: formData,
      data: formData,
      }).then(function (response) {
          if (response.ok) {
              return response.json();
          }
          return Promise.reject(response);
      }).then(function (data) {
          console.log(data);

          if(data.status === 'success')
          {
            el = document.getElementById('request-response');

            el.insertAdjacentHTML('afterbegin', "<li class='response-message list-group-item list-group-item-success'>"+ data.message +"</li>");
          } else 
          {
            //Create an element for the response
            el = document.getElementById('request-response');

            errors = data.message;

            for (const [key, value] of Object.entries(errors)) {
              el.insertAdjacentHTML('afterbegin', "<li class='response-message list-group-item list-group-item-danger'>"+ value +"</li>");
            }
          }

          //Enable button
          document.getElementById('updateSettingsSubmit').disabled = false;
      }).catch(function (error) {
        console.log(error);
      });
});
</script>