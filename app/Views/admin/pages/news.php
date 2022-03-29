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
            <a href="<?=base_url('/admin/news')?>" class="nav-link active">
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
            <h1 class="m-0">Ogłoszenia</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=base_url('/admin')?>">Panel Kontrolny</a></li>
              <li class="breadcrumb-item active">Ogłoszenia</li>
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
                <div id="newsEditorTitle" class="mt-auto mb-auto">
                Utwórz Ogłoszenie
                </div>
                <div class="ml-auto">
                  <button class="btn btn-transparent text-white" data-toggle="collapse" data-target=".editor-collapse"><i class="far fa-eye"></i></button>
                </div>
              </div>
              <form id="newsForm" class="display editor-collapse show" method="post" action="<?=env('app.baseURL')?>/admin/news/createNews" data-news-type="create" novalidate>
                <div class="card-body">
                  <div class="form-group">
                    <input id="newsId" type="hidden" value="0" readonly/>
                    <label for="newsTitle">Tytuł Ogłoszenia</label>

                    <input id="newsTitle" type="text" class="form-control" name="title" aria-describedby="titleHelp" autocomplete="off">
                    <div id="titleHelp" class="form-text">Podaj nazwę ogłoszenia</div>

                  </div>
                  <div class="form-group">
                    <label for="newsEditor" class="form-label">Zawartość Ogłoszenia</label>

                    <div id="newsEditor">
                      <div id="newsEditorContainer" tab-index="0" style="height:400px">
                      </div>
                      <div id="newsEditorCounter"></div>
                    </div>

                  </div>
                  <?= csrf_field() ?>
                  <div id="otherErrors" class="form-group">
                  </div>
                </div>
                <div class="card-footer">
                  <button id="createNews" class="btn btn-success">Utwórz Ogłoszenie</button>
                  <button id="editNews" class="btn btn-warning d-none" disabled>Edytuj Ogłoszenie</button>
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
                Lista Ogłoszeń
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-12">
                    <table id="newsTable" class="table table-striped table-bordered table-hover">
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
                              $authorData = array_search($authorID, array_column($users, 'id'));

                              if($authorData !== FALSE)
                              {
                                $authorName = $users[$authorData]['firstName'] . ' ' . $users[$authorData]['lastName'];
                              } else {
                                $authorName = 'System';
                              }
                              $contentShort = word_limiter($content, 10);

                              echo(
                                "<tr>
                                <th style='width:2%'>$id</th>
                                <td style='width:auto'>$title</td>
                                <td style='width:auto'>$slug</td>
                                <td style='width:12%'>$authorName</td>
                                <td style='width:auto'>$created_at</td>
                                <td style='width:12%;' class='text-center'>
                                <button type='button' class='editNews m-1 btn btn-warning btn-sm' 
                                  data-id='$id' 
                                  data-postTitle='$title' 
                                  data-slug='$slug' 
                                  data-postContent='$content' 
                                  data-postDelta='$delta' 
                                  data-authorID='$authorID'
                                  data-published='$created_at'>Edytuj</button>

                                  <button type='button' class='deleteNews m-1 btn btn-sm btn-danger' 
                                  data-id='$id' 
                                  data-postTitle='$title' 
                                  data-postBody='$content'>Usuń</button>
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

<script>
$(document).ready(function() {
  //Create data table with all news
  $('#newsTable').DataTable({
    "order" : [[4, 'desc']],
  });

  //Change button icon on collapse
  $('.editor-collapse')
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
      subtitle: `<a href=${toastData.href} target='_blank'>Przeczytaj Post</a>`,
      body: toastData.message,
      autohide: true,
      delay: 5000,
      class: 'bg-success',
      });
    } else if(toastData.type === 'danger')
    {
      $(document).Toasts('create', {
      title: 'Sukces!',
      body: toastData.message,
      autohide: true,
      delay: 5000,
      class: 'bg-danger',
      });
    }
  }

  //Clear cookie reload-message
  localStorage.removeItem('reload-message');
});

//Edit form to allow editing of news from the table below
$('.editNews').click(function() {
  //Change News Form Header
  $('#newsEditorTitle')
    .text("Edytuj Ogłoszenie -" + " " + $(this).attr('data-postTitle') + " - ID:" + $(this).attr('data-id')) 
    .parent()
    .parent()
    .removeClass("card-success")
    .addClass("card-warning")

  //Change button and assign attributes to it
  if(!$('#createNews').hasClass('d-none'))
  {
    $('#createNews').addClass('d-none')
  }

  if($('#editNews').hasClass('d-none'))
  {
    $('#editNews').removeClass('d-none')
    $('#cancelEdit').removeClass('d-none')
  }
  
  $('#editNews').attr('data-postId', $(this).attr('data-id'));


  //Disable create button and enable edit button
  $('#createNews').attr('disabled', true);

  $('#editNews').attr('disabled', false);
  $('#cancelEdit').attr('disabled', false);

  $('#newsForm').attr('action', "<?=env('app.baseURL')?>/admin/news/editNews");

  //Populate News Form Contents
  $('#newsId').val($(this).attr('data-id'));
  $('#newsTitle').val($(this).attr('data-postTitle'));
  quill.setContents(JSON.parse($(this).attr('data-postDelta')));

  //Check if card is collapsed, if true then show it
  if(!$('.editor-collapse').collapse('show'))
  {
    $('editor.collapse').collapse('show')
  }

  //Set current state of form to allow for easier handling of submit buttons
  $('#newsForm').attr('data-news-type', 'edit');

  $(window).scrollTop(0)
});

$('#cancelEdit').click(function() {
  //Change News Form Header
  $('#newsEditorTitle')
    .text("Utwórz Ogłoszenie") 
    .parent()
    .parent()
    .removeClass("card-warning")
    .addClass("card-success")

  //Change button and remove attributes from it
  if($('#createNews').hasClass('d-none'))
  {
    $('#createNews').removeClass('d-none')
  }

  if(!$('#editNews').hasClass('d-none'))
  {
    $('#editNews').addClass('d-none')
    $('#cancelEdit').addClass('d-none')
  }
  
  $('#editNews').attr('data-postId', '');


  //Disable edit button and enable create button
  $('#createNews').attr('disabled', false);

  $('#editNews').attr('disabled', true);
  $('#editNews').attr('disabled', true);

  $('#newsForm').attr('action', "<?=env('app.baseURL')?>/admin/news/createNews");

  //Clear News Form
  $('#newsId').val('');
  $('#newsTitle').val('');
  quill.setContents([]);

  //Set current state of form to allow for easier handling of submit buttons
  $('#newsForm').attr('data-news-type', 'create');
});

$('.deleteNews').click(function() {

  id = {'id' : $(this).attr('data-id')};

  $.ajax({
      type: 'POST',
      url: "<?=env('app.baseURL')?>/admin/news/deleteNews",
      data: JSON.stringify(id),
      processData: false,
      contentType: 'application/json',
  }).done(function(data) {
    var data = JSON.parse(data);
    
    //Check if response was invalid and if true display errors
    if(data.status === 'invalid')
    {
      console.log(data);
      
      $(document).Toasts('create', {
        title: 'Błąd!',
        body: data.errors,
        autohide: true,
        delay: 5000,
        class: 'bg-danger',
      });

      console.log(data.errors);
    } else if (data.status === 'success')
    {
      //Reload page and display success popup
      reloadMessage = {
        'title' : $(this).attr('data-postTitle'),
        'message' : data.message,
        'type' : 'danger'
      };

      localStorage.setItem('reload-message', JSON.stringify(reloadMessage));
      window.location.reload();
    } else {
      console.log(data);
    }
  }).fail(function(data){
    $(document).Toasts('create', {
      title: 'Nieznany Błąd!',
      body: data.message,
      autohide: true,
      delay: 5000,
      class: 'bg-danger',
    });

    console.log(data);
  });
});

//Initialize Quill, it's an WYSIWYG Editor
var qOptions = {
  debug: 'warn',
  modules: {
    counter: {
      container: "#newsEditorCounter",
      unit: "letter",
    },
    toolbar: [
      [{ header: [1, 2, false] }],
      ['bold', 'italic', 'underline'],
      ['image', 'code-block']
    ]
  },
  placeholder: 'Treść ogłoszenia...',
  theme: 'snow'
};

var quill = new Quill('#newsEditorContainer', qOptions);

//Send data to the server
$(function() {
  $('form').submit(function(event) {
    event.preventDefault();

    //Restore #titleHelp and #otherErrors state in case it was edited to show error before
    $('#titleHelp').replaceWith('<div id="titleHelp" class="form-text">Podaj nazwę ogłoszenia</div>');
    $('#otherErrors').replaceWith('<div id="otherErrors" class="form-group"></div>');

    //Also remove error border from input
    $('#newsTitle').removeClass('is-invalid');

    //Disable button but first check form state
    if($('#newsForm').attr('data-news-type') === 'create')
    {
      $('#createNews').attr('disabled', true);
    } else {
      $('#editNews').attr('disabled', true)
    }

    //Get form and create FormData, using DOM because FormData() get's angry about jquery
    var form = document.querySelector('form');

    formData = new FormData(form);

    //Append to FormData editor contents and delta
    formData.set('contents', quill.root.innerHTML);
    formData.set('editorDelta', JSON.stringify(quill.getContents()));

    //Append to FormData post id if sending edited news
    if($('#newsForm').attr('data-news-type') === 'edit')
    {
      formData.set('postId', $('#newsId').val())
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
      if($('#newsForm').attr('data-news-type') === 'create')
      {
        $('#createNews').attr('disabled', false);
      } else {
        $('#editNews').attr('disabled', false)
      }
      
      //Check if response was invalid and if true display errors
      if(data.status === 'invalid')
      {
        console.log(data);
        if(data.errors.title)
        {
          $('#titleHelp').addClass('invalid-feedback d-block').text(data.errors.title);
          $('#newsTitle').addClass('is-invalid');
        }
        $('#otherErrors').addClass('invalid-feedback d-block').text(data.errors.contents);

        console.log(data.errors);
      } else if (data.status === 'success')
      {
        //Reload page and display success popup
        reloadMessage = {
          'title' : $('#newsTitle').val(),
          'message' : data.message,
          'href' : '<?= base_url('/blog/view')?>/' + data.slug,
          'type' : 'success'
        };

        localStorage.setItem('reload-message', JSON.stringify(reloadMessage));
        window.location.reload();
      }

    }).fail(function(data) {
      $('#otherErrors').addClass('invalid-feedback d-block').text('Wystąpił nieznany błąd! Skontaktuj się z Administratorem Serwera');

      console.log(data);
    });
  });
});
</script>