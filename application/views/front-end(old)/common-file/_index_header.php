<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Pink7</title>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
      <link rel="stylesheet" href="<?= base_url('front-end/') ?>css/style.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      

      <link rel="stylesheet" href="<?= base_url('front-end/') ?>css/swiper-bundle.min.css">
      <link rel="stylesheet" type="text/css" href="<?= base_url('front-end/') ?>css/component.css" />
      
      <link href="<?= base_url('front-end/') ?>css/owl.carousel.min.css" rel="stylesheet">
      <link href="<?= base_url('front-end/') ?>css/swiper-bundle.min.css" rel="stylesheet">
   </head>
   <body>
      <!-- Header Start -->
      <header class="main-header">
         <div class="top-header">
            <div class="container">
               <div class="row">
                  <div class="contact-info">
                     <div class="header-social">
                        <a href="<?=$single_app->facebook_link ?>"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="<?=$single_app->twitter_link ?>"><i class="fa-brands fa-twitter"></i></a>
                        <a href="<?=$single_app->instagram_link ?>"><i class="fa-brands fa-instagram"></i></a>
                        <a href="<?=$single_app->youtube_link ?>"><i class="fa-brands fa-youtube"></i></a>
                     </div>
                     <div class="phone-no">
                        <i class="fa-solid fa-phone"></i>
                        <span>+<?=$single_app->mobile_number ?></span>
                     </div>
                     <div class="mail">
                        <i class="fa-solid fa-envelope"></i>
                        <span><?=$single_app->email ?></span>
                     </div>
                  </div>
                  <?php if(empty(user_detail())): ?>
                  <div class="right-buttons">
                     <!--<div class="sign-up">-->
                     <!--    <a href="#" class="btn">Sign Up</a>-->
                     <!--</div>-->
                     <div class="my-account">
                        <a href="<?= base_url('login') ?>" class="btn">My Account</a>
                     </div>
                  </div>
                  <?php else: ?>
                  <div class="sign-up">
                     <div class="my-account">
                        <a href="<?= base_url('user/dashboard') ?>" class="btn"><?= user_detail()->customer_name ?></a>
                        <a href="<?= base_url('login/logout') ?>" class="btn btn-a-sm">Logout</a>
                     </div>
                  </div>
                  <?php endif; ?>
               </div>
            </div>
         </div>
         <div class="bottom-header">
            <div class="container">
               <div class="row">
                  <div class="logo">
                     <img src="<?= base_url('front-end/') ?>/images/pink7-regular-logo.svg" alt="pink7">
                  </div>
                  <nav class="navigation login-nav">
                     <ul class="menu">
                        <li><a class="active" href="<?= base_url() ?>home">Home</a></li>
                        <li><a href="<?= base_url() ?>home/aboutpage">About</a></li>
                        <li><a href="#">Products</a><i class="fa-solid fa-caret-down"></i></li>
                        <li><a href="#">Services</a><i class="fa-solid fa-caret-down"></i></li>
                        <li><a href="<?= base_url() ?>home/pricingpage">Pricing</a></li>
                        <li><a href="<?= base_url() ?>home/contactspage">Contact</a></li>
                     </ul>
                     <div class="close-btn">
                        <div class="close">
                        </div>
                     </div>
                  </nav>
                  <a href="#" class="toggler">
                  <span>
                  </span>
                  </a>
               </div>
               <div class="greets">
                  <div class="col-md-5 col-5" style="float: right;">
                     <h3>Celebrate business with perfect 
                        Greetings & Invitations
                     </h3>
                     <p>Choose from our library of stunning layouts to create 
                        an original and thgoughtful card with ease.
                     </p>
                     <a href="<?= base_url('user') ?>"><button  class="registerus">REGISTER WITH US</button></a>
                  </div>
               </div>
               <div class="Banner_Background mt-5"> <img src="<?= base_url('front-end/') ?>/images/Banner_Background.svg"></div>
            </div>
         </div>
      </header>
      <!-- Gallery Section Start -->