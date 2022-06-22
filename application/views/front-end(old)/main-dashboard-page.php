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
.feature-carousel img
{
    width:270px!important;
    height:180px!important;
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
            <div class="upcoming-events">
               <h2>Poster of the Day</h2>
               
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
            </div>
         </div>
      </div>
</section>
<section>
   <div class="container list text-center">
      <div class="row">
         <div class="col-sm-9 col-md-9 col-lg-9 col-xl-9 col-12 ml-auto">
            <div class="contacts-list mt-5">
               <div class="card mb-5">
                  <div class="card-body">
                     <div class="row">       
                        <div class="col-md-5 col-sm-5 col-lg-5 col-xl-5 col-12">
                           <h3 class="text mt-3">Recent Posts Summary </h3>
                        </div>
                        <div class="col-md-7 col-sm-7 col-lg-7 col-xl-7 col-12">
                           <div class="form mb-5">
                              <i class="fa fa-search"></i>
                                 <input type="text" class="form-control form-input" placeholder="Search by date, month, festival">
                                 <span class="left-pan">
                                    <i class="fas fa-sliders-h"></i>
                                 </span>
                           </div>
                        </div>
                     </div>
                     <div class="container">
                        <div class="row">
                           <table class="table table-striped text-center">
                              <thead>
                                 <tr class="status">
                                    <th scope="col">Image</th>
                                    <th scope="col">Festival Name</th>
                                    <th scope="col">Scheduled on</th>
                                    <th scope="col">Created on</th>
                                    <th scope="col">Status</th>
                                    <!--<th scope="col">Edit</th>-->
                                 </tr>
                              </thead>
                              <tbody>
                                  
                                  <?php if(!empty($schedule)): ?>
                                    <?php foreach($schedule as $schedule_key => $schedule_value): ?>
                                           
                                 <tr>
                                    <td><img src="<?= base_url($schedule_value->schedule_file_path) ?>" with="50px" height="50px"></td>
                                    <td>Akshaya Vrat</td>
                                    <td><?= $schedule_value->schedule_date?> <?= $schedule_value->schedule_time?></td>
                                    <td><?= $schedule_value->schedule_create_at?></td>
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
                                  
                                    <!--<td> 
                                    <a href=""
                                       class="btn-a-sm"
                                       > <i class="fa fa-edit"></i></a>
                                    <a href=""
                                       class="btn-a-sm"
                                       > <i class="fa fa-trash"></i></a>
                                     </td>-->
                                 </tr>
                                   <?php endforeach;?>
                                 <?php endif; ?>
                                
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <div class="container text-center mt-5">
                        <div class="row">
                          <div class="Favourite">
                            <h3 class="text">User Management </h3>
                           </div>
                           <div class="container">
                              <div class="row">
                                 <div class="col-md-7 py-1">
                                    <div class="card">
                                       <div class="card-body graph">
                                          <h5>1028 <i class="fa-solid fa-caret-up"></i></h5>
                                          <p>Your brand has reached 
                                          to people till date</p>
                                          <canvas id="chBar"></canvas>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-5 graph py-1">
                                    <canvas id="pieChart" style="max-width: 280px;"></canvas>
                                    <p>Reach on Social Media</p>
                                 </div>
                              </div>
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