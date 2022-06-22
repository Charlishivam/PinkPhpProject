<?php   $fetchData     = "SELECT * FROM `ci_general_settings`";
        $single_app    = $this->db->query($fetchData)->row();
        
?>

<?php include('common-file/_login_header.php'); ?>
        <div class="login sign-up-page">
            <div class="container">
                <div class="main-box">
                    <div class="row align-items-center">
                       <div class="col-12 col-md-6 pl-md-0">
                            <div class="login-image">
                                <img class="w-100" src="<?= base_url('front-end/') ?>/images/login-image.png" alt="login-img">
                            </div>
                        </div>
                   
                        <div class="col-12 col-md-6">
                            <div class="login-content">
                                <div class="login-inner-content">
                                        <h1>Sign up for your account</h1>
                                    <!-- <form action=""> -->
                                        <?= form_open('user','class="form-search"'); ?>
                                        <div class="name-box">
                                            <label for="name">Name</label>
                                             <input type="text" class="form-control" id="name" name="name" required>
                                        </div>
                                        <div class="name-box">
                                            <label for="name">Phone no.</label>
                                            <input type="number" class="form-control" id="phone"  name="mobile" required>
                                        </div>
                                        <div class="remember-me text-center">
                                            <div>
                                                <input type="checkbox" name="cb" id="cb">
                                                <label for="cb">Remember me</label>
                                            </div>
                                            <span>Forget password?</span>
                                        </div>
                                        <input type="submit" value="Sign up" class="btn2">
                                        <div class="text-center mt-3">
                                             <span >Already have an account!</span>
                                        </div>
                                        <div class="sign-up text-center my-1">
                                            <a href="<?= base_url() ?>Login">
                                                <span>Or Sign up with</span>
                                            </a>
                                        </div>
                                        <div class="signup-icon mt-2">
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
        </div>
<?php include('common-file/_login_footer.php'); ?>

   