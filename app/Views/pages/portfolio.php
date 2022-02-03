<main id="main">

  <!-- ======= Our Portfolio Section ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Nasze Portfolio</h2>
        <ol>
          <li><a href="/">Home</a></li>
          <li>Nasze Portfolio</li>
        </ol>
      </div>

    </div>
  </section><!-- End Our Portfolio Section -->

  <!-- ======= Portfolio Section ======= -->
  <section class="portfolio">
    <div class="container">

      <div class="row portfolio-container" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

      <?php if (!empty($albums) && is_array($albums)): ?>
        <?php foreach ($albums as $album_item): ?>
          <?php $pictures = unserialize($album_item['pictures']) ?>
            <?php foreach ($pictures as $picture): ?>
              <div class="col-lg-4 col-md-6 portfolio-wrap">
                <div class="portfolio-item">
                  <img src="/uploads/<?=esc($picture)?>" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h3><?=esc($album_item['title'])?></h3>
                    <div>
                      <a href="/uploads/<?=esc($picture)?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?=esc($album_item['title'])?>"><i class="bx bx-plus"></i></a>
                      <a href="/portfolio?albumid=<?=esc($album_item['albumid'])?>" title="Sprawdź Cały Album"><i class="bx bx-link"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
        <?php endforeach ?>
      <?php else: ?>

      <?php endif ?>
      </div>

    </div>
  </section><!-- End Portfolio Section -->

</main><!-- End #main -->