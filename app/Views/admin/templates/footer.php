<?php if(uri_string() != 'admin/login') :?>
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline font-small">
      Designed with <strong><a href="https://adminlte.io">AdminLTE.io</a></strong>
       & 
      Created by <strong>VGE Sites</strong>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021-<?= date('Y') ?> <a href="<?= base_url() ?>"><?=esc($settings['siteName'])?></a>.</strong> Wszystkie prawa zastrzeżone.
  </footer>
  <?php endif ?>
</div>
<!-- ./wrapper -->
</body>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Plugins Javascript -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/b-2.2.2/cr-1.5.5/fc-4.0.2/fh-3.2.2/r-2.2.9/rg-1.1.4/rr-1.2.8/sc-2.0.5/sb-1.3.2/sp-2.0.0/sl-1.3.4/sr-1.1.0/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.min.js"></script>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<!-- <script src="/assets/plugins/jquery-validation/jquery.validate.min.js"></script> -->

<!-- AdminLTE -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>