<!----------------------footer start-->
<section class="container-fluid footer text-white text-center">
   <section class="row footer_container">
      <section class="col my-auto">
         <h5>Visited User : <?= $single->weblink_view_count ?></h5>
      </section>
      <!--<section class="col my-auto">
         <h5>Satisfied Client : 7700</h5>
      </section>-->
   </section>
   <h6 id="footer_heading">
      Copyright © <?= date('Y') ?> | All rights reserved | <?= $single->weblink_title ?>
      Ltd.
   </h6>
</section>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?= base_url($assets) ?>js/jquery-3.3.1.slim.min.js"></script>
<script src="<?= base_url($assets) ?>js/popper.min.js" ></script>
<script src="<?= base_url($assets) ?>js/bootstrap.min.js"  ></script>
</body>
</html>