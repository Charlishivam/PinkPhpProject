<!DOCTYPE html>
   <?php   $fetchData = "SELECT * FROM `ci_general_settings`";
           $single_app    = $this->db->query($fetchData)->row();
      
     ?>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>index - pink7</title>
        <link rel="stylesheet" type="text/css" href="<?= base_url('front-end/') ?>css/style.css?v=<?=time()?>" />
        <link rel="stylesheet" type="text/css" href="<?= base_url('front-end/') ?>css/bootstrap.min.css?v=<?=time()?>" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="<?= base_url('front-end/') ?>css/owl.carousel.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url('front-end/') ?>css/responsive.css?v=<?=time()?>" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    </head>
    <body>
        <!-- -------------Start-banner-section-here-------------- -->
         <header class="header-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-6">
                        <div class="header-left-box common-flex">
                            <div class="social-media-icon">
                                <span>
                                    <a href="<?=$single_app->facebook_link ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </span>
                                <span>
                                    <a href="<?=$single_app->twitter_link ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </span>
                                <span>
                                    <a href="<?=$single_app->instagram_link ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </span>
                                <span>
                                    <a href="<?=$single_app->youtube_link ?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
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
                                        <span><i class="fa fa-envelope mr-1" aria-hidden="true"></i></span><?=$single_app->email ?>
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php if(empty(user_detail())): ?>
                    <div class="col-12 col-md-12 col-lg-6 text-right">
                        <div class="right-btn">
                            <div class="common-btn">
                                <a href="<?= base_url('login') ?>" class="btn btn-a-sm">My Account</a>
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="col-12 col-md-12 col-lg-6 text-right">
                        <div class="right-btn">
                            <div class="common-btn">
                                <a href="<?= base_url('user/dashboard') ?>" class="btn btn-a-sm"><?= user_detail()->customer_name ?></a>
                                <a href="<?= base_url('login/logout') ?>" class="btn btn-a-sm">Logout</a>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </header>

     
        <!-- ----------script-file----------------- -->
        <script src="<?= base_url('front-end/') ?>js/jquery-3.6.0.js"></script>
        <script src="<?= base_url('front-end/') ?>js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url('front-end/') ?>js/owl.carousel.min.js"></script>
        <script src="<?= base_url('front-end/') ?>js/script.js"></script>
    </body>
</html>
