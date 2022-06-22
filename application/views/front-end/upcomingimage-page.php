<?php include('common-file/_header.php'); ?>

<!-- Gallery Section Start -->
<div class="gallery">
   <div class="container mt-5">
      <div class="row">
         <div class="upcoming-events">
            <h2>Upcoming <span>Event</span></h2>
            <div class="masonry" id="wrapper">
                <?php if(!empty($greeting_data)): ?>
                    <?php foreach($greeting_data as $greetingdata_key => $greetingdata_value): ?>
                        <a href="<?= site_url('single/'.base64_encode($greetingdata_value->greeting_id)) ?>">
                           <div class="mItem" style="margin-bottom: 0px !important;">
                              <img class="w-100"  src="<?= base_url('uploads/greeting').'/'.$greetingdata_value->greeting_image ?>"/>
                           </div>
                        </a>
                   <?php endforeach; ?>
               <?php else: ?>
               <div class="mItem" style="margin-bottom: 0px !important;">
                    <h2 class="card-title">Image Not available</h2>
                    <p class="card-text">This Category Image is not available.</p>
               </div>
               <?php endif; ?>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Gallery Section End -->

<section class="home-about">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-5 d-flex align-items-center">
                <div>
                    <h1 class="sub-title mb-4">Why Us</h1>
                    <h3 class="mb-4 font-weight-bold">Create a greeting card your friends and family</h3>
                    <p>There’s nothing better than receiving a heartfelt greeting card from a friend or loved one.
                        Forget
                        generic cards that will be easily discarded, allow Us to unleash your creative potential and
                        create a greeting card that will be cherished.</p>
                    <p>Our online design tool allows you to create personalized greetings cards for every occasion.
                        Choose from our library of hundreds of beautifully designed layouts and customize them to
                        your liking.</p>
                </div>
            </div>
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-6">
                        <div class="icon-bx-wraper style-3 m-b30 box-hover wow fadeInUp mb-30px">
                            <div class="icon-bx-sm radius bgl-primary">
                                <a class="icon-cell" href="/#">
                                    <img src="<?= base_url('front-end/') ?>images/home-icona.png">
                                </a>
                            </div>
                            <div class="wraper-effect"></div>
                            <div class="icon-content" style="min-height: 85px;">
                                <h4 class="dlab-title m-b15">Unlimited Access</h4>
                                <p class="mb-0">Choose from thousands of ecards and printable cards.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="icon-bx-wraper style-3 m-b30 box-hover wow fadeInUp mb-30px">
                            <div class="icon-bx-sm radius bgl-primary">
                                <a class="icon-cell" href="/#">
                                    <img src="<?= base_url('front-end/') ?>images/home-icon2.png">
                                </a>
                            </div>
                            <div class="wraper-effect"></div>
                            <div class="icon-content" style="min-height: 85px;">
                                <h4 class="dlab-title m-b15">Plan Ahead</h4>
                                <p class="mb-0">Schedule cards up to a year in advance.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="icon-bx-wraper style-3 m-b30 box-hover wow fadeInUp mb-30px">
                            <div class="icon-bx-sm radius bgl-primary">
                                <a class="icon-cell" href="/#">
                                    <img src="<?= base_url('front-end/') ?>images/home-icon3.png">
                                </a>
                            </div>
                            <div class="wraper-effect"></div>
                            <div class="icon-content" style="min-height: 85px;">
                                <h4 class="dlab-title m-b15">Never Forget</h4>
                                <p class="mb-0">We'll remind you of important birthday and anniversaries.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="icon-bx-wraper style-3 m-b30 box-hover wow fadeInUp mb-30px">
                            <div class="icon-bx-sm radius bgl-primary">
                                <a class="icon-cell" href="/#">
                                    <img src="<?= base_url('front-end/') ?>images/home-icon4.png">
                                </a>
                            </div>
                            <div class="wraper-effect"></div>
                            <div class="icon-content" style="min-height: 85px;">
                                <h4 class="dlab-title m-b15">Add a Gift</h4>
                                <p class="mb-0">Attach a gift card to any ecard.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include('common-file/_footer.php'); ?>
