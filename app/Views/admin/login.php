<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <span class="h1"><img src="/assets/img/logo.png" width="150px" alt="<?=esc($settings['siteName'])?>"></span>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Zaloguj się do panelu</p>

      <form action="/admin/login/auth" method="post">
        <div class="input-group mb-3">
          <input id="email" type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="password" type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?= csrf_field() ?>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-block">Zaloguj się</button>
        </div>
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
</body>

<script>
$(function() {
    $('form').submit(function(event) {
        event.preventDefault();

        $('button:submit').attr('disabled', true)

        $('.invalid-feedback').each(function(){
            $(this).children().remove();
        })

        var form = document.querySelector('form');

        formData = new FormData(form);

        $.ajax({
            type: form.getAttribute('method'),
            url: form.getAttribute('action'),
            data: formData,
            processData: false,
            contentType: false,
        }).done(function(data) {
            var data = JSON.parse(data);
            $('button:submit').attr('disabled', false)

            if(data.status === 'invalid')
            {
                $(`#password`).parent().append(`<div class='form-text invalid-feedback d-block'>${data.error}</div>`);
            } else if (data.status === 'success')
            {
                window.location.href = data.redirect;
            }
        }).fail(function(data) {
            console.log(data);
        });
    })
});
</script>