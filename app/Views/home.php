  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Witaj na <span><?=esc($settings['siteName'])?></span></h2>
          <p class="animate__animated animate__fadeInUp">Jedna z najlepszych firm budowlanych w Krakowie</p>
          <a href="<?=env('app.baseURL')?>/about-us" class="btn-get-started animate__animated animate__fadeInUp">O Nas</a>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Docieplanie Budynków</h2>
          <p class="animate__animated animate__fadeInUp">Profesjonalne docieplanie budynków przy wykorzystaniu najwyższej jakości materiałów, wykończenie powłoką tynkarską w cenie!</p>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Kompleksowe Remonty</h2>
          <p class="animate__animated animate__fadeInUp">Wykonujemy Kompleksowe remonty twojego domu i wnętrza, jesteśmy w stanie wymienić lub naprawić wszystko w Twoim domu</p>
        </div>
      </div>

      <!-- Slide 4 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Wykonywanie Wnętrz</h2>
          <p class="animate__animated animate__fadeInUp">Pracujemy także przy pracach wewnątrz takich jak poddasza, podwieszane sufity, stawianie ścian działowych z płyt g-k przy użyciu najwyższej jakości produktów</p>
        </div>
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Features Section ======= -->
    <section class="features">
      <div class="container">

        <div class="section-title">
          <h2>Dlaczego My</h2>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5">
            <img src="assets/img/features-1.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-4">
            <h3>Podchodzimy do każdego klienta indywidualnie.</h3>
            <p class="fst-italic">
              Naszym celem jest nie tylko żeby klient otrzymał świetny końcowy produkt, 
              ale też żeby proces współpracy był przyjemny i wygodny. Dlatego podchodzimy do każdego klienta indywidualnie.
            </p>
            <ul>
              <li><i class="bi bi-check"></i> Szybki i łatwy kontakt z naszym przedstawicielem.</li>
              <li><i class="bi bi-check"></i> Każdy etap budowy jest wyjaśniany w prosty i łatwy do zrozumienia sposób przez nasz profesjonalny zespół.</li>
            </ul>
          </div>
        </div>

        <!-- <div class="row" data-aos="fade-up">
          <div class="col-md-5 order-1 order-md-2">
            <img src="assets/img/features-2.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5 order-2 order-md-1">
            <h3>Corporis temporibus maiores provident</h3>
            <p class="fst-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum
            </p>
          </div>
        </div> -->

        <div class="row" data-aos="fade-up">
          <div class="col-md-5 order-1 order-md-2">
            <img src="assets/img/features-3.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5">
            <h3>Szybki i prosty kontakt</h3>
            <p>Kontakt z nami jest tak prosty jak to tylko możliwe, oferujemy możliwość kontaktu na wiele sposobów.</p>
            <ul>
              <li><i class="bi bi-check"></i> Kontakt z nami poprzez formularz kontaktowy na naszej stronie.</li>
              <li><i class="bi bi-check"></i> Szybki kontakt poprzez wiadomości e-mail.</li>
              <li><i class="bi bi-check"></i> Prosty i ultraszybki kontakt telefoniczny.</li>
            </ul>
          </div>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5">
            <img src="assets/img/features-4.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5 order-2 order-md-1">
            <h3>Dbamy o terminy</h3>
            <p class="fst-italic">
              Pracując z nami nie musisz się martwić o opóźnienia, nasz doświadczony i profesjonalny zespół o to zadba.
            </p>
            <p>
              Poprzez okres planowania i budowy Twojego projektu nasz zespół wyznaczy i przekażę, dokładnie okienka ukończenia danego etapu. Na biężąco wiesz kiedy każdy etap zostanie ukończony i masz pewność, 
              że z nami nie napotkasz żadnych opóźnień.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End Features Section -->

  </main><!-- End #main -->
