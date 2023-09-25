<main id="main">

  <!-- ======= Our Portfolio Section ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Galeria</h2>
        <ol>
          <li><a href="/">Home</a></li>
          <li>Galeria</li>
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
            <?php if(file_exists(ROOTPATH.'/public/uploads/'.$pictures[0])): ?>
              <div class="col-lg-4 col-md-6 portfolio-wrap">
                <div class="portfolio-item d-flex">
                  <img src="/uploads/<?=esc($pictures[0])?>" class="img-fluid justify-content-center align-self-center" alt="">
                  <div class="portfolio-info">
                    <h3><?=esc($album_item['title'])?></h3>
                    <div>
                      <a href="/uploads/<?=esc($pictures[0])?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?=esc($album_item['title'])?>"><i class="bx bx-plus"></i></a>
                      <a href="/portfolio?albumid=<?=esc($album_item['id'])?>" title="Sprawdź Cały Album"><i class="bx bx-link"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif ?>
        <?php endforeach ?>
      <?php else: ?>
        <h1 class="text-center mb-5">Nie ma aktualnie dodanych żadnych zdjęć</h1>
      <?php endif ?>
      </div>

    </div>
  </section><!-- End Portfolio Section -->

</main><!-- End #main -->