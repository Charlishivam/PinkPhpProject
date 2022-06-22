<?php include('common-file/_header.php'); ?>
<style>
   .media {
   padding: 34px 50px;
   align-self: center;
   }
</style>
<?php $data = $single->row(); ?>
<section class="merchant">
   <div class="container">
      <div class="board pt-5">
         <h2><?= $data->greeting_name ?></h2>
         <p><?= $data->greeting_description ?></p>
         <p>Home &nbsp &nbsp<i class="fa fa-chevron-right"></i> &nbsp <?= $data->greeting_name ?></p>
      </div>
   </div>
</section>
<section>
   <div class="container mt-2">
      <div class="row">
         <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-12">
            <img src="<?= base_url('uploads/greeting/'.$data->greeting_image) ?>">
         </div>
         <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 col-12">
            <h2><?= $data->greeting_name ?></h2>
            <p><?= $data->greeting_description ?></p>
            <?php if($this->session->flashdata('error')){ ?>
            <div class="alert alert-danger d-flex align-items-center" role="alert">
               <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                  <use xlink:href="#exclamation-triangle-fill"/>
               </svg>
               <div>
                  <?= $this->session->flashdata('error') ?>
               </div>
            </div>
            <?php } ?>
            <?php if($this->session->flashdata('success')){ ?>
            <div class="alert alert-primary d-flex align-items-center" role="alert">
               <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Primary:">
                  <use xlink:href="#exclamation-triangle-fill"/>
               </svg>
               <div>
                  <?= $this->session->flashdata('success') ?>
               </div>
            </div>
            <?php } ?>
            <?= form_open() ?>
            
         
            <input type="hidden" name="schedule_id"  value="<?= $schedule_detail->schedule_id ?>">
            <div class="message-box mb-2 mt-2">
               <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
                        <div class="mb-2">
                      <h6>Post Content</h6>
                      <hr>
                    </div>
                         <textarea name="content"  class="form-control" ><?= $schedule_detail->schedule_content ?></textarea>
                         <?php echo form_error('content', '<div class="error">', '</div>'); ?>
                    </div>
               </div>
            </div>        
            <?php if(!empty($user->customer_logo1) || !empty($user->customer_logo2) || !empty($user->customer_logo2)){ ?>
            <div class="message-box mb-4 mt-4">
               <div class="mb-4">
                  <h6>Choose logo</h6>
                  <hr>
                  <div class="row">
                     <?php if(!empty($user->customer_logo1) && file_exists('uploads/images/customer/'.$user->customer_logo1)){ ?>
                     <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3" style="text-align: center;">
                        <div class="card text-center">
                           <img src="<?= base_url('uploads/images/customer/'.$user->customer_logo1) ?>" class="card-img-top media" alt="" width="100%">
                        </div>
                        <div class="custom-control mt-2">
                          <input type="radio" id="logo1" name="logo" class="custom-control-input" value="<?= 'uploads/images/customer/'.$user->customer_logo1 ?>" <?php if($schedule_detail->schedule_logo == 'uploads/images/customer/'.$user->customer_logo1) {?> checked="checked" <?php }?>>
                          <label class="custom-control-label" for="logo1"></label>
                        </div>
                      </div>
                     <?php } ?>
                     <?php if(!empty($user->customer_logo2) && file_exists('uploads/images/customer/'.$user->customer_logo2)){ ?>
                      <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3" style="text-align: center;">
                        <div class="card text-center">
                            <img src="<?= base_url('uploads/images/customer/'.$user->customer_logo2) ?>" class="card-img-top media" alt="" width="100%">
                        </div>
                        <div class="custom-control mt-2" >
                          <input type="radio" id="logo2" name="logo" class="custom-control-input" value="<?= 'uploads/images/customer/'.$user->customer_logo2 ?>" <?php if($schedule_detail->schedule_logo == 'uploads/images/customer/'.$user->customer_logo2) {?> checked="checked" <?php }?>>
                          <label class="custom-control-label" for="logo2"></label>
                        </div>
                      </div>
                      <?php } ?>
                      <?php if(!empty($user->customer_logo3) && file_exists('uploads/images/customer/'.$user->customer_logo3)){ ?>
                      <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3" style="text-align: center;">
                        <div class="card text-center">
                            <img src="<?= base_url('uploads/images/customer/'.$user->customer_logo3) ?>" class="card-img-top media" alt="" width="100%">
                        </div>
                        <div class="custom-control mt-2">
                          <input type="radio" id="logo3" name="logo" class="custom-control-input" value="<?= 'uploads/images/customer/'.$user->customer_logo3 ?>" <?php if($schedule_detail->schedule_logo == 'uploads/images/customer/'.$user->customer_logo3) {?> checked="checked" <?php }?>>
                          <label class="custom-control-label" for="logo3"></label>
                        </div>
                      </div>
                     <?php } ?>
                  </div>
                  <?php echo form_error('logo', '<div class="error">', '</div>'); ?>
               </div>
            </div>
            <?php } ?>
            <div class="message-box mb-4 mt-4">
               <div class="mb-2" id="msg_position">
                  <h6 class="mb-2">Logo Position</h6>
                  <hr>
                  <div class="custom-control custom-radio custom-control-inline mt-2">
                     <input type="radio" id="msgpos1" name="logo_position" class="custom-control-input position" value="top_left" <?php if($schedule_detail->schedule_logo_position == 'top_left') {?> checked="checked" <?php }?>>
                     <label class="custom-control-label" for="msgpos1">Top Left</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline mt-2">
                     <input type="radio" id="msgpos2" name="logo_position" class="custom-control-input position" value="bottom_left" <?php if($schedule_detail->schedule_logo_position == 'top_left') {?> checked="checked" <?php }?>>
                     <label class="custom-control-label" for="msgpos2">Bottom Left</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline mt-2">
                     <input type="radio" id="msgpos3" name="logo_position" class="custom-control-input position" value="top_right" <?php if($schedule_detail->schedule_logo_position == 'top_left') {?> checked="checked" <?php }?>>
                     <label class="custom-control-label" for="msgpos3">Top Right</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline mt-2">
                     <input type="radio" id="msgpos4" name="logo_position" class="custom-control-input position" value="bottom_right" <?php if($schedule_detail->schedule_logo_position == 'top_left') {?> checked="checked" <?php }?>>
                     <label class="custom-control-label" for="msgpos4">Bottom Right</label>
                  </div>
               </div>
               <?php echo form_error('logo_position', '<div class="error">', '</div>'); ?>
            </div>
            <div class="message-box mb-4 mt-4">
               <div class="mb-4">
                  <h6>Share media with social network and social sites </h6>
                  <hr>
                  <div class="row">
                     <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <div class="card text-center">
                           <img src="https://pink7.thedigitalkranti.com/front-end/images/Links/facebook1.png" class="card-img-top media" alt="" width="100%">
                           <div class="custom-control custom-control-inline mb-2">
                              <?php if($connection['fb_connection'] == true){ ?>
                              <input type="checkbox" name="facebook" value="facebook" id="toogles">
                              <label for="toogles" class="toogles-button"></label>
                              <?php }else{ ?>
                              <a href="<?= site_url('user/socialmedia') ?>" class="text-center btn btn-outline-danger waves-effect" style="margin: 0 auto;" title="view details" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                              <?php } ?>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <div class="card text-center">
                           <img src="<?= base_url('front-end/') ?>images/Links/instagram.png" class="card-img-top media" alt="" width="100%">  
                           <div class="custom-control  custom-control-inline mb-2">
                              <?php if($connection['insta_connection'] == true){ ?>
                              <input type="checkbox" name="instagram" class="custom-control-input position" value="instagram" id="toogles1">
                              <label for="toogles1" class="toogles-button"></label>
                              <?php }else{ ?>
                              <a href="<?= site_url('user/socialmedia') ?>" class="text-center btn btn-outline-danger waves-effect" style="margin: 0 auto;" title="view details" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                              <?php } ?>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <div class="card text-center">
                           <img src="<?= base_url('front-end/') ?>images/Links/twitter.png" class="card-img-top media" alt="" width="100%">
                           <div class="custom-control custom-control-inline mb-2">
                              <?php if($connection['tw_connection'] == true){ ?>
                              <input type="checkbox" name="twitter" class="custom-control-input position" value="twitter" id="toogles2">
                              <label for="toogles2" class="toogles-button"></label>
                              <?php }else{ ?>
                              <a href="<?= site_url('user/socialmedia') ?>" class="text-center btn btn-outline-danger waves-effect" style="margin: 0 auto;" title="view details" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                              <?php } ?>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <div class="card text-center">
                           <img src="https://logodownload.org/wp-content/uploads/2015/04/whatsapp-logo-1.png" class="card-img-top media" alt="" width="100%">
                           <div class="custom-control custom-control-inline mb-2">
                              <?php if($connection['whsp_connection'] == true){ ?>
                              <input type="checkbox" name="whatsapp" class="custom-control-input position" value="whatsapp" id="toogles3">
                              <label for="toogles3" class="toogles-button"></label>
                              <?php }else{ ?>
                              <a href="<?= site_url('whatsaap/dashboard/scan') ?>" class="btn btn-light w-50" style="margin: 0 auto;" title="view details" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                              <?php } ?>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php echo form_error('whatsapp', '<div class="error">', '</div>'); ?>
                  <?php echo form_error('twitter', '<div class="error">', '</div>'); ?>
                  <?php echo form_error('instagram', '<div class="error">', '</div>'); ?>
                  <?php echo form_error('facebook', '<div class="error">', '</div>'); ?>
               </div>
            </div>
            <div class="message-box mb-4 mt-4">
               <div class="row">
                  <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                     <input type="date" min="<?= date('Y-m-d',strtotime('+0 days')) ?>" name="date"  class="form-control" value="<?= $schedule_detail->schedule_date ?>">
                     <?php echo form_error('date', '<div class="error">', '</div>'); ?>
                  </div>
                  <?php $times = explode(':',$schedule_detail->schedule_time); ?>
                  <?php $hours = array_combine(range(1,24), range(1,24)); ?>
                  <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-2">
                     <?= form_dropdown('hours',$hours,set_value('hours',@$times[0]),'class="form-control" required') ?>
                     <?php echo form_error('hours', '<div class="error">', '</div>'); ?>
                  </div>
                  <?php $minutes = array_combine(range(1,59), range(1,59)); ?>
                  <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-2">
                     <?= form_dropdown('minutes',$minutes,set_value('minutes',@$times[1]),'class="form-control" required') ?>
                     <?php echo form_error('minutes', '<div class="error">', '</div>'); ?>
                  </div>
                  <?php $am_pm = array('AM'=>'AM','PM'=>'PM'); ?>
                  <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-2">
                     <?= form_dropdown('am_pm',$am_pm,set_value('am_pm',(@$times[0] > '12' ? "PM" : "AM")),'class="form-control" required') ?>
                     <?php echo form_error('am_pm', '<div class="error">', '</div>'); ?>
                  </div>
               </div>
            </div>
            
            <?php if(!empty($user->customer_logo1) && file_exists('uploads/images/customer/'.$user->customer_logo1) 
            || !empty($user->customer_logo2) && file_exists('uploads/images/customer/'.$user->customer_logo2) 
            || !empty($user->customer_logo2) && file_exists('uploads/images/customer/'.$user->customer_logo3)){ ?>
            <div class="message-box mb-4 mt-4">
               <div class="row">
                  <div class="col-md-4">
                     <div class="btn-group share w-100">
                        <button type="submit" class="btn btn-light w-100" name="preview" value="preview" style="padding: 11px 0px;"> Preview
                        </button>
                     </div>
                  </div>
                   <div class="col-md-4">
                     <div class="btn-group share w-100">
                        <button type="submit"  class="btn btn-light w-100" name="schedule" value="schedule" style="padding: 11px 0px;"> Schedule
                        </button>
                     </div>
                  </div>
                   <div class="col-md-4">
                     <div class="btn-group share w-100">
                        <button type="submit" class="btn btn-light w-100" name="publish" value="publish" style="padding: 11px 0px;"> Publish
                        </button>
                     </div>
                  </div>
               </div>
            </div>
            <?php }else{ ?>
            <div class="message-box mb-4">
               <div class="row">
                   <div class="alert alert-info alert-dismissible fade show" role="alert">
                      <strong>Alert !</strong> Your profile is not a configured , Please first update your profile and configured logo, after configuration you can schedule media. <a href="<?= site_url('user/companyinfo') ?>">Click here ?</a>
                    </div>
               </div>
            </div>
            <?php } ?>
            <div class="clearfix "></div>
            <?= form_close() ?>
            <hr>
            <!--<nav class="navbar instant mt-3">
               <ul>
                  <li><i class="fa fa-chevron-right"></i>&nbsp Schedule & send anytime, 100% Assured Delivery.</li>
                  <li><i class="fa fa-chevron-right"></i>&nbsp Send to Whatsapp, Facebook, etc.</li>
                  <li><i class="fa fa-chevron-right"></i>&nbsp Instant Live Preview with advanced customization.</li>
                  <li><i class="fa fa-chevron-right"></i>&nbsp Card with personalized message inside.</li>
               </ul>
               </nav>-->
         </div>
      </div>
   </div>
</section>
<?php include('common-file/_footer.php'); ?>