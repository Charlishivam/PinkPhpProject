  <!-- Footer Start -->
<?php   $fetchData = "SELECT * FROM `ci_general_settings`";
        $single_app    = $this->db->query($fetchData)->row();
        
?>
 
 <footer class="footer-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="footer-box">
                            <img src="<?= base_url('front-end/') ?>img/logo-footer.png" />
                            <p class="text mt-4">Pink7.in is a leading agency for brand promotion, and connecting Marchants with million of customers.</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-6 col-lg-3">
                        <div class="footer-box">
                            <h3 class="heading">Quick Links</h3>
                            <ul class="p-0 m-0">
                                <li>
                                    <a href="<?= base_url() ?>home"><p class="text mb-2">Home</p></a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>home/aboutpage"><p class="text mb-2">About</p></a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>home/pricingpage"><p class="text mb-2">Pricing</p></a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>home/contactspage"><p class="text mb-2">Contact</p></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-6 col-md-6 col-lg-3">
                        <div class="footer-box">
                            <h3 class="heading">Policy</h3>
                            <ul class="p-0 m-0">
                                <li>
                                    <a href="<?= base_url() ?>user"><p class="text mb-2">Register with Us</p></a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>home/privacy_policy"><p class="text mb-2">Privacy Policy</p></a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>home/term_condition"><p class="text mb-2">Terms of Conditions</p></a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>home/servicepage"><p class="text mb-2">Services</p></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3 mt-2 mt-md-0">
                        <div class="footer-box">
                            <h3 class="heading">Get Connect</h3>
                            <p class="text">
                                Are we friends on social media yet? <br>If not, please follow the below:
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <section class="copyright-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="copyright-box text-center">
                            <p class="copyright">&copy; <?= date('Y') ?> <?=$single_app->copyright ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
       
        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer">
</script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script src="<?= base_url();?>front-end/js/data-filter.js"></script>
    <script src="<?= base_url('front-end/') ?>js/masonry.pkgd.min.js?v=<?=time()?>"></script>
	<script src="<?= base_url('front-end/') ?>js/imagesloaded.js?v=<?=time()?>"></script>
	<script src="<?= base_url('front-end/') ?>js/classie.js?v=<?=time()?>"></script>
	<script src="<?= base_url('front-end/') ?>js/AnimOnScroll.js?v=<?=time()?>"></script>
	<script src="<?= base_url('front-end/') ?>js/theme.js?v=<?=time()?>"></script> 
    <script src="<?= base_url('front-end/') ?>js/swiper-bundle.min.js?v=<?=time()?>"></script> 
      <script src="<?= base_url('front-end/') ?>js/owl.carousel.min.js?v=<?=time()?>"></script>

        <!-- ----------script-file----------------- -->
        <script src="js/jquery-3.6.0.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/script.js"></script>
    </body>
</html>
