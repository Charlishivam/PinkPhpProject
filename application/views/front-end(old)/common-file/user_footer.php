<?php   $fetchData = "SELECT * FROM `ci_general_settings`";
        $single_app    = $this->db->query($fetchData)->row();
        
?>
<footer class="footer mt-5">
         <div class="container">
            <div class="row">
               <div class="footer-about">
                   <a href="<?= base_url() ?>">
                      <div class="footer-logo">
                         <img src="<?= base_url('front-end/') ?>images/pink7.svg" alt="pink7">
                      </div>
                    </a>
                  <p>Pink7 is a leading agency for brand promotion, connecting millions of customers with the
                     merchant.
                  </p>
               </div>
               <div class="quick-links">
                  <h2>Explore</h2>
                  <ul>
                        <li><a href="<?= base_url() ?>home">Home</a></li>
                        <li><a href="<?= base_url() ?>home/aboutpage">About</a></li>
                        <li><a href="<?= base_url() ?>home/pricingpage">Pricing</a></li>
                        <li><a href="<?= base_url() ?>home/contactspage">Contact</a></li>
                  </ul>
               </div>
               <div class="policy">
                  <h2>Explore</h2>
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
                     right.
                  </p>
                  <div class="social-links">
                     <a href="<?=$single_app->facebook_link ?>"><i class="fa-brands fa-facebook-f"></i></a>
                     <a href="<?=$single_app->twitter_link ?>"><i class="fa-brands fa-twitter"></i></a>
                     <a href="<?=$single_app->instagram_link ?>"><i class="fa-brands fa-instagram"></i></a>
                     <a href="<?=$single_app->youtube_link ?>"><i class="fa-brands fa-youtube"></i></a>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <div class="container-fluid">
         <div class="row">
            <div class="bottom">
               <p class="text my-1">&copy; <?= date('Y') ?> <?=$single_app->copyright ?> <i
                  class="fa fa-heart" aria-hidden="true" style="color: red"></i> </p>
            </div>
         </div>
      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
      
      <script src="<?= base_url('front-end/') ?>js/main.js"></script>
      <script>
         $('.toggler').click(function () {
             $('.navigation').addClass('slide');
         });
         $('.close-btn').click(function () {
             $('.navigation').removeClass('slide');
         });
      </Script>
   </body>
</html>