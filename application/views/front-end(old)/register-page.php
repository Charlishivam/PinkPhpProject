<?php   $fetchData     = "SELECT * FROM `ci_general_settings`";
        $single_app    = $this->db->query($fetchData)->row();
        
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Login</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
         integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
         crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="preconnect" href="https://fonts.googleapis.com">
       <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
       <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    
        <link rel="stylesheet" type="text/css" href="<?= base_url('front-end/') ?>css/style.css?v=<?=time()?>">
    <style>
        .btn
        {
            border-radius: 0px;
        }
    </style>
   </head>
   <body>
  

      <header class="main-header" style="min-height: 1px">
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
         
      </header>

<body>
   

    <!-- Header End -->
    <!-- Login Start -->
    <div class="login"style="margin-top:50px">
        <div class="container">
            <div class="row">
                <div class="login-outer-content signup-ct">
                    <div class="login-image">
                        <img src="<?= base_url('front-end') ?>/images/login-image.png" alt="login-img">
                    </div>
                    <div class="login-content">
                        <div class="login-inner-content">
                            <?php if($this->session->flashdata('error')){ ?>
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                              <div>
                                <?= $this->session->flashdata('error') ?>
                              </div>
                            </div>
                            <?php } ?>
                            <h1>Sign up for your account</h1>
                        <!--     <form action=""> -->
                            <?= form_open('user','class="form-search"'); ?>
                                <div class="name-box">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" required>
                                </div>
                                <div class="phone-box">
                                    <label for="phone">Phone no.</label>
                                    <input type="number" id="phone"  name="mobile" required>
                                </div>
                                <div class="remember-me">
                                    <div>
                                        <input type="checkbox" name="cb" id="cb">
                                        <label for="cb">Remember me</label>
                                    </div>
                                    <span>Forget password?</span>
                                </div>
                                <input type="submit" value="Get OTP" class="btn2">
                                <span>Already have an account! <a href="<?= base_url() ?>Login"></span>
                                <span>Or Sign up with</span>
                                <div class="signup-icon">
                                    <a href="#"><img src="<?= base_url('front-end') ?>/images/google.png" alt="Google"></a>
                                    <a href="#"><img src="<?= base_url('front-end') ?>/images/facebook.png" alt="Facebook"></a>
                                    <a href="#"><img src="<?= base_url('front-end') ?>/images/apple.png" alt="Apple"></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Login End -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer">
    </script>
    <script src="<?= base_url('front-end') ?>/js/main.js"></script>
    <Script>
        $('.toggler').click(function () {
            $('.navigation').addClass('slide');
        });
        $('.close-btn').click(function () {
            $('.navigation').removeClass('slide');
        });
    </Script>
</body>

</html>