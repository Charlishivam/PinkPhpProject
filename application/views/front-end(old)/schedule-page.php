<!-- DataTables -->
<link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"> 
<?php include('common-file/user_header.php'); ?>
<style>
    .info:hover
{
  background-color: rgb(204, 241, 241, 1);
  border-top-right-radius: 25px;
  border-bottom-right-radius: 25px;
}
.admin
{
    color: var(--primary-color);
}

  /*THE SAME CSS IS USED IN ALL 3 DEMOS*/    
/*gallery margins*/  
ul.gallery{    
margin-left: 3vw;     
margin-right:3vw;  
}    

.zoom {      
-webkit-transition: all 0.35s ease-in-out;    
-moz-transition: all 0.35s ease-in-out;    
transition: all 0.35s ease-in-out;     
cursor: -webkit-zoom-in;      
cursor: -moz-zoom-in;      
cursor: zoom-in;  
}     

.zoom:hover,  
.zoom:active,   
.zoom:focus {
/**adjust scale to desired size, 
add browser prefixes**/
-ms-transform: scale(4.5);    
-moz-transform: scale(4.5);  
-webkit-transform: scale(4.5);  
-o-transform: scale(4.5);  
transform: scale(4.5);    
position:relative;      
z-index:100;  
}

/**To keep upscaled images visible on mobile, 
increase left & right margins a bit**/  
@media only screen and (max-width: 992px) {   
ul.gallery {      
margin-left: 15vw;       
margin-right: 15vw;
}

/**TIP: Easy escape for touch screens,
give gallery's parent container a cursor: pointer.**/
.DivName {cursor: pointer}
}  
</style>


<section>
   <div class="container mt-5">
      <div class="row">
         <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 col-12">
            <?php include('user-side-bar.php'); ?>
         </div>
         <div class="col-sm-9 col-md-9 col-lg-9 col-xl-9 col-12">
            <div class="row">
               <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12 mt-2">
                  <h5>Import Contact Files to share greetings</h5>
                  <p>Personal info and Options to manage it. You can make some of this info, like your contct details, visible to others so they can reach your easly. you can also see a summary of ypur profile</p>
               </div>
               <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12" style="margin-top: -40px;">
                  <img src="<?= base_url('front-end') ?>/images/Links/icon1.jpg" alt="">
               </div>
            </div>
            <div class="row">
         <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12 ">
            <div class="contacts-list mt-5">
               <div class="card mb-5">
                  <div class="card-body">
                     
                     <div class="container">
                        <div class="row">
                           <table id="example1" class="table table-striped text-center">
                              <thead>
                                 <tr class="status">
                                    <th scope="col">Image</th>
                                    <th scope="col">Social Media</th>
                                    <th scope="col">Festival Name</th>
                                    <th scope="col">Scheduled on</th>
                                    <th scope="col">Created on</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                  
                                  <?php if(!empty($schedule)): ?>
                                    <?php foreach($schedule as $schedule_key => $schedule_value): 
                                          $schedule_social_media =   json_decode($schedule_value->schedule_social_media);
                                          $schedule_media        =   json_decode($schedule_value->schedule_media);
                                         ?>
                                 <tr>
                                    <td> <img class="thumbnail zoom" src="<?= base_url($schedule_value->schedule_file_path); ?>?v=2.<?= time()?>" width="100px" height="50px" alt="image" />  </td>
                                    
                                    <td>
                                       
                                        <?php if($schedule_social_media->whatsaap == true): ?> 
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                           <span class="text-dark">Whatsapp -C</span>
                                        </div>
                                        <?php endif; ?>
                                        
                                       
                                        <?php if($schedule_media->instagram == true): ?> 
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                           <span class="text-dark">Instagram  -C</span>
                                        </div>
                                        <?php endif; ?>
                                        
                                        
                                        <?php if($schedule_social_media->twitter == true): ?> 
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                           <span class="text-dark">Twitter  -C</span>
                                        </div>
                                        <?php endif; ?>
                                       
                                       
                                        <?php if($schedule_social_media->facebook == true): ?> 
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                           <span class="text-dark">facebook -C</span>
                                        </div>
                                        <?php endif; ?>
                                    </td>
                                   
                                    <td><?= $schedule_media->greeting_name?></td>
                                    <td><?= date('d-m-Y',$schedule_value->schedule_date); ?><?= $schedule_value->schedule_time ?></td>
                                    <td><?= date('d-m-Y',$schedule_value->schedule_create_at); ?></td>
                                    <td>
                                        <?php if($schedule_value->schedule_is_send == '1'): ?> 
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                           <span class="text-dark">Completed</span>
                                        </div>
                                        <?php endif; ?>
                                        <?php if($schedule_value->schedule_is_send == '0'): ?> 
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                           <span class="text-dark">Processed</span>
                                        </div>
                                        <?php endif; ?>
                                    </td>
                                    
                                    <td>
                                        <a style="margin-top: 5px;" href="<?php echo site_url("single/scheduleedit/".$schedule_value->schedule_id); ?>" class="btn btn-warning border-0 text-white btn-xs mr5" >
                                        <i class="fa fa-edit"></i>
                                        </a>
                                        <a style="margin-top: 5px;" href="<?php echo site_url("user/scheduldelete/".$schedule_value->schedule_id); ?>" onclick="return confirm('are you sure to delete?')" class="btn btn-danger border-0 text-white btn-xs"><i class="fa fa-trash"></i></a>
                                     </td>
                                  
                                   
                                 </tr>
                                   <?php endforeach;?>
                                 <?php endif; ?>
                                
                              </tbody>
                           </table>
                        </div>
                     </div>
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
         </div>
      </div>
</section>



<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    $("#example1").DataTable();
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer">
    </script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="<?= base_url('front-end/') ?>js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
   $('.feature-carousel').owlCarousel({
     margin: 15,
     loop: true,
     nav: true,
     dots: false,
     autoplay: false,
     autoplayTimeout: 4000,
     autoplayHoverPause: true,
     responsive: {
       0: {
         items: 1,
       },
       640: {
         items: 2,
       },
       800: {
         items: 2,
       },
       1140: {
         items: 3
       }
     }
   });
</script>
<script>
   $('.toggler').click(function () {
       $('.navigation').addClass('slide');
   });
   $('.close-btn').click(function () {
       $('.navigation').removeClass('slide');
   });
</script>
<script type="text/javascript">
   // chart colors
   var colors = ['#007bff','#28a745','#333333','#c3e6cb','#dc3545','#6c757d'];
   /* bar chart */
   var chBar = document.getElementById("chBar");
   if (chBar) {
   new Chart(chBar, {
   type: 'bar',
   data: {
     labels: ["S", "M", "T", "W", "T", "F", "S"],
     datasets: [{
       data: [589, 445, 483, 503, 689, 692, 634],
       backgroundColor: colors[0]
     },
     {
       data: [639, 465, 493, 478, 589, 632, 674],
       backgroundColor: colors[1]
     }]
   },
   options: {
     legend: {
       display: false
     },
     scales: {
       xAxes: [{
         barPercentage: 0.4,
         categoryPercentage: 0.5
       }]
     }
   }
   });
   }
</script>
<script type="text/javascript">
   var ctxP = document.getElementById("pieChart").getContext('2d');
   var myPieChart = new Chart(ctxP, {
     type: 'pie',
     data: {
       labels: ["Blue", "Red", "Green"],
       datasets: [{
         data: [270, 100, 100],
         backgroundColor: ["#007bff","#F46D43","#28a745"],
         hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870"]
       }]
     },
     options: {
       responsive: true
     }
   });
</script>


<?php include('common-file/user_footer.php'); ?>