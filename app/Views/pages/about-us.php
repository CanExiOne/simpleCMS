  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>O nas</h2>
          <ol>
            <li><a href="<?=env('app.baseURL')?>">Home</a></li>
            <li>O nas</li>
          </ol>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= About Section ======= -->
    <section class="about" data-aos="fade-up">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 p-4">
            <img src="assets/img/logo.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <h3>Oferujemy najwyższej jakości usługi.</h3>
            <p class="fst-italic">
              Pracując z nami masz pewność otrzymania najwyżej jakości usług, dzięki wyszkolonemu i doświadczonemu zespołowi 
              oraz wykorzystywaniu przez nas najnowszych i najlepszych rozwiązań i materiałów.
            </p>
            <ul>
              <li><i class="bi bi-check2-circle"></i> Pracownicy z wieloletnim doświadczeniem.</li>
              <li><i class="bi bi-check2-circle"></i> Profesjonalne i doświadczone kierownictwo.</li>
              <li><i class="bi bi-check2-circle"></i> Wykorzystywanie nowoczesnych rozwiązań i materiałów.</li>
            </ul>
            <p>
              Jeśli zależy Ci na najlepszym zakończonym produkcie to jesteśmy świetnym wyborem, skontaktuj się z nami już dzisiaj, aby rozpocząć pracę nad Twoim projektem.
            </p>

            <a href="/contact-us" class="btn-get-started">Napisz Do Nas</a>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Facts Section ======= -->
    <section class="facts section-bg" data-aos="fade-up">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="<?= esc($settings['statsClients']) ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Klienci</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="<?= esc($settings['statsFinishedProjects']) ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Ukończone Projekty</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="<?= esc($settings['statsCurrentProjects']) ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Aktualne Projekty</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="<?= esc($settings['statsEmployees']) ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Pracowników</p>
          </div>

        </div>

      </div>
    </section><!-- End Facts Section -->

  </main><!-- End #main -->