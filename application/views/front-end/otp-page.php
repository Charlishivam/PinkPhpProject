<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=ezdge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    <link rel="stylesheet" href="<?= base_url('front-end') ?>/css/style1.css">
    <style>
    .main-header {
    min-height: 100px;
    }
    </style>


<body>

  
    <!-- Login Start -->

    <div class="login">
        <div class="container">
            <div class="row">
                   
                <div class="login-outer-content">
                    <div class="login-image">
                        <img src="<?= base_url('front-end') ?>/images/login-image.png" alt="login-img">
                    </div>
                    <div class="login-content">
                        <div class="login-inner-content">
                            <?php include('common-file/error_message.php'); ?>
                            <h1>Please enter the otp sent to your mobile number</h1>
                            <?= form_open('login/otp','class="form-search", id="otp-screen", Method="POST"'); ?>
                                <div class="row" style="min-height: 0px;">
                                    <div class="phone-box col-lg-3" style="width:20%;">
                                        <input type="text" name="otp1" class="form-control" maxlength="1" required autocomplete="off">
                                    </div>
                                    <div class="phone-box col-lg-3" style="width:20%; padding-left: 5px;">
                                        <input type="text" name="otp2" class="form-control" maxlength="1" required autocomplete="off">
                                    </div>
                                    <div class="phone-box col-lg-3" style="width:20%; padding-left: 5px;">
                                        <input type="text" name="otp3" class="form-control" maxlength="1" required autocomplete="off">
                                    </div>
                                    <div class="phone-box col-lg-3" style="width:20%; padding-left: 5px;">
                                        <input type="text" name="otp4" class="form-control" maxlength="1" required autocomplete="off">
                                    </div>
                                </div>
                                <br>

                                <input type="submit" value="Verify" class="btn2">
                                <span>Didn't received <a href="#">Resend</a></span>

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

<script src="http://demo.harnishdesign.net/html/oxyy/js/theme.js"></script>
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