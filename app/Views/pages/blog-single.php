  <main id="main">

    <!-- ======= Blog Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Blog</h2>

          <ol>
            <li><a href="<?=env('app.baseURL')?>">Home</a></li>
            <li><a href="<?=env('app.baseURL')?>/blog">Blog</a></li>
            <li><?=esc($news['title'])?></li>
          </ol>
        </div>

      </div>
    </section><!-- End Blog Section -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              <h2 class="entry-title">
                <?=esc($news['title'])?>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i><?=esc($author)?></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i><time datetime="<?=esc($news['created_at'])?>"><?=esc($news['created_at'])?></time></li>
                </ul>
              </div>

              <div class="entry-content">
                <?php echo($news['content'])?>
              </div>

            </article><!-- End blog entry -->

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Single Section -->

  </main><!-- End #main -->