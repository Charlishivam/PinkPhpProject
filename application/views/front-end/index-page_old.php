<?php include('common-file/_header1.php'); ?>
<style>
   input,
   label {
   display: inline-block;
   vertical-align: middle;
   margin-bottom: 4px;
   }
   .clientsdata {
   background: #eeee;
   padding: 30px 0px !important;
   margin-top: 100px;
   }
 
   
   
   .feature-carousel img
{
    width:270px!important;
    height:180px!important;
}
  
</style>
<!-- Hero end -->
<!-- Gallery Section Start -->
<div class="gallery" style="margin-top: 200px;">
    
   <div class="container mt-5">
      <div class="row">
         <div class="category">
            <div class="category-content">
               <h2>Category/Sub Category</h2>
               <ul>
                  <?php if(!empty($category_data)): ?>
                    <?php foreach($category_data as $category_data_key => $category_data_value): ?>
                        <li data-toggle="collapse" data-target="#demo_<?= $category_data_value->cat_id ?>">
                            <input type="checkbox" id="#demo_1<?= $category_data_value->cat_id ?>"  class="subOptionbb" name="cat_id[]" value="<?= $category_data_value->cat_id ?>">
                            <label for="option"><?= $category_data_value->cat_name ?></label>
                            <?php if(!empty($category_data_value->subcatgory)): ?>
                              <div id="demo_<?= $category_data_value->cat_id ?>" class="collapse">
                                <ul>
                                  <?php foreach($category_data_value->subcatgory as $subcategory_data_key => $subcategory_data_value): ?>
                                    <li><label><input type="checkbox" id="subcatgory_<?= $subcategory_data_value->cat_id ?>" class="subOption" name="subcatid[]" value="<?= $subcategory_data_value->cat_id ?>"> <?= $subcategory_data_value->cat_name ?></label></li>
                                  <?php endforeach; ?>
                                  
                                </ul>
                            </div>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
         </div>
         <div class="upcoming-events">
            <h2>Upcoming Events</h2>
            <div class="owl-carousel owl-theme feature-carousel" style="margin-top: 30px;">
           
               <?php if(!empty($upcoming_data)): ?>
               <?php foreach($upcoming_data as $key => $data): ?>
               <a href="<?= site_url('user/upcomingimage/'.$data->upcomming_events_id) ?>"> 
                     <div class="main-item">
                           <div class="item">
                              <div class="item-image">
                                 <img src="<?= base_url().'/'.$data->upcomming_events_image ?>" />
                              </div>
                              <div class="item-body">
                                 <h3><?= $data->upcomming_events_title ?></h3>
                              </div>
                           </div>
                     </div>
                  </a>
               <?php endforeach; ?>
               <?php else: ?>
               <div class="main-item">
                  <a href="#">
                     <div class="item">
                        <div class="item-image">
                           <img src="<?= base_url('front-end/') ?>images/Env.jpg" alt="Product-two">
                        </div>
                        <div class="item-body">
                           <h3>International Environment Day</h3>
                        </div>
                     </div>
                  </a>
               </div>
               <?php endif; ?>
            
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
                  create a greeting card that will be cherished.
               </p>
               <p>Our online design tool allows you to create personalized greetings cards for every occasion.
                  Choose from our library of hundreds of beautifully designed layouts and customize them to
                  your liking.
               </p>
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
<!-- Why Us Start -->

<!-- Why Us End -->
<!-- our client section start -->
<section class="clientheading">
   <div class="container-fluid">
      <div class="clientheading-title">
         <h2>Our Clients</h2>
      </div>
   </div>
</section>
<!-- ======= our Clients Section start ======= -->
<section>
   <div class="container clientsdata my-5">
      <div class="container clients-value mt-3">
         <div class="clients-slider swiper-container">
            <div class="swiper-wrapper align-items-center">
               <?php if(!empty($client_data)): ?>
               <?php foreach($client_data as $client_key => $client_value): ?>
               <div class="swiper-slide"><img src="<?= base_url('/'.$client_value->customer_image) ?>" alt="Product-One"></div>
               <?php endforeach;?>
               <?php endif; ?>
            </div>
            <div class="swiper-pagination"></div>
         </div>
      </div>
   </div>
</section>
<!-- our Clients Section end-->
<!-- Our Clients Says Start -->
<section class="our-clients">
   <div class="container">
      <div class="row">
         <h1>Our Clients Says</h1>
      </div>
      <div class="row">
         <div class="owl-carousel owl-theme">
            <?php if(!empty($testimonial_data)): ?>
            <?php foreach($testimonial_data as $testimonial_key => $testimonial_value): ?>
            <div class="item">
               <div class="item-img">
                  <img src="<?= base_url('uploads/testimonial').'/'.$testimonial_value->testimonial_image ?>" alt="Product-One">
               </div>
               <h2><?= $testimonial_value->testimonial_title?></h2>
               <h4><?= $testimonial_value->testimonial_subtitle?></h4>
               <p><?= $testimonial_value->testimonial_description?></p>
            </div>
            <?php endforeach;?>
            <?php endif; ?>
         </div>
      </div>
   </div>
</section>

<!-- Our Clients Says End -->
<?php include('common-file/_footer.php'); ?>




<script>
   $(function(){
         $('.subOption,subOptionbb').click(function(){
           var val = [];
           $(':checkbox:checked').each(function(i){
             val[i] = $(this).val();
           });
           jQuery.ajax({
               type: "POST",
               url: "home/partial",
               data: {cat_id:val},
               success: function(data){
                if(data){
                 $('#wrapper').html(data);
                }else{
                    
                }
               }
           });
         });
         });
</script>
