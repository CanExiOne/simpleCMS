  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Witaj na <span>Kac-Bud.pl</span></h2>
          <p class="animate__animated animate__fadeInUp">Jednej z najlepszych firm budowlanych w krakowie</p>
          <a href="<?=env('app.baseURL')?>/about-us" class="btn-get-started animate__animated animate__fadeInUp">O Nas</a>
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

    <!-- ======= Why Us Section ======= -->
    <section class="why-us section-bg" data-aos="fade-up" date-aos-delay="200">
      <div class="container">
        <div class="pt-5 section-title">
          <h2>Dlaczego My</h2>
          <p>Ja na przykład nie wiem, ale może super gejmer Kacper Słowiński wie, go musiscie pytać.</p>
        </div>

        <div class="row">
          <div class="col-lg-6 video-box">
            <img src="assets/img/why-us.jpg" class="img-fluid" alt="">
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center p-5">

            <div class="icon-box">
              <div class="icon"><i class="bi bi-hammer"></i></div>
              <h4 class="title"><a href="">Lorem Ipsum</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-gift"></i></div>
              <h4 class="title"><a href="">Nemo Enim</a></h4>
              <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Features Section ======= -->
    <section class="features">
      <div class="container">

        <div class="section-title">
          <h2>Usługi(Też może być "Dlaczego My")</h2>
          <p>Obrazki niżej są fajne, ale osobiście uważam, że nie pasujące do firmy budowlanej, więc ja bym to usunął lub właśnie użył jako "Dlaczego My". Niestety nie posiadam innych takich obrazków i nie posiadam umiejętności do zrobienia takich obrazków</p>
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
