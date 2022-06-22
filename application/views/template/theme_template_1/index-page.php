<?php require_once(__DIR__.'/common-file/_header.php') ; ?>
<?php 
   $mobiles = !empty($single->weblink_mobiles) ? json_decode($single->weblink_mobiles) : '';
   $mobile  = ''; 
   if($mobiles->mobile_1){
      $mobile = $mobiles->mobile_1;
   }else if($mobiles->mobile_2){
      $mobile = $mobiles->mobile_2;
   }
   $whatsapp = '';
   if($mobiles->mobile_3){
      $whatsapp = $mobiles->mobile_3;
   }
   ?>
<div id="loader"></div>
<script>
   var myVar;
   function myFunction() {
     myVar = setTimeout(showPage, 3000);
   }
   function showPage() {
     document.getElementById("loader").style.display = "none";
     document.getElementById("myDiv").style.display = "block";
   }
</script>
<!---------------loader end-->
<section class="container-fluid">
   <section class="row banner text-white text-center">
      <section class="col">
         <section class="logo bg-dark">
            <img src="<?= base_url($single->weblink_logo) ?>" height="100%" width="100%" alt="" />
         </section>
         <h2><?= $single->weblink_title ?></h2>
         <h4><?= $single->cat_name ?></h4>
      </section>
   </section>
</section>
<!---------------------nav banner start-->
<section class="container-fluid">
   <section class="row nav_banner text-center">
      <section class="col">
          <?php $socials = json_decode($single->weblink_socials); ?>
         <ul>
            <?php if(!empty($mobile)){ ?>
            <li>
               <a href="call:<?= $mobile ?>" target="_blank"><i class="fas fa-phone-alt"></i></a>
            </li>
            <?php } ?>
            <?php if(!empty($whatsapp)){ ?>
            <li>
               <a href="https://api.whatsapp.com/send?phone=<?= $whatsapp ?>" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
            </li>
            <?php } ?>
            <?php if(!empty($single->weblink_email)){ ?>
            <li>
               <a href="mail:<?= $single->weblink_email ?>" target="_blank"><i class="fas fa-envelope"></i></a>
            </li>
            <?php } ?>
            <?php if(!empty($single->weblink_address)){ ?>
            <li>
               <a href="https://www.google.com/maps/place/<?= $single->weblink_address ?>" target="_blank"><i class="fas fa-map-marker-alt"></i></a>
            </li>
            <?php } ?>
            <?php if(!empty(@$socials->facebook)){ ?>
            <li>
               <a href="<?= @$socials->facebook ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
            </li>
            <?php } ?>
            
            <?php if(!empty(@$socials->twitter)){ ?>
            <li id="hiddeling_link">
               <a href="<?= @$socials->twitter ?>" target="_blank"><i class="fab fa-twitter"></i></a>
            </li>
            <?php } ?>
            
            <?php if(!empty(@$socials->linkedin)){ ?>
            <li>
               <a href="<?= @$socials->linkedin ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            </li>
            <?php } ?>
            
            <?php if(!empty(@$socials->instagram)){ ?>
            <li>
               <a href="<?= @$socials->instagram ?>" target="_blank"><i class="fab fa-instagram"></i></a>
            </li>
            <?php } ?>
            
            <?php if(!empty(@$socials->youtube)){ ?>
            <li>
               <a href="<?= $socials->youtube ?>" target="_blank"><i class="fab fa-youtube"></i></a>
            </li>
            <?php } ?>
         </ul>
         <p><?= $single->weblink_address ?></p>
      </section>
   </section>
</section>
<!----------------------about us start-->
<?php $pages = !empty($single->weblink_pages) ? json_decode($single->weblink_pages): array(); ?>
<?php foreach($pages as $key => $value) { ?>
<section class="container my-4">
   <section class="row about_us">
      <section class="col">
         <h2><?= $value->name ?></h2>
         <hr/>
         <?= $value->description ?>
      </section>
   </section>
</section>
<?php } ?>
<!--------------------gallery_strat-->
<?php $gallery = !empty($single->weblink_gallery) ? json_decode($single->weblink_gallery): array(); ?>
<?php if(!empty($gallery)){ ?>
<section class="container">
   <h2>Gallery</h2>
   <hr />
   <section class="row gallery_container">
       <?php foreach($gallery as $key => $value) { ?>
      <section class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
         <img
            src="<?= base_url($value->gallry_url) ?>"
            width="100%"
            alt=""
            />
         <section class="hover_div"></section>
      </section>
      <?php } ?>
   </section>
</section>
<?php } ?>
<!--------------------------contact form start-->
<section class="container-fluid my-4">
   <section class="row padding_5vh_top">
      <section class="col">
         <section class="container">
             <div class="row">
                <?php if($this->session->flashdata('success')) { ?>
                <div class="alert alert-success" role="alert" style="width: 100%;">
                  <h4 class="alert-heading">Thank You !</h4>
                  <p><?= $this->session->flashdata('success') ?></p>
                </div>
                <?php } ?>
             </div>
            <section class="row form_main_container">
               <section class="col">
                  <h2>Contact Form</h2>
                  <hr />
                  <?= form_open('weblink/savequery') ?>
                     <p>Name</p>
                     <p>
                        <input
                           type="text"
                           name="name"
                           placeholder="Enter Your Name"
                           
                           />
                          <input
                           type="hidden"
                           name="webid"
                           value="<?= $single->weblink_customer_id ?>"
                           />
                     </p>
                     <p>Mobile Number</p>
                     <p>
                        <input
                           type="number"
                           name="mobile"
                           placeholder="Enter Your Mobile Number"
                           />
                     </p>
                     <p>Email</p>
                     <p>
                        <input
                           type="text"
                           name="email"
                           placeholder="Enter Your Email"
                           />
                     </p>
                     <p>Subject</p>
                     <p>
                        <input
                           type="text"
                           name="subject"
                           placeholder="Enter Your subject"
                           />
                     </p>
                     <p>Message</p>
                     <p>
                        <textarea
                           name="msg"
                           placeholder="Enter Your Message"
                           cols="30"
                           rows="10"
                           ></textarea>
                     </p>
                     <p>
                        <input type="submit" value="Submit" />
                     </p>
                  <?= form_close() ?>
               </section>
            </section>
         </section>
      </section>
   </section>
</section>
<!-----------------------------youtube container for video showing-->
<?php $videourl = !empty($single->weblink_video_url) ? json_decode($single->weblink_video_url): array(); ?>
<?php if(!empty($videourl)){ ?>
<section class="container my-4">
   <h3>OUR VIDEOS ON YOUTUBE</h3>
   <section class="row youtube_container">
       <?php foreach($videourl as $key => $data){ ?>
      <section class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
         <section class="vid_container">
            <iframe
               width="100%"
               height="192px"
               src="<?= $data->url ?>"
               title="YouTube video player"
               frameborder="0"
               allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
               allowfullscreen
               ></iframe>
         </section>
      </section>
      <?php } ?>
   </section>
</section>
<?php } ?>
<!-----------------download app container start-->
<section class="container my-5">
   <section class="row text-black">
      <section class="col"></section>
      <section class="col-xl-6 col-lg-7 col-md-8 col-sm-12 my-auto">
         <section class="playstore">
            <img src="<?= base_url($assets) ?>images/playstore.jpg" width="100%" height="100%" alt="" />
         </section>
         <br />
         <h3>अपना प्रोफाइल बनाने के लिए डाउनलोड करें हमारी ऐप</h3>
      </section>
   </section>
</section>
<?php require_once(__DIR__.'/common-file/_footer.php') ; ?>