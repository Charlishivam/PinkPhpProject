 <!-- Footer Start -->
<?php   $fetchData = "SELECT * FROM `ci_general_settings`";
        $single_app    = $this->db->query($fetchData)->row();
        
?>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-about">
                    <a href="<?= base_url() ?>">
                        <div class="footer-logo">
                            <img src="<?= base_url('front-end/') ?>images/pink7.svg" alt="pink7">
                        </div>
                    </a>
                    <p>Pink7 is a leading agency for brand promotion, connecting millions of customers with the
                        merchant.</p>
                </div>
                <div class="quick-links">
                    <h2>Quick Links</h2>
                    <ul>
                        <li><a href="<?= base_url() ?>home">Home</a></li>
                        <li><a href="<?= base_url() ?>home/aboutpage">About</a></li>
                        <li><a href="<?= base_url() ?>home/pricingpage">Pricing</a></li>
                        <li><a href="<?= base_url() ?>home/contactspage">Contact</a></li>
                        
                                    
                    </ul>
                </div>
                <div class="policy">
                    <h2>Policy</h2>
                    <ul>
                        <li><a href="<?= base_url() ?>user">Register with Us</a></li>
                        <li><a href="<?= base_url() ?>home/privacy_policy">Privacy Policy
                            </a></li>
                        <li><a href="<?= base_url() ?>home/term_condition">Terms of Services</a></li>
                        <li><a href="<?= base_url() ?>home">Services</a></li>
                    </ul>
                </div>
                <div class="get-connect">
                    <h2>Get Connect</h2>
                    <p>Are we friends on social media yet? Use the bottom below to connect,then join my list to your
                        right.</p>
                    <div class="social-links">
                        <a href="<?=$single_app->facebook_link ?>"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="<?=$single_app->twitter_link ?>"><i class="fa-brands fa-twitter"></i></a>
                        <a href="<?=$single_app->instagram_link ?>"><i class="fa-brands fa-instagram"></i></a>
                        <a href="<?=$single_app->youtube_link ?>"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <hr class="footer-line">
        <p class="copyright">&copy; <?= date('Y') ?> <?=$single_app->copyright ?></p>
    </footer>

    <!-- Footer End -->
    
    
  
    


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer">
    </script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
        <script src="<?= base_url();?>front-end/js/data-filter.js"></script>
        <script src="<?= base_url('front-end/') ?>js/main.js?<?=time()?>"></script>
        <script src="<?= base_url('front-end/') ?>js/masonry.pkgd.min.js"></script>
		<script src="<?= base_url('front-end/') ?>js/imagesloaded.js"></script>
		<script src="<?= base_url('front-end/') ?>js/classie.js"></script>
		<script src="<?= base_url('front-end/') ?>js/AnimOnScroll.js"></script>
		<script src="<?= base_url('front-end/') ?>js/theme.js"></script> 
        <script src="<?= base_url('front-end/') ?>js/swiper-bundle.min.js"></script> 
          <script src="<?= base_url('front-end/') ?>js/owl.carousel.min.js"></script>
  

        
    <Script>
        $('.toggler').click(function () {
            $('.navigation').addClass('slide');
        });
        $('.close-btn').click(function () {
            $('.navigation').removeClass('slide');
        });
    </Script>
    
		
	<script>
      new AnimOnScroll( document.getElementById( 'grid' ), {
        minDuration : 0.4,
        maxDuration : 0.7,
        viewportFactor : 0.2
      } );
    </script>

    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            items: 3,
            autoplay: true,
            autoplayTimeout: 3500,
            autoplayHoverPause: false
        });

        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
    
    
    
    <script>
 /**
   * Clients Slider
   */
  new Swiper('.clients-slider', {
    speed: 400,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    breakpoints: {
      320: {
        slidesPerView: 2,
        spaceBetween: 40
      },
      480: {
        slidesPerView: 3,
        spaceBetween: 60
      },
      640: {
        slidesPerView: 4,
        spaceBetween: 80
      },
      992: {
        slidesPerView: 6,
        spaceBetween: 120
      }
    }
  });   
</script>

  

</body>
</html>