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
.card img
{
    width:175px;
    height:175px;
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
      <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12 mt-4">
         <h5>Your profile info in pink7 services</h5>
         <p>Personal info and Options to manage it. You can make some of this info, like your contct details, visible to others so they can reach your easly. you can also see a summary of ypur profile</p>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
         <img src="<?= base_url('front-end/') ?>images/Links/icon1.jpg" alt="">
      </div>
   </div>
   <div class="card">
      <div class="card-body">
         <h5>Upcoming Events</h5>
         <p>Some info may be visible to other people using pink7 service. <span class="text-primary">Learn more</span></p>
         <div class="row">
            <?php if(!empty($tag_greeting_data)): ?>
               <?php foreach($tag_greeting_data as $key => $data): ?>
                <div class="col-md-3">
                   <div class="card">
                      <img src="<?= base_url().'/'.$data->upcomming_events_image ?>" />
                        <a href="<?= site_url('user/upcomingimage/'.$data->upcomming_events_id) ?>"> 
                          <div class="card-body">
                             <i class="fa fa-plus" aria-hidden="true"></i>&nbsp <?= $data->upcomming_events_title ?>  
                          </div>
                        </a>
                   </div>
                </div>
                <!-- Modal -->
                <?php endforeach; ?>
                <?php else: ?>
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                  <div class="card-body">
                    <h2 class="card-title">Image Not available</h2>
                    <p class="card-text">This Category Image is not available.</p>
                  </div>
                </div>
                <?php endif; ?>
         </div>
      </div>
   </div>
</section>
<?php include('common-file/user_footer.php'); ?>
