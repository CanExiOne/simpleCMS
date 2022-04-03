<!-- ======= Footer ======= -->
<footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">


<div class="footer-top">
  <div class="container">
    <div class="row">

      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Przydatne Linki</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="<?=env('app.baseURL')?>/">Home</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="<?=env('app.baseURL')?>/about-us">O Nas</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="<?=env('app.baseURL')?>/contact-us">Kontakt</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Nasze Usługi</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> Docieplenia Budynków</li>
          <li><i class="bx bx-chevron-right"></i> Wykonczenia Wnętrz</li>
          <li><i class="bx bx-chevron-right"></i> Kompleksowe Remonty</li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6 footer-contact">
        <h4>Kontakt</h4>
        <p>
          <?php if($settings['companyPhone'] != null): ?>
          <strong>Numer telefonu:</strong> <?=esc($settings['companyPhone'])?>  <br>
          <?php endif ?>
          <?php if($settings['companyNIP'] != null): ?>
          <strong>NIP:</strong> <?=esc($settings['companyNIP'])?> <br>
          <?php endif ?>
          <?php if($settings['companyREGON'] != null): ?>
          <strong>REGON:</strong> <?=esc($settings['companyREGON'])?> <br>
          <?php endif ?>
          <strong>Email:</strong> <a href="mailto://<?=esc($settings['emailContact'])?>"><?=esc($settings['emailContact'])?></a>
        </p>

      </div>

      <div class="col-lg-3 col-md-6 footer-info">
        <h3>Social Media</h3>
        <p>Pracując z nami masz pewność otrzymania najwyżej jakości usług, dzięki wyszkolonemu i doświadczonemu zespołowi oraz wykorzystywaniu przez nas najnowszych i najlepszych rozwiązań i materiałów.</p>
        <div class="social-links mt-3">
          <a href="https://www.facebook.com/kacbudpl" class="facebook"><i class="bx bxl-facebook"></i></a>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="container">
  <div class="copyright">
    &copy; Copyright <strong><span><?=esc($settings['siteName'])?></span></strong>. Wszystkie prawa zastrzeżone
  </div>
</div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?=env('app.baseURL')?>/assets/vendor/aos/aos.js"></script>
<script src="<?=env('app.baseURL')?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=env('app.baseURL')?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?=env('app.baseURL')?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?=env('app.baseURL')?>/assets/vendor/php-email-form/validate.js"></script>
<script src="<?=env('app.baseURL')?>/assets/vendor/purecounter/purecounter.js"></script>
<script src="<?=env('app.baseURL')?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?=env('app.baseURL')?>/assets/vendor/waypoints/noframework.waypoints.js"></script>

<!-- Template Main JS File -->
<script src="<?=env('app.baseURL')?>/assets/js/main.js"></script>

</body>

</html>
