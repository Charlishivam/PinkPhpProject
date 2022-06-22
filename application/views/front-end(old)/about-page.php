<?php include('common-file/_header.php'); ?>
<style>
    .says {
    background: #fde5f0!important;
    padding: 40px 0!important;
    margin-top: 90px!important;
}
.section-title {
    margin-top: -25px;
}
</style>
    <!-- About Start -->
    <section class="about">
        <div class="container">
            <div class="row">
                <div class="about-content">
                    <h2>About <span>Pink7</span></h2>
                    <p>We provide best creative graphics that make peoples’
                        hearts and minds blissful about the brand.</p>
                    <p>We work with businesses and organizations of all shapes and
                        sizes, from early-stage startups to big brands, to create the
                        products and services —print and digital— to solve the pain
                        of designing creatives and send it with regularity.</p><br>
                    <p>We work with businesses and organizations of all shapes and
                        sizes, from early-stage startups to big brands.</p>
                </div>
                <div class="about-image">
                    <img src="<?= base_url('front-end/') ?>images/3D.png" alt="about-img">
                </div>
            </div>
        </div>
    </section>

    <!-- About End -->


    <!-- Our creative solutions Start -->

    <section id="services" class="solutions">
        <div class="container-fluid">

            <div class="section-title">
                <h2>Our creative solutions help you <br>
                    to market a Quality Brand</h2>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-12">
                    <div class="card requirement text-center">
                        <span><img class="card-img-top" src="<?= base_url('front-end/') ?>images/Aboutus/noun-graphics-2183334.png"></span>
                        <div class="card-body">
                            <h5 class="card-title">Excellent Graphic
                                Templates</h5>
                            <p class="card-text">Sed ut perspiciatis unde red
                                omnisistenatus error sit volup
                                tatem accusantium doloremque</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-12">
                    <div class="card requirement text-center">
                        <span><img class="card-img-top" src="<?= base_url('front-end/') ?>images/Aboutus/noun-expert-3870970.png"></span>
                        <div class="card-body">
                            <h5 class="card-title">Best Industry
                                Expertise</h5>
                            <p class="card-text">Sed ut perspiciatis unde red
                                omnisistenatus error sit volup
                                tatem accusantium doloremque</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-12">
                    <div class="card requirement text-center">
                        <span><img class="card-img-top" src="<?= base_url('front-end/') ?>images/Aboutus/noun-solutions-2868252.png"></span>
                        <div class="card-body">
                            <h5 class="card-title">Fast & Effective
                                solutions</h5>
                            <p class="card-text">Sed ut perspiciatis unde red
                                omnisistenatus error sit volup
                                tatem accusantium doloremque</p>
                        </div>
                    </div>
                </div>
    </section>


    <section class="statements">
        <div class="container-fluid">

            <div class="statements-title">
                <h2>Statements</h2>
            </div>
        </div>
    </section>
    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 cpl-xl-6 col-12">
                    <div class="vision">
                        <h2>Our Vision</h2>
                        <h5>To publicise your Business out of the proverbial age.</h5>
                        <p>We provide best creative ideas. totam rem aperiam, gsdeaque
                            ipsa quae inventore. Nullam vulputate enim a mollis ultricesse.
                            Praesent laoreet rutrum eleifend. Nullam tristique tincidunt tom
                            ligula pulvinar varius. Proin ac efficitur lacus, eu pulvinar decf
                            neque. Etiam volutpat consectetur ligula in sollicitudin.</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 cpl-xl-6 col-12">
                    <img src="<?= base_url('front-end/') ?>images/Aboutus/female-logo-designer-working-her-tablet-connected-laptop.jpg">
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container mission">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-12">
                    <img src="<?= base_url('front-end/') ?>images/Aboutus/female-logo-designer-working-her-tablet-connected-laptop.jpg">
                </div>

                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-12">
                    <div class="vision">
                        <h2>Our Mission</h2>
                        <h5>To deliver results-oriented brand marketing to improve
                            business sales and foster growth.</h5>
                        <p>We provide best creative ideas.totam rem aperiam, gsdeaque
                            ipsa quae inventore. Nullam tristique tincidunt tom ligula pul
                            vinar varius. Proin ac efficitur lacus, eu pulvinar decfneque.
                            Etiam volutpat consectetur ligula in sollicitudin.</p>
                    </div>
                </div>
            </div>
    </section>
    <!-- Our creative solutions End -->

    <section class="our-clients text-center">
        <div class="container">

            <div class="heading white-heading">
                Our Clients Says
            </div>
            <div id="testimonial4" class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x" data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">
             
                <div class="carousel-inner" role="listbox">
                    <?php 
                      $count = 0;
                        foreach ($testimonial_data as $testimonial_value){
                      ?>
                    
                    <div class="carousel-item <?php 
                            if($count==0){
                              echo "active";  
                            }
                            else{
                                echo " ";
                            }
                        ?>">
                        <div class="testimonial4_slide">
                            <img src="<?= base_url('uploads/testimonial').'/'.$testimonial_value->testimonial_image ?>" class="img-circle img-responsive"> 
                            <h2><?= $testimonial_value->testimonial_title?></h2>
                            <h4><?= $testimonial_value->testimonial_subtitle?></h4>
                            <p><?= $testimonial_value->testimonial_description?></p>
                            
                        </div>
                    </div>
                 
                   <?php 
                        $count++;
                        }
                    ?>
                </div>
                <a class="carousel-control-prev" href="#testimonial4" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#testimonial4" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
    </section>
        
        <div class="container clarify my-5">
            <?php include('common-file/error_message.php'); ?>
            <div class="row">
                <div class="col-sm-7 col-md-7 col-lg-7 col-xl-7 col-12">
                    <img src="<?= base_url('front-end/') ?>images/Aboutus/11268Z_FAQ.jpg">
                </div>
                
                <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5 col-12 mt-4">
                    <h2>We love to clarify more...</h2>

                    <form method="POST" action="<?= base_url()."home/aboutpage" ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12 control">
                                <label for="">Name:</label>
                                <input type="text" name="contact_us_name" class="form-control" value="">
                            </div>
                            <div class="col-md-12 control">
                                <label for="">Phone No.:</label>
                                <input type="number" name="contact_us_phone" class="form-control" value="">
                            </div>
                            <div class="col-md-12 control">
                                <label for="">Message:</label>
                                <textarea class="form-control" placeholder="Enter Message" rows="4" name="contact_us_message">
                                </textarea>
                            </div>
                        </div>
                        <div class="submit text-center">
                            <button type="submit" class="btn btn-danger mt-3 px-3 py-2 text-white border-0"
                                style="font-size: 20px;">Submit</button>
                        </div>
                </div>
                </form>

            </div>
        </div>
        </div>
    </section>
    <!-- client section end -->
<?php include('common-file/_footer.php'); ?>