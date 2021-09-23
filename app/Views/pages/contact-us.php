  <main id="main">

    <!-- ======= Contact Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Kontakt</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Kontakt</li>
          </ol>
        </div>

      </div>
    </section><!-- End Contact Section -->

    <!-- ======= Contact Section ======= -->
    <section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
      <div class="container">

        <div class="row">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-envelope"></i>
                  <h3>Email</h3>
                  <p>biuro@kac-bud.pl<br>slowkac@gmail.com</p>
                </div>
              </div>
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-phone-call"></i>
                  <h3>Zadzwon do nas</h3>
                  <p>510 338 281<br>514 317 218</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Twoje Imie" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Twoj Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Temat" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Wiadomosc" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Laduje</div>
                <div class="error-message"></div>
                <div class="sent-message">Twoja wiadomosc zostala wyslana pomyslnie, oczekuj na odpowiedz</div>
              </div>
              <div class="text-center"><button type="submit">Wyslij wiadomosc</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
