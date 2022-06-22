<?php require_once(__DIR__.'/common-file/_header.php') ; ?>
<?php 
$mobiles = !empty($single->weblink_mobiles) ? json_decode($single->weblink_mobiles) : '';
$mobile  = ''; 
if($mobiles->mobile_1){
   $mobile = $mobiles->mobile_1;
}else if($mobiles){
   $mobile = $mobiles->mobile_2;
}else if($mobiles){
   $mobile = $mobiles->mobile_3;
}
?>
<div class="page new-skin">
<!-- preloader -->
<div class="preloader">
   <div class="centrize full-width">
      <div class="vertical-center">
         <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
         </div>
      </div>
   </div>
</div>
<!-- background -->
<div class="background gradient">
   <ul class="bg-bubbles">
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
   </ul>
</div>
<!--
   Container
   -->
<div class="container opened" data-animation-in="fadeInLeft" data-animation-out="fadeOutLeft">

<header class="header">
   <!-- header profile -->
   <div class="profile">
      <div class="title">V.I.P Dental Care</div>
      <div class="subtitle subtitle-typed">
         <div class="typing-title">
            <p>Dr. Vr Mishra</p>
            <p>15 years of experience</p>
         </div>
      </div>
   </div>
   <!-- menu -->
   <div class="top-menu">
      <ul>
         <?php $pages = !empty($single->weblink_pages) ? json_decode($single->weblink_pages): array(); ?>
         <?php foreach($pages as $key => $value) { ?>
         <li class="<?= $key  == 0 ? 'active' : '' ?>">
            <a href="#page_<?= $key ?>">
            <i class="fa fa-file-o" aria-hidden="true"></i>
            <span class="link"><?= $value->name ?></span>
            </a>
         </li>
         <?php } ?>
         <?php $gallery = !empty($single->weblink_gallery) ? json_decode($single->weblink_gallery): array(); ?>
         <?php if(!empty($gallery)){ ?>
         <li>
            <a href="#gallery">
            <i class="fa fa-picture-o"></i>
            <span class="link">Gallery</span>
            </a>
         </li>
         <?php } ?>
         <li>
            <a href="#company-profile">
            <span class="fa fa-users"></span>
            <span class="link">Services</span>
            </a>
         </li>
         <li>
            <a href="#review">
            <span class="icon ion-chatbox-working"></span>
            <span class="link">Review</span>
            </a>
         </li>
         <li>
            <a href="#inquiry">
            <span class="fa fa-envelope-open-o"></span>
            <span class="link">Inquiry</span>
            </a>
         </li>
         <li>
            <a href="#payment-details">
            <span class="fa fa-credit-card	"></span>
            <span class="link">Payment Details</span>
            </a>
         </li>
      </ul>
   </div>
</header>
<!--Card - Started-->
<!-- pages start-->
<?php foreach($pages as $key => $value) { ?>
<div class="card-inner animated <?= $key  == 0 ? 'active' : '' ?>" id="page_<?= $key ?>">
   <div class="card-wrap">
      <!--About-->
      <div class="content about">
         <!-- title -->
         <div class="title"><?= $value->name ?></div>
         <!-- content -->
         <div class="row">
            <div class="col col-d-12 col-t-12 col-m-12 border-line-v">
               <div class="text-box">
                  <p>
                     <?= $value->description ?>
                  </p>
               </div>
            </div>
            <div class="clear"></div>
         </div>
      </div>
   </div>
</div>
<?php } ?>
<!-- pages end-->
<div class="card-started" id="home-card">
   <!--Profile-->
   <div class="profile">
      <!-- profile image -->
      <div class="slide" style="background-image: url(<?= base_url('template/theme_dental_1/') ?>images/img6.jpeg); background-size: cover;"></div>
      <div class="image avt-img">
         <img src="<?= base_url('template/theme_dental_1/') ?>images/img5.jpeg" alt="">
      </div>
      <!-- profile titles -->
      <div class="title" style="font-size: 30px;"><?= $single->weblink_title ?></div>
      <!--<div class="subtitle">Web Designer</div>-->
      <div class="subtitle subtitle-typed">
         <div class="typing-title">
            <p>Fees - 200 rs</p>
         </div>
      </div>
      <div class="subtitle subtitle-typed">
         <div class="typing-title">
            <p>Monday to Saturday, 10 to 8</p>
         </div>
      </div>
      <!-- profile socials -->
      <div class="social">
         <?php $socials = json_decode($single->weblink_socials); ?>
         <?php if(!empty(@$socials->facebook)){ ?>
         <a target="_blank" href="<?= @$socials->facebook ?>" class="share-social"><span
            class="fa fa-facebook-official"></span></a>
         <?php } ?>
         <?php if(!empty(@$socials->twitter)){ ?>
         <a target="_blank" href="<?= @$socials->twitter ?>" class="share-social"><span
            class="fa fa-twitter"></span></a>
         <?php } ?>
         <?php if(!empty(@$socials->youtube)){ ?>
         <a target="_blank" href="<?= @$socials->youtube ?>" class="share-social"><span
            class="fa fa-youtube-square"></span></a>
         <?php } ?>
         <?php if(!empty(@$socials->instagram)){ ?>
         <a target="_blank" href="<?= @$socials->instagram ?>" class="share-social"><span
            class="fa fa-instagram"></span></a>
         <?php } ?>
         <?php if(!empty(@$socials->linkedin)){ ?>
         <a target="_blank" href="<?= @$socials->linkedin ?>" class="share-social"><span
            class="fa fa-linkedin"></span></a>
         <?php } ?>
         <?php if(!empty(@$socials->pinterest)){ ?>
         <a target="_blank" href="<?= @$socials->linkedin ?>" class="share-social"><span
            class="fa fa-pinterest"></span></a>
         <?php } ?>
      </div>
      <!-- profile socials -->
      <!-- profile buttons -->
      <div class="lnks">
         <a href="tel:+91969653032" class="lnk">
         <span class="text">Call</span>
         </a>
         <a href="" class="lnk discover" download>
            <span class="text">Save Contact</span>
         </a>
      </div>
   </div>
</div>
<div class="whatsapp-form">
   <div class="form-wrapper">
      <div class="inp-whap">
         <input type="text" id="whatsapp-no" class="nar-inp">
      </div>
      <div class="submit-whap">
         <button class="wht-btn" onclick="openWhatsapp()">
         <span class="fa fa-whatsapp"></span> SHARE ON WHATSAPP
         </button>
      </div>
   </div>
</div>

<div class="card-inner animated" id="company-profile">
<div class="card-wrap">
   <div class="content services">
      <!-- title -->
      <div class="title">V.I.P Dental Care</div>
      <!-- content -->
      <div class="row service-items border-line-v">
         <div class="row service-items border-line-v">
            <!-- service item -->
            <div class="col col-d-6 col-t-6 col-m-12 border-line-h cust-list">
               <ol>
               <li>Dental Pain Relive(RCT& Others)</li>
               <li>Carious Teeth Fillings</li>
               <li>Dental Implants</li>
               <li>Crown & Bridges</li>
               <li>complete Dentures</li>
               <li>Sensitivity Managment</li>
               <li>Treatment Of Bleeding Gums and Halitosis </li>
               <li>Pediatric Dental Care Regime</li>
               <li>Treatment Of Jaw Fracture Jaw Swellings &other Procedures </li>
               <ol>
               <div class="col col-d-6 col-t-6 col-m-12 border-line-h">
                  <img src="<?= base_url('template/theme_dental_1/') ?>images/gallery/img1.jpeg" width="250px">
                  <div class="service-item">
                     <div class="name">
                        <!-- <span >Dental Wiring</span> -->
                     </div>
                     <!-- <div class="desc">
                        <div >
                        	<p>Modern and mobile-ready website that will help you reach all of your marketing.</p>
                        </div>
                        </div> -->
                  </div>
               </div>
               <!-- service item -->
               <div class="col col-d-6 col-t-6 col-m-12 border-line-h">
                  <img src="<?= base_url('template/theme_dental_1/') ?>images/gallery/img6.jpeg" width="250px">
                  <div class="service-item">
                     <div class="name">
                        <!-- <span >Dental Implant</span> -->
                     </div>
                     <!-- <div class="desc">
                        <div >
                        	<p>Music copying, writing, creating, transcription, arranging and composition services.</p>
                        </div>
                        </div> -->
                  </div>
               </div>
               <div class="col col-d-6 col-t-6 col-m-12 border-line-h collage-image">
                  <img src="<?= base_url('template/theme_dental_1/') ?>images/gallery/img8.jpeg">
                  <img src="<?= base_url('template/theme_dental_1/') ?>images/gallery/img9.jpeg">
               </div>
               <!-- service item -->
               <div class="col col-d-6 col-t-6 col-m-12 border-line-h">
                  <img src="<?= base_url('template/theme_dental_1/') ?>images/gallery/img2.jpeg" width="250px">
                  <div class="service-item">
                     <div class="name">
                        <!-- <span >Smile Design</span> -->
                     </div>
                     <!-- <div class="desc">
                        <div >
                        	<p>Advertising services include television, radio, print, mail, and web apps.</p>
                        </div>
                        </div> -->
                  </div>
               </div>
               <!-- service item -->
               <div class="col col-d-6 col-t-6 col-m-12 border-line-h">
                  <img src="<?= base_url('template/theme_dental_1/') ?>images/gallery/img3.jpeg" width="250px">
                  <div class="service-item">
                     <div class="name">
                        <!-- <span >Crown Lengthening</span> -->
                     </div>
                     <!-- <div class="desc">
                        <div >
                        	<p>Developing memorable and unique mobile android, ios and video games.</p>
                        </div>
                        </div> -->
                  </div>
               </div>
               <div class="col col-d-6 col-t-6 col-m-12 border-line-h">
                  <img src="<?= base_url('template/theme_dental_1/') ?>images/gallery/img4.jpeg" width="250px">
                  <div class="service-item">
                     <div class="name">
                        <!-- <span >Teeth Whitening</span> -->
                     </div>
                     <!-- <div class="desc">
                        <div >
                        	<p>Developing memorable and unique mobile android, ios and video games.</p>
                        </div>
                        </div> -->
                  </div>
               </div>
               <div class="col col-d-6 col-t-6 col-m-12 border-line-h">
                  <img src="<?= base_url('template/theme_dental_1/') ?>images/gallery/img5.jpeg" width="250px">
                  <div class="service-item">
                     <div class="name">
                        <!-- <span >Gum Treatment</span> -->
                     </div>
                     <!-- <div class="desc">
                        <div >
                        	<p>Developing memorable and unique mobile android, ios and video games.</p>
                        </div>
                        </div> -->
                  </div>
               </div>
               <div class="col col-d-6 col-t-6 col-m-12 border-line-h">
                  <img src="<?= base_url('template/theme_dental_1/') ?>images/gallery/img7.jpeg" width="250px">
                  <div class="service-item">
                     <div class="name">
                        <!-- <span >Smile Makeover</span> -->
                     </div>
                     <!-- <div class="desc">
                        <div >
                        	<p>Developing memorable and unique mobile android, ios and video games.</p>
                        </div>
                        </div> -->
                  </div>
               </div>
               <div class="clear"></div>
            </div>
         </div>
      </div>
      <!--Card - About-->
      <div class="card-inner animated" id="review">
         <div class="card-wrap">
            <!--About-->
            <div class="content about">
               <div class="content testimonials">
                  <!-- title -->
                  <div class="title">Reviews</div>
                  <!-- content -->
                  <div class="row testimonials-items">
                     <!-- client item -->
                     <div class="col col-d-12 col-t-12 col-m-12 border-line-v">
                        <div class="revs-carousel default-revs">
                           <div class="owl-carousel">
                              <div class="item">
                                 <div class="revs-item">
                                    <div class="text">
                                       Best dental care I have experienced. Feel like I was
                                       in good
                                       hands.You are doing great
                                       job keep it up Dr. Vijay Rai
                                    </div>
                                    <div class="user">
                                       <!-- <div class="img"><img src="<?= base_url('template/theme_dental_1/') ?>images/aishwarya-mishra.jpg"
                                          alt="" /></div> -->
                                       <div class="info">
                                          <div class="name">Ankur Upadhyay</div>
                                          <div class="company">Owner, Exampleton
                                             Productions,
                                             Hyderabad
                                          </div>
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                 </div>
                              </div>
                              <div class="item">
                                 <div class="revs-item">
                                    <div class="text">
                                       Very confident n humble doctor, highly recommend for
                                       any dental
                                       treatment.
                                    </div>
                                    <div class="user">
                                       <!-- <div class="img"><img src="<?= base_url('template/theme_dental_1/') ?>images/amit-upadhyay.jpg" alt="" /> -->
                                       <!-- </div> -->
                                       <div class="info">
                                          <div class="name">Amit Upadhyay</div>
                                          <div class="company">Marketing Head, Pune</div>
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                 </div>
                              </div>
                              <div class="item">
                                 <div class="revs-item">
                                    <div class="text">
                                       Economical and best doctor.
                                    </div>
                                    <div class="user">
                                       <!-- <div class="img"><img src="<?= base_url('template/theme_dental_1/') ?>images/nripendra-misra.jpg" alt="" /> -->
                                       <!-- </div> -->
                                       <div class="info">
                                          <div class="name">Nripendra Mishra</div>
                                          <div class="company">Noida</div>
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="clear"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--Card - Blog-->
      <div class="card-inner blog" id="gallery">
         <div class="card-wrap">
            <!-- Blog -->
            <div class="content blog">
               <!-- title -->
               <div class="title">
                  <span>Appointment</span>
               </div>
               <!-- content -->
               <div class="row border-line-v">
                  <!-- blog item -->
                  <?php foreach($gallery as $keys => $data){ ?>
                  <div class="col col-d-6 col-t-6 col-m-12">
                     <div class="box-item">
                        <div class="image">
                           <a href="https://api.whatsapp.com/send/?phone=+91<?= $mobile ?>&text=http://vipdental.meracards.com/ Hi, I wanted to take your appointment and know about offers as well! Lets Connect.."
                              target="_blank">
                           <img src="<?= base_url($data->gallry_url) ?>" alt="By spite about do of allow" />
                           <span class="info">
                           <span class="ion ion-document-text"></span>
                           </span>
                           </a>
                        </div>
                        <div class="desc">
                           <a href="https://api.whatsapp.com/send/?phone=+91<?= $mobile ?>&text=http://vipdental.meracards.com/ Hi, I wanted to take your appointment and know about offers as well! Lets Connect.."
                              target="_blank">
                           <span class="date">Click To Take Appointment</span>
                           </a>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
                  <div class="clear"></div>
               </div>
            </div>
         </div>
      </div>
      <!--Card - Contacts-->
      <div class="card-inner contacts" id="inquiry">
         <div class="card-wrap">
            <!--
               Conacts Info
               -->
            <div class="content contacts">
               <!-- title -->
               <div class="title">Get in Touch</div>
               <!-- content -->
               <div class="row">
                  <div class="col col-d-12 col-t-12 col-m-12 border-line-v">
                     <div class="map"> <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3072.139475006431!2d83.00042991455962!3d25.282352283856586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x398e3165b93812e5%3A0xb3fed61b3eecded!2sDr.+Vijay+Rai+Dental+And+Implant+Centre!5e1!3m2!1sen!2sin!4v1537464272258"
                        width="560" height="240" frameborder="0" style="border:0;"
                        allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
                     <div class="info-list">
                        <ul>
                           <li><strong>Address1 </strong> Kamachcha Branch: Infront Of Kashiraj
                              Apartment,Varanasi
                           </li>
                           <li><strong>Address2 </strong> Sigra Branch: Ramakant Nagar Colony,
                              Near Pishach,Varanasi
                           </li>
                           <li><strong>Address3 </strong> Chadwak Branch: Infront Of
                              Chandrakeshwar Mahadev Temple,Chauraha
                           </li>
                           <li><strong>Email </strong> <a
                              href="mailto:myselfvijay4@gmail.com">vipdentalcarevns@gmail.com</a>
                           </li>
                           <li><strong>Phone </strong> <a
                              href="tel:91969653032">+91969653032</a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="clear"></div>
               </div>
            </div>
            <!--
               Contact Form
               -->
            <div class="content contacts">
               <!-- title -->
               <div class="title">Contact Form</div>
               <!-- content -->
               <div class="row">
                  <div class="col col-d-12 col-t-12 col-m-12 border-line-v">
                     <div class="contact_form">
                        <form id="cform" method="post">
                           <div class="row">
                              <div class="col col-d-6 col-t-6 col-m-12">
                                 <div class="group-val">
                                    <input type="text" name="name"
                                       placeholder="Full Name" />
                                 </div>
                              </div>
                              <div class="col col-d-6 col-t-6 col-m-12">
                                 <div class="group-val">
                                    <input type="text" name="email"
                                       placeholder="Email Address" />
                                 </div>
                              </div>
                              <div class="col col-d-6 col-t-6 col-m-12">
                                 <div class="group-val">
                                    <input type="text" name="mobile"
                                       placeholder="Mobile No" />
                                 </div>
                              </div>
                              <div class="col col-d-6 col-t-6 col-m-12">
                                 <div class="group-val">
                                    <input type="text" name="city"
                                       placeholder="Your City" />
                                 </div>
                              </div>
                              <div class="col col-d-12 col-t-12 col-m-12">
                                 <div class="group-val">
                                    <textarea name="message"
                                       placeholder="Your Message"></textarea>
                                 </div>
                              </div>
                           </div>
                           <div class="align-left">
                              <a href="#" class="button"
                                 onclick="$('#cform').submit(); return false;">
                              <span class="text">Send Message</span>
                              <span class="arrow"></span>
                              </a>
                           </div>
                        </form>
                        <div class="alert-success">
                           <p>Thanks, your message is sent successfully.</p>
                        </div>
                     </div>
                  </div>
                  <div class="clear"></div>
               </div>
            </div>
         </div>
      </div>

      <div class="card-inner contacts" id="payment-details">
         <div class="card-wrap">
            <!--
               Conacts Info
               -->
            <div class="content">
               <!-- title -->
               <div class="title">Payment Details</div>
               <!-- content -->
               <div class="row">
                  <div class="col col-d-6 col-t-12 col-m-12 border-line-v">
                     <div class="info-list">
                        <ul>
                           <li><strong>Account Name </strong> VIP DENTAL CARE</li>
                           <li><strong>Account Number </strong> 37374244314</li>
                           <li><strong>IFSC code </strong> SBIN0031495</li>
                        </ul>
                     </div>
                  </div>
                  <div class="col col-d-6 col-t-12 col-m-12 border-line-v">
                     <div class="info-list">
                        <img src="<?= base_url('template/theme_dental_1/') ?>images/qr-code.png" height="250px" width="250px">
                     </div>
                  </div>
                  <div class="clear"></div>
               </div>
            </div>
         </div>
         <div class="style">
            <a href="https://api.whatsapp.com/send/?phone=+91<?= $mobile ?>&text=Hi, I Am Intrested In Digital Bussiness Card Kindly Contact Me"
               target="_blank" class="anchor">Click Me to Book Your Digital Bussiness Card</a>
         </div>
      </div>
   </div>
</div>
<div class="footer">
   <div class="app-bar-tab">
      <a href="#home-card">
         <div class="top-icon">
            <span class="material-icons">
            home
            </span>
         </div>
         <div class="bottom-title">
            <h5>Home</h5>
         </div>
      </a>
   </div>
   <?php foreach($pages as $key => $value) { ?>
   <div class="app-bar-tab">
      <a href="#page_<?= $key ?>">
         <div class="top-icon">
            <span class="material-icons">
            article
            </span>
         </div>
         <div class="bottom-title">
            <h5><?= $value->name ?></h5>
         </div>
      </a>
   </div>
   <?php } ?>
   
   <div class="app-bar-tab">
      <a href="#payment-details">
         <div class="top-icon">
            <span class="material-icons">
            payment
            </span>
         </div>
         <div class="bottom-title">
            <h5>Payments</h5>
         </div>
      </a>
   </div>
   <div class="app-bar-tab">
      <a href="#gallery">
         <div class="top-icon">
            <span class="material-icons">
            collections
            </span>
         </div>
         <div class="bottom-title">
            <h5>Gallery</h5>
         </div>
      </a>
   </div>
   <div class="app-bar-tab">
      <a href="#review">
         <div class="top-icon">
            <span class="material-icons">
            grade
            </span>
         </div>
         <div class="bottom-title">
            <h5>Feedback</h5>
         </div>
      </a>
   </div>
   <div class="app-bar-tab">
      <a href="#inquiry">
         <div class="top-icon">
            <span class="material-icons">
            try
            </span>
         </div>
         <div class="bottom-title">
            <h5>Enquiry</h5>
         </div>
      </a>
   </div>
</div>
<?php require_once(__DIR__.'/common-file/_footer.php') ; ?>