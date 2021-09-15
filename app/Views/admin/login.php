<main>
    <div class="container">
        <div class="row h-100">
            <div class="col-6 mx-auto d-flex justify-content-center">
                <div class="card p-3 w-100 bg-dark text-light mx-auto my-auto">
                <h5 class="card-title">Logowanie Do Panelu</h5>
                    <div class="card-body"></div>
                        <form id="loginForm" name="loginForm">
                            <label for="email" class="form-label">Adres E-mail</label>

                            <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp">

                            <div id="emailHelp" class="form-text">Podaj swój adres e-mail</div>

                            <label for="password" class="form-label">Hasło</label>

                            <input type="password" class="form-control" id="password" name="password" aria-describedby="passwordHelp">

                            <div id="passwordHelp" class="form-text">Podaj swoje hasło</div>
                        </form>

                        <button type="submit" id="loginSubmit" class="btn btn-success mt-3">Zaloguj się</button>

                        <div>
                            <ul id="response" class="list-group p-3">

                            </ul>
                        </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
document.getElementById("loginSubmit").addEventListener("click", function(event) {
  
  event.preventDefault();

  document.querySelectorAll(".response-message").forEach(e => e.remove());

  document.getElementById('loginSubmit').disabled = true;

  //Get form data
  let formData = new FormData(loginForm);

  //Send the data
  fetch('<?=env('app.baseURL')?>/admin/login/auth', {
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

            console.log(data.message);
            window.location.href = data.response;
          } else 
          {
            //Create an element for the response
            el = document.getElementById('response');

            errors = data.message;

            for (const [key, value] of Object.entries(errors)) {
              el.insertAdjacentHTML('afterbegin', "<li class='response-message list-group-item list-group-item-danger'>"+ value +"</li>");
            }
          }

          //Enable button
          document.getElementById('loginSubmit').disabled = false;
      }).catch(function (error) {
          console.warn(error);

          document.getElementById('loginSubmit').disabled = false;
      });
});
</script>