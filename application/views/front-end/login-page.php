<?php include('common-file/_login_header.php'); ?>

        <div class="login">
            <div class="container">
                <div class="main-box">
                    <div class="row align-items-center">
                       <div class="col-12 col-md-6 pl-md-0">
                            <div class="login-image">
                                <img class="w-100" src="<?= base_url('front-end/') ?>images/login-image.png" alt="login-img">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <?php include('common-file/error_message.php'); ?>
                            <div class="login-content">
                                <div class="login-inner-content">
                                        <h1>Please Login for your account</h1>
                                    <!-- <form action=""> -->
                                        <?= form_open('login','class="form-search"'); ?>
                                        <div class="name-box">
                                            <label for="name">Enter Mobile No</label>
                                            <input type="text" id="mobile" class="form-control" name="mobile">
                                        </div>
                                        <div class="remember-me text-center">
                                            <div>
                                                <input type="checkbox" name="cb" id="cb">
                                                <label for="cb">Remember me</label>
                                            </div>
                                            <span>Forget password?</span>
                                        </div>
                                        <input type="submit" value="Login" class="btn2">
                                        <div class="text-center mt-3">
                                             <span >Not registered? <a class="pink-color" href="<?= base_url() ?>User">Sign Up</a></span>
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