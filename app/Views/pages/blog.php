  <main id="main">

    <!-- ======= Blog Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Blog</h2>

          <ol>
            <li><a href="<?=env('app.baseURL')?>">Home</a></li>
            <li>Blog</li>
          </ol>
        </div>

      </div>
    </section><!-- End Blog Section -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">
          <?php
            helper('text');
            if(empty($newsList)) {
              echo(
                "<article class='entry'>

              <div class='entry-content'>
                <p>
                  Nie ma aktualnie żadnych ogłoszeń :)
                </p>
              </div>

            </article>");
            }
            else
            {
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
                  $contentShort = word_limiter($content, 20);
  
                  echo(
                    "<article class='entry'>
  
                  <h2 class='entry-title'>
                    <a href='/blog/view/$slug'>$title</a>
                  </h2>
    
                  <div class='entry-meta'>
                    <ul>
                      <li class='d-flex align-items-center'><i class='bi bi-person'></i> <a href='/blog/view/$slug'>$authorName</a></li>
                      <li class='d-flex align-items-center'><i class='bi bi-clock'></i> <a href='/blog/view/$slug'><time datetime='$created_at'>$created_at</time></a></li>
                    </ul>
                  </div>
    
                  <div class='entry-content'>
                    <p>
                      $contentShort
                    </p>
                    <div class='read-more'>
                      <a href='/blog/view/$slug'>Czytaj talej</a>
                    </div>
                  </div>
    
                </article>"
                  );
                }
  
              endforeach;
            }
          ?>
            <!-- End blog entry -->

            <div class="blog-pagination">
              <ul class="justify-content-center">
                <li class="active"><a href="#">1</a></li>
              </ul>
            </div>

          </div>
          <!-- End blog entries list -->

          <!-- <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Szukaj</h3>
              <div class="sidebar-item search-form">
                <form action="">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div> -->
              <!-- End sidebar search formn-->

              <!-- <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <ul>
                  <li><a href="#">Ogolne <span>(25)</span></a></li>
                  <li><a href="#">Ocieplenia <span>(12)</span></a></li>
                  <li><a href="#">Poddasza<span>(5)</span></a></li>
                  <li><a href="#">Lazienki od podstaw<span>(22)</span></a></li>
                  <li><a href="#">Murowanie<span>(8)</span></a></li>
                </ul>

              <h3 class="sidebar-title">Tai</h3>
              <div class="sidebar-item tags">
                <ul>
                  <li><a href="#">App</a></li>
                  <li><a href="#">IT</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Mac</a></li>
                  <li><a href="#">Design</a></li>
                  <li><a href="#">Office</a></li>
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Studio</a></li>
                  <li><a href="#">Smart</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div> -->
              <!-- End sidebar tags-->

            <!-- </div> -->
            <!-- End sidebar -->

          <!-- </div> -->
          <!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->
