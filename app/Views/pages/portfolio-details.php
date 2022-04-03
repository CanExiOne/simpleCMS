<main id="main">

  <!-- ======= Our Portfolio Section ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2><?=esc($album['title'])?></h2>
        <ol>
          <li><a href="/">Home</a></li>
          <li><a href="/portfolio">Galeria</a></li>
          <li><?=esc($album['title'])?></li>
        </ol>
      </div>

    </div>
  </section><!-- End Our Portfolio Section -->

  <!-- ======= Portfolio Details Section ======= -->
  <section id="portfolio-details" class="portfolio-details">
    <div class="container">

      <div class="row gy-4">

        <div class="col-lg-8">
          <div class="portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">

              <?php if(!empty($album['pictures'])): ?>
                <?php $pictures = unserialize($album['pictures']); ?>
                <?php foreach($pictures as $picture): ?>
                  <?php if(file_exists(ROOTPATH.'/public/uploads/'.$picture)): ?>
                    <div class="swiper-slide">
                      <img src="uploads/<?=esc($picture)?>" alt="">
                    </div>
                  <?php endif ?>
                <?php endforeach ?>
              <?php else: ?>

              <?php endif ?>

            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="portfolio-info">
            <h3>Informacje o Projekcie</h3>
            <ul>
              <?php if(!empty($album['client'])):?>
              <li><strong>Klient</strong>: <?=esc($album['client'])?></li>
              <?php endif ?>
              <li><strong>Data Projektu</strong>: <?=esc($album['date'])?></li>
            </ul>
          </div>
          <?php if(!empty($album['description'])): ?>
          <div class="portfolio-description">
            <h2>Dodatkowy opis projektu</h2>
            <p>
              <?=esc($album['description'])?>
            </p>
          </div>
          <?php endif ?>
        </div>

      </div>

    </div>
  </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->