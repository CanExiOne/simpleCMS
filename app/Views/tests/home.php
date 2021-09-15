<form id="myForm" name="myForm">
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
</form>

<script>

document.addEventListener('submit', function (event) {

event.preventDefault();

let formData = new FormData(myForm);

fetch('<?=env('app.baseURL')?>/test/post', {
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