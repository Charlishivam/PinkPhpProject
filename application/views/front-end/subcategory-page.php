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
   .swiper-slide img
</style>

<!-- Hero end -->
<!-- Gallery Section Start -->
<div class="gallery" style="margin-top: 200px;">
   <div class="container mt-5">
      <div class="row">
       
            <div class="grid-wrapper" id="wrapper">
                <?php if(!empty($greeting_data)): ?>
                <?php foreach($greeting_data as $greetingdata_key => $greetingdata_value): ?>
                <a href="<?= site_url('single/'.base64_encode($greetingdata_value->greeting_id)) ?>">
                   <div>
                      <img src="<?= base_url('uploads/greeting').'/'.$greetingdata_value->greeting_image ?>"/>
                   </div>
                </a>
               <?php endforeach; ?>
               <?php else: ?>
               <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                  <div class="card-body">
                     <h2 class="card-title">Image Not available</h2>
                     <p class="card-text">This Category Image is not available.</p>
                  </div>
               </div>
               <?php endif; ?>
            </div>
           
            <div class="view-more">
               <a href="<?= base_url()."home" ?>" class="btn2">View more</a>
            </div>
          
         </div>
      </div>
   </div>
</div>



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