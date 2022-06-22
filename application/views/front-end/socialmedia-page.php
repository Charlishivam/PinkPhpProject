<?php include('common-file/user_header.php'); ?>
<style>
   .info:hover
   {
   background-color: rgb(204, 241, 241, 1);
   border-top-right-radius: 25px;
   border-bottom-right-radius: 25px;
   }
   .admin
   {
   color: var(--primary-color);
   }
</style>
<section>
   <div class="container mt-5">
   <div class="row">
   <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 col-12">
      <?php include('user-side-bar.php'); ?>
   </div>
   <div class="col-sm-9 col-md-9 col-lg-9 col-xl-9 col-12">
   <div class="row">
      <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12 mt-4">
         <h5>Your profile info in pink7 services</h5>
         <p>Personal info and Options to manage it. You can make some of this info, like your contct details, visible to others so they can reach your easly. you can also see a summary of ypur profile</p>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
         <img src="<?= base_url('front-end/') ?>images/Links/icon1.jpg" alt="">
      </div>
   </div>
   
   
   <div class="row">
      <div class="col-12">
         <div class="social-media-account-box">
            <h2 class="top-heading">Social Media Account Connect</h2>
            <p class="text">Some info be visible to other people using pink7 service. <a href="#">Learn more</a></p>
            <div class="details-box">
               <?php if($this->session->flashdata('error')){ ?>
               <div class="alert alert-danger d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                     <use xlink:href="#exclamation-triangle-fill"/>
                  </svg>
                  <div>
                     <?= $this->session->flashdata('error') ?>
                  </div>
               </div>
               <?php } ?>
               <?php if($this->session->flashdata('success')){ ?>
               <div class="alert alert-primary d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Primary:">
                     <use xlink:href="#exclamation-triangle-fill"/>
                  </svg>
                  <div>
                     <?= $this->session->flashdata('success') ?>
                  </div>
               </div>
               <?php } ?>
               <ul class="p-0 m-0">
                  <li class="item">
                     <div class="facebook-box common-flex first-box">
                        <span class="icon-box">
                        <img src="<?= base_url('front-end/') ?>images/Links/facebook1.png">
                        </span>
                        <span>
                           <p class="mb-0">Facebook Page</p>
                        </span>
                     </div>
                     <?php $fb = $social['fb_user_data']->row(); ?>
                     <?php if($fb->social_status == 0){ ?>
                     <div class="facebook-box common-flex">
                        <div class="disconnect-btn">
                           <a href="<?= $this->data['social']['fb_login_url'] ?>" class="btn rounded-pill">Connect</a>
                        </div>
                     </div>
                     <?php } ?>
                     <?php if($fb->social_status == 1){ ?>
                     <div class="facebook-box common-flex">
                        <span class="icon-box">
                        <img class="rounded-pill" src="<?= $fb->social_photo ?>">
                        </span>
                        <span>
                           <p class="mb-0">Connected as <a href="#"><?= $fb->social_name ?></a></p>
                        </span>
                     </div>
                     <div class="facebook-box common-flex">
                        <div class="disconnect-btn">
                           <a href="<?= site_url('socialapps/disconnected/facebook') ?>" class="btn rounded-pill">Disconnect</a>
                        </div>
                     </div>
                     <?php } ?>
                  </li>
                  <li class="item">
                     <div class="facebook-box common-flex first-box">
                        <span class="icon-box">
                        <img src="<?= base_url('front-end/') ?>images/Links/instagram.png">
                        </span>
                        <span>
                           <p class="mb-0">Instagram Profile</p>
                        </span>
                     </div>
                     <?php $fb = $social['insta_user_data']->row(); ?>
                     <?php if($fb->social_status == 0){ ?>
                     <div class="facebook-box common-flex">
                        <div class="disconnect-btn">
                           <a href="<?= $this->data['social']['insta_login_url'] ?>" class="btn rounded-pill">Connect</a>
                        </div>
                     </div>
                     <?php } ?>
                     <?php if($fb->social_status == 1){ ?>
                     <div class="facebook-box common-flex">
                        <span class="icon-box">
                        <img class="rounded-pill" src="<?= base_url('front-end/') ?>images/Links/instagram.png">
                        </span>
                        <span>
                           <p class="mb-0">Connected as <a href="#"><?= $fb->social_name ?></a></p>
                        </span>
                     </div>
                     <div class="facebook-box common-flex">
                        <div class="disconnect-btn">
                           <a href="<?= site_url('socialapps/disconnected/instagram') ?>" class="btn rounded-pill">Disconnect</a>
                        </div>
                     </div>
                     <?php } ?>
                  </li>
                  <li class="item">
                     <div class="facebook-box common-flex first-box">
                        <span class="icon-box">
                        <img src="<?= base_url('front-end/') ?>images/Links/twitter.png">
                        </span>
                        <span>
                           <p class="mb-0">Twitter Profile</p>
                        </span>
                     </div>
                     <?php $tw = $social['tw_user_data']->row(); ?>
                     <?php if($tw->social_status == 0){ ?>
                     <div class="facebook-box common-flex">
                        <div class="disconnect-btn">
                           <a href="<?= $this->data['social']['tw_login_url'] ?>" class="btn rounded-pill">Connect</a>
                        </div>
                     </div>
                     <?php } ?>
                     <?php if($tw->social_status == 1){ ?>
                     <div class="facebook-box common-flex">
                        <span class="icon-box">
                        <img class="rounded-pill" src="<?= base_url('front-end/') ?>images/Links/twitter.png">
                        </span>
                        <span>
                           <p class="mb-0">Connected as <a href="#"><?= $tw->social_name ?></a></p>
                        </span>
                     </div>
                     <div class="facebook-box common-flex">
                        <div class="disconnect-btn">
                           <a href="<?= site_url('socialapps/disconnected/twitter') ?>" class="btn rounded-pill">Disconnect</a>
                        </div>
                     </div>
                     <?php } ?>
                  </li>
                  <li class="item">
                     <div class="facebook-box common-flex first-box">
                        <span class="icon-box">
                        <img src="data:image/jpeg;base64,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">
                        </span>
                        <span>
                           <p class="mb-0">Whatsapp</p>
                        </span>
                     </div>
                     <?php $wp = $social['wp_user_data']->row(); ?>
                     <?php if($wp->social_status == 0){ ?>
                     <div class="facebook-box common-flex">
                        <div class="disconnect-btn">
                           <a href="<?= site_url('whatsaap/dashboard') ?>" class="btn rounded-pill">Connect</a>
                        </div>
                     </div>
                     <?php } ?>
                     <?php if($wp->social_status == 1){ ?>
                     <div class="facebook-box common-flex">
                        <span class="icon-box">
                        <img src="data:image/jpeg;base64,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">
                        </span>
                        <span>
                           <p class="mb-0">Connected</p>
                        </span>
                     </div>
                     <div class="facebook-box common-flex">
                        <div class="disconnect-btn">
                           <a href="<?= site_url('socialapps/disconnected/whatsapp') ?>" class="btn rounded-pill">Disconnect</a>
                        </div>
                     </div>
                     <?php } ?>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
<?php include('common-file/user_footer.php'); ?>