<!DOCTYPE html>
<html lang="en">
   <?php   $fetchData = "SELECT * FROM `ci_general_settings`";
      $single_app    = $this->db->query($fetchData)->row();
      
      ?>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Privacy Policy - pink7</title>
        <link rel="stylesheet" type="text/css" href="<?= base_url('front-end-new/') ?>css/style.css?v=<?=time()?>" />
        <link rel="stylesheet" type="text/css" href="<?= base_url('front-end-new/') ?>css/bootstrap.min.css?v=<?=time()?>" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="<?= base_url('front-end-new/') ?>css/swiper-bundle.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url('front-end-new/') ?>css/owl.carousel.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url('front-end-new/') ?>css/responsive.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    </head>
    
      
   </head>
   
   
   <!-- -------------Start-banner-section-here-------------- -->
        <header class="header-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-6">
                        <div class="header-left-box common-flex">
                            <div class="social-media-icon">
                                <span>
                                    <a href="<?=$single_app->facebook_link ?>"><i class="fa-brands fa-facebook-f"></i></a>
                                </span>
                                <span>
                                    <a href="<?=$single_app->twitter_link ?>"><i class="fa-brands fa-twitter"></i></a>
                                </span>
                                <span>
                                    <a href="<?=$single_app->instagram_link ?>"><i class="fa-brands fa-instagram"></i></a>
                                </span>
                                <span>
                                    <a href="<?=$single_app->youtube_link ?>"><i class="fa-brands fa-youtube"></i></a>
                                </span>
                            </div>

                            <div class="phone-number-box phone-box">
                                <a href="#">
                                    <p class="mb-0">
                                        <span><i class="fa fa-phone mr-1" aria-hidden="true"></i></span>+<?=$single_app->mobile_number ?>
                                    </p>
                                </a>
                            </div>

                            <div class="phone-number-box email-box">
                                <a href="#">
                                    <p class="mb-0">
                                        <span><i class="fa fa-envelope mr-1" aria-hidden="true"></i></span> <?=$single_app->email ?>
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-6 text-right">
                        <div class="right-btn">
                            <div class="common-btn">
                                <a href="login.php" class="btn">Deepak Singh</a>
                                <a href="#" class="btn">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <nav class="menu-section navbar navbar-expand-md">
            <div class="container">
                <div class="col-12 p-0">
                    <nav class="navbar navbar-expand-lg navbar-light header-section p-0 m-0">
                        <div class="logo-box">
                            <a href="index.php"><img class="w-100" src="img/pink-logo.png" /></a>
                        </div>
                        <button class="navbar-toggler" type="button" id="menu-button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <div class="menu-box">
                                <ul class="p-0 m-0 menu-list">
                                    <li class="nav-item">
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="about.php">about </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="about-two.php">products</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="about-two.php">services</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pricing.php">pricing</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="contact.php">contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </nav>




        <section class="mobile-view">
            <div class="wapper-box">
                <div class="overlay" id="menu-overlay"></div>
                <div class="sidebar-menu">
                    <div class="close-btn">
                        <div class="close" id="remove-menu"></div>
                    </div>
                    <div class="menu-box-scroll">
                        <div class="menu-box">
                            <ul class="p-0 m-0 menu-list">
                                <li class="nav-item">
                                    <a href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="about.php">about </a>
                                </li>
                                <li class="nav-item">
                                    <a href="about-two">products</a>
                                </li>
                                <li class="nav-item">
                                    <a href="about-two">services</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pricing.php">pricing</a>
                                </li>
                                <li class="nav-item">
                                    <a href="contact.php">contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        

        <!-- ----------script-file----------------- -->
        <script src="js/jquery-3.6.0.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/script.js"></script>
    </body>
</html>
   <body>
      <!-- Header Start -->
       <header class="header-section">
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
                        <a href="<?= base_url('login') ?>" class="btn btn-a-sm">My Account</a>
                     </div>
                  </div>
                  <?php else: ?>
                  <div class="sign-up">
                     <div class="my-account">
                        <a href="<?= base_url('user/dashboard') ?>" class="btn btn-a-sm"><?= user_detail()->customer_name ?></a>
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
                  <a href="<?= base_url() ?>">
                     <div class="logo">
                        <img  src="<?= base_url('front-end/') ?>images/pink7.svg" alt="pink7">
                     </div>
                  </a>
                  <nav class="navigation">
                     <ul class="menu">
                        <li><a class="active" href="<?= base_url() ?>home">Home</a></li>
                        <li><a href="<?= base_url() ?>home/aboutpage">About</a></li>
                        <li><a href="#">Products</a><i class="fa-solid fa-caret-down"></i></li>
                        <li><a href="#">Services</a><i class="fa-solid fa-caret-down"></i></li>
                        <li><a href="<?= base_url() ?>home/pricingpage">Pricing</a></li>
                        <li><a href="<?= base_url() ?>home/contactspage">Contact</a></li>
                     </ul>
                     <div class="close-btn">
                        <div class="close"></div>
                     </div>
                  </nav>
               </div>
            </div>
         </div>
      </header>
      <!-- Header End -->