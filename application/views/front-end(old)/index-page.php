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

   .plus, .minus {
            display: inline-block; 
    background-repeat: no-repeat;
    background-size: 16px 16px !important;
    width: 16px;
    height: 16px; 
    background-color:transparent!important;
            /*vertical-align: middle;*/
        }

        .plus {
            background-image: url(https://img.icons8.com/color/48/000000/plus.png);
        }

        .minus {
            background-image: url(https://img.icons8.com/color/48/000000/minus.png);
        }

        ul {
            list-style: none;
            padding: 0px 0px 0px 20px;
        }

            ul.inner_ul li:before {
                content: "├";
                font-size: 18px;
                margin-left: -11px;
                margin-top: -5px;
                vertical-align: middle;
                float: left;
                width: 8px;
                color: #41424e;
            }

            ul.inner_ul li:last-child:before {
                content: "└";
            }

        .inner_ul {
            padding: 0px 0px 0px 35px;
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
                  <div class="tree_main">
                    <ul id="bs_main" class="main_ul">
                        <?php if(!empty($category_data)): ?>
                            <?php foreach($category_data as $category_data_key => $category_data_value): ?>
                            <li id="bs_1">
                                <span class="plus" style="background-color:none !important;">&nbsp;</span>
                                <input type="checkbox" id="c_bs_1" class="subOption" value="<?= $category_data_value->cat_id ?>"/>
                                <span><?= $category_data_value->cat_name ?> </span>
                                <?php if(!empty($category_data_value->subcatgory)): ?>
                                <ul id="bs_l_1" class="sub_ul" style="display: none;margin-left:20px;">
                                    <?php foreach($category_data_value->subcatgory as $subcategory_data_key => $subcategory_data_value): ?>
                                    <li id="bf_1">
                                        <input type="checkbox" id="c_bf_1" class="subOption" name="subcatid[]" value="<?= $subcategory_data_value->cat_id ?>" />
                                        <span><?= $subcategory_data_value->cat_name ?></span>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                                <?php endif; ?>
                            </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
         </div>
         <div class="upcoming-events">
            <h2>Upcoming Events</h2>
             <div class="owl-carousel owl-theme feature-carousel">
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
                               <h3><?= date('d-m-Y',strtotime($data->upcomming_events_date)); ?></h3>
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
            
            
             <?php if(!empty($greeting_data)): ?>
              <div class="masonry" id="wrapper">
               <?php foreach($greeting_data as $greetingdata_key => $greetingdata_value): ?>
                   <div class="mItem" style="margin-bottom: 0px !important;">
                       <a href="<?= site_url('single/'.base64_encode($greetingdata_value->greeting_id)) ?>">
                            <img src="<?= base_url('uploads/greeting').'/'.$greetingdata_value->greeting_image ?>"/>
                      </a>
                   </div>
               
                <?php endforeach; ?>
              </div>
             <?php else: ?>
             
               <div class="mItem" style="margin-bottom: 0px !important;">
                   <h2 class="card-title">Image Not available</h2>
                    <p class="card-text">This Category Image is not available.</p>
               </div>
             <?php endif; ?>
          
           
            <div class="view-more">
               <a href="<?= base_url()."home" ?>" class="btn2">View more</a>
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
         <h2>Client's Logo</h2>
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
               <div class="swiper-slide"><img src="<?= base_url('/uploads/client/'.$client_value->client_image) ?>" alt="Product-One"></div>
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

<!-- Our Clients Says End -->
<?php include('common-file/_footer.php'); ?>


<script>
    $(document).ready(function () {
    $(".plus").click(function () {
        $(this).toggleClass("minus").siblings("ul").toggle();
    })

    $("input[type=checkbox]").click(function () {
        //alert($(this).attr("id"));
        //var sp = $(this).attr("id");
        //if (sp.substring(0, 4) === "c_bs" || sp.substring(0, 4) === "c_bf") {
            $(this).siblings("ul").find("input[type=checkbox]").prop('checked', $(this).prop('checked'));
        //}
    })

    $("input[type=checkbox]").change(function () {
        var sp = $(this).attr("id");
        if (sp.substring(0, 4) === "c_io") {
            var ff = $(this).parents("ul[id^=bf_l]").attr("id");
            if ($('#' + ff + ' > li input[type=checkbox]:checked').length == $('#' + ff + ' > li input[type=checkbox]').length) {
                $('#' + ff).siblings("input[type=checkbox]").prop('checked', true);
                check_fst_lvl(ff);
            }
            else {
                $('#' + ff).siblings("input[type=checkbox]").prop('checked', false);
                check_fst_lvl(ff);
            }
        }

        if (sp.substring(0, 4) === "c_bf") {
            var ss = $(this).parents("ul[id^=bs_l]").attr("id");
            if ($('#' + ss + ' > li input[type=checkbox]:checked').length == $('#' + ss + ' > li input[type=checkbox]').length) {
                $('#' + ss).siblings("input[type=checkbox]").prop('checked', true);
                check_fst_lvl(ss);
            }
            else {
                $('#' + ss).siblings("input[type=checkbox]").prop('checked', false);
                check_fst_lvl(ss);
            }
        }
    });

})

function check_fst_lvl(dd) {
    //var ss = $('#' + dd).parents("ul[id^=bs_l]").attr("id");
    var ss = $('#' + dd).parent().closest("ul").attr("id");
    if ($('#' + ss + ' > li input[type=checkbox]:checked').length == $('#' + ss + ' > li input[type=checkbox]').length) {
        //$('#' + ss).siblings("input[id^=c_bs]").prop('checked', true);
        $('#' + ss).siblings("input[type=checkbox]").prop('checked', true);
    }
    else {
        //$('#' + ss).siblings("input[id^=c_bs]").prop('checked', false);
        $('#' + ss).siblings("input[type=checkbox]").prop('checked', false);
    }

}

function pageLoad() {
    $(".plus").click(function () {
        $(this).toggleClass("minus").siblings("ul").toggle();
    })
}
</script>




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
