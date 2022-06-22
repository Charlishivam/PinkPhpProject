<link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"> 
<?php include('common-file/_header.php'); ?>

    <section class="main-section common-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <div class="tab-section">
                            <ul class="nav tab-section" id="rowTab" data-remember-tab="tab_id" role="tablist" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <div class="nav-link active" id="home-tab" data-toggle="tab" data-target="#Dashboard" type="button" role="tab" aria-controls="home" aria-selected="true">
                                        <span><img src="<?= base_url('front-end/') ?>img/dashbord.png" /></span> Dashboard
                                    </div>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <div class="nav-link" id="profile-tab" data-toggle="tab" data-target="#Admin" type="button" role="tab" aria-controls="profile" aria-selected="false">
                                        <span><img src="<?= base_url('front-end/') ?>img/admin-info.png" /></span>Admin Info
                                    </div>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <div class="nav-link" id="contact-tab" data-toggle="tab" data-target="#Comapny" type="button" role="tab" aria-controls="contact" aria-selected="false">
                                        <span><img src="<?= base_url('front-end/') ?>img/Company-info.png" /></span> Comapny Info
                                    </div>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <div class="nav-link" id="contact-tab" data-toggle="tab" data-target="#Subscription" type="button" role="tab" aria-controls="contact" aria-selected="false">
                                        <span><img src="<?= base_url('front-end/') ?>img/Company-info.png" /></span> Subscription Info
                                    </div>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <div class="nav-link" id="contact-tab" data-toggle="tab" data-target="#Social" type="button" role="tab" aria-controls="contact" aria-selected="false">
                                        <span><img src="<?= base_url('front-end/') ?>img/social-media.png" /></span> Social Media Pages
                                    </div>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <div class="nav-link" id="contact-tab" data-toggle="tab" data-target="#Sync" type="button" role="tab" aria-controls="contact" aria-selected="false">
                                        <span><img src="<?= base_url('front-end/') ?>img/sycn.png" /></span> WhasApp Sync Contacts
                                    </div>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <div class="nav-link" id="contact-tab" data-toggle="tab" data-target="#Upcoming" type="button" role="tab" aria-controls="contact" aria-selected="false">
                                        <span><img src="<?= base_url('front-end/') ?>img/upcoming-event.png" /></span> Upcoming Events
                                    </div>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <div class="nav-link" id="contact-tab" data-toggle="tab" data-target="#Schedule" type="button" role="tab" aria-controls="contact" aria-selected="false">
                                        <span><img src="<?= base_url('front-end/') ?>img/delivered.png" /></span> Schedule
                                    </div>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <div class="nav-link" id="contact-tab" data-toggle="tab" data-target="#Delivered" type="button" role="tab" aria-controls="contact" aria-selected="false">
                                        <span><img src="<?= base_url('front-end/') ?>img/delivered.png" /></span> Delivered
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-lg-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="Dashboard" role="tab">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="your-profile-box">
                                            <h2 class="top-heading">Your profile Information on Pink7.in services</h2>
                                            <p class="text">
                                                Personal as well as Organisational details along with all version Logos will be saved under this section. These information is useful while brodcasting your message on different plateform.</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 mb-5 mb-md-0">
                                        <div class="img-box">
                                            <img class="w-100" src="<?= base_url('front-end/') ?>img/img.png" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="Upcoming Events common-content">
                                            <h2 class="heading">Poster of the Day</h2>
                                        </div>
                                        <div class="event-section mb-5">
                                            <div class="owl-carousel owl-theme feature-carousel" id="Poster">
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
                                                <a href="#">
                                                    <div class="main-item">
                                                        <div class="item">
                                                            <div class="item-image">
                                                                <img src="<?= base_url('front-end/') ?>img/event-img/Holi.jpg" />
                                                            </div>
                                                            <div class="item-body">
                                                                <h3>Holi</h3>
                                                                <h3>08-03-2023</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="contacts-list mt-md-0">
                                            <div class="card mb-5">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-5 col-sm-5 col-lg-5 col-xl-5 col-12">
                                                            <h5 class="text">All Schedule</h5>
                                                        </div>
                                                        <div class="col-md-7 col-sm-7 col-lg-7 col-xl-7 col-12">
                                                            <div class="form mb-5">
                                                                <i class="fa fa-search"></i>
                                                                <input type="text" class="form-control form-input" placeholder="Search by date, month, festival" />
                                                                <span class="left-pan">
                                                                    <i class="fas fa-sliders-h"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="container">
                                                        <div class="row">
                                                            <table class="table table-striped text-center table-responsive-md ">
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
                                                                    </tr>
                                                                    <?php  endforeach;?>
                                                                    <?php  endif;?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="container text-center mt-5">
                                                        <div class="row">
                                                            <div class="Favourite">
                                                                <h3 class="text">User Management</h3>
                                                            </div>
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col-md-7 py-1">
                                                                        <div class="card">
                                                                            <div class="card-body graph">
                                                                                <h5>1028 <i class="fa-solid fa-caret-up"></i></h5>
                                                                                <p>Your brand has reached to people till date</p>
                                                                                <img class="w-100" src="<?= base_url('front-end/') ?>img/left.jpg" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-5 graph py-1">
                                                                        <img class="w-100" src="<?= base_url('front-end/') ?>img/right.jpg" />
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
                            <div class="tab-pane fade show" id="Admin" role="tab">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="your-profile-box">
                                            <h2 class="top-heading">Your profile info in pink7 services</h2>
                                            <p class="text">
                                                Personal info and Option to manage it. You can make some of this info, like your contct details, visible to other so they can your easly. you also see a summary of your profile.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="img-box">
                                            <img class="w-100" src="<?= base_url('front-end/') ?>img/img.png" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="top-heading">Admin Profile</h5>
                                                <p>These details is secured and will not be visible to anyone outside Pink7.in. <span class="text-primary">Read more</span></p>
                                                    <?php echo form_open_multipart(base_url('user/dashboard'), 'class="form-horizontal"');  ?> 
                                                    <div class="row">
                                                        <div class="col-md-12 control">
                                                            <label for="">Name:</label>
                                                            <input type="text" name="customer_name" class="form-control" value="<?php echo set_value('customer_name', $single->customer_name) ?>" /> 
                                                        </div>
                                                        <div class="col-md-12 control">
                                                            <label for="">Email:</label>
                                                            <input type="text" name="customer_email" class="form-control" value="<?php echo set_value('customer_email', $single->customer_email) ?>" /> 
                                                        </div>
                                                        <div class="col-md-12 control">
                                                            <label for="">Phone:</label>
                                                            <input type="number" name="customer_mobile" class="form-control" readonly="" value="<?php echo set_value('customer_mobile', $single->customer_mobile) ?>"/>
                                                        </div>
                                                        <div class="col-md-12 control">
                                                            <label for="">Birthday:</label>
                                                            <input type="date" name="customer_dob" class="form-control" value="<?php echo set_value('customer_dob', $single->customer_dob) ?>"/>
                                                        </div>
                                                        <div class="col-md-12 control">
                                                            <label for="">Anniversary:</label>
                                                            <input type="date" name="customer_anniversary" class="form-control" value="<?php echo set_value('customer_anniversary', $single->customer_anniversary) ?>"/>
                                                        </div>

                                                        <div class="col-md-12 control">
                                                           <label for="">Gender:</label>
                                                           <input type="radio" value="0" checked="" name="customer_gender" /> Male &nbsp; &nbsp; <input type="radio" value="1" name="customer_gender" /> Female
                                                              
                                                        </div>

                                                        <div class="col-md-12 control">
                                                            <div class="row">
                                                                <label for="">&nbsp; &nbsp; Photo: &nbsp;</label>
                                                                <input type="file" name="customer_image" class="choose-image" value="choose image" />
                                                                <?php if(!empty($single->customer_image)): ?>
                                                                      <img src="<?= base_url() .$single->customer_image ?>" alt="Avatar" class="avatar"> 
                                                                <?php  else:?> 
                                                                       <img src="<?= base_url() ?>uploads/customer/img_avatar.png" alt="Avatar" class="avatar"> 
                                                                <?php  endif;?>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="update ml-auto px-4">
                                                            <div class="common-btn">
                                                                <button type="submit" class="btn">Update</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="Comapny">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="your-profile-box">
                                            <h2 class="top-heading">Your profile info in pink7 services</h2>
                                            <p class="text">
                                                Personal info and Option to manage it. You can make some of this info, like your contct details, visible to other so they can your easly. you also see a summary of your profile.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="img-box">
                                            <img class="w-100" src="<?= base_url('front-end/') ?>img/img.png" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <?php echo form_open_multipart(base_url('user/companyinfo'), 'class="form-horizontal"');  ?> 
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="top-heading">Organisation Details</h5>
                                                <p>Some info may be visible to other people using pink7 service. <span class="text-primary">Learn more</span></p>
                                                  
                                                    <div class="row">
                                                        <div class="col-md-12 control">
                                                            <label for="">Org Name:</label>
                                                            <input type="text" name="orgname" class="form-control" value="<?= set_value('orgname',$single->customer_organisation) ?>">
                                                        </div>
                                                        <div class="col-md-12 control">
                                                            <label for="">Address:</label>
                                                            <input type="text" name="address" class="form-control" value="<?= set_value('address',$single->customer_address) ?>" />
                                                        </div>
                                                        <div class="col-md-12 control">
                                                            <label for="">About org:</label>
                                                            <textarea class="form-control" placeholder="Enter Message" rows="4" name="about_org"><?= set_value('about_org',$single->customer_about_org) ?></textarea>
                                                        </div>
                                                        <div class="col-md-12 pl-0 control">
                                                            <div class="col-md-2">
                                                                <label for="">Org Logo:</label>
                                                            </div>
                                                            <div class="col-md-12 default mt-3">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="org text-center">
                                                                            <div class="circle">
                                                                                <input type="file" multiple="" name="customer_logo1" data-max_length="10" class="upload__inputfile" />
                                                                                <div class="img-box">
                                                                                    <?php if(!empty($single->customer_logo1)): ?>
                                                                                    <img src="<?= base_url('uploads/images/customer/'.$single->customer_logo1); ?>" alt="Avatar" class="w-100 h-100">
                                                                                    <?php  else:?> <img src="<?= base_url('front-end/') ?>img/Discuss-1_Black (1).png" alt="Avatar" class="avatar"> <?php  endif;?>
                                                                                </div>
                                                                            </div>
                                                                            <p class="mt-3">Default</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="org text-center">
                                                                            <div class="circle">
                                                                                <input type="file" multiple="" name="customer_logo2" data-max_length="10" class="upload__inputfile" />
                                                                                <div class="img-box">
                                                                                    <?php if(!empty($single->customer_logo2)): ?>
                                                                                    <img src="<?= base_url('uploads/images/customer/'.$single->customer_logo2); ?>" alt="Avatar" class="w-100 h-100">
                                                                                    <?php  else:?> <img src="<?= base_url('front-end/') ?>img/Discuss-1_Black (1).png" alt="Avatar" class="avatar"> <?php  endif;?>
                                                                                </div>
                                                                            </div>
                                                                            <p class="mt-3">Reverse</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="org text-center">
                                                                            <div class="circle">
                                                                                <input type="file" multiple="" name="customer_logo3" data-max_length="10" class="upload__inputfile" />
                                                                                <div class="img-box">
                                                                                    <?php if(!empty($single->customer_logo3)): ?>
                                                                                    <img src="<?= base_url('uploads/images/customer/'.$single->customer_logo3); ?>" alt="Avatar" class="w-100 h-100">
                                                                                    <?php  else:?> <img src="<?= base_url('front-end/') ?>img/Discuss-1_Black (1).png" alt="Avatar" class="avatar"> <?php  endif;?>
                                                        
                                                                                </div>
                                                                            </div>
                                                                            <p class="mt-3">Monotone</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    </from>
                                    <div class="col-12 py-4">
                                        <div class="text-right">
                                            <div class="right-btn">
                                                <div class="common-btn">
                                                    <button type="submit" name ="submit" class="btn">Update</button>
            
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="Subscription">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="your-profile-box">
                                            <h2 class="top-heading">Your profile info in pink7 services</h2>
                                            <p class="text">
                                                Personal info and Option to manage it. You can make some of this info, like your contct details, visible to other so they can your easly. you also see a summary of your profile.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="img-box">
                                            <img class="w-100" src="<?= base_url('front-end/') ?>img/img.png" />
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
                                         <div class="row">
                                           
                                            <div class="contacts-list mt-5">
                                               <div class="card mb-5">
                                                  <div class="card-body">
                                                     
                                                     <div class="container">
                                                        <div class="row">
                                                           <table id="example1" class="table table-striped text-center">
                                                              <thead>
                                                                 <tr class="status">
                                                                    <th scope="col">Transection Id</th>
                                                                    <th scope="col">Plan Name</th>
                                                                    <th scope="col">User Name</th>
                                                                    <th scope="col">Amount</th>
                                                                    <th scope="col">Membership From </th>
                                                                    <th scope="col">Membership To</th>
                                                                    <th scope="col">Description</th>
                                                                 </tr>
                                                              </thead>
                                                              <tbody>
                                                                  
                                                                  <?php if(!empty($subscription_records)): ?>
                                                                  <?php foreach($subscription_records as $idx => $subscription_record): ?>
                                                                     <tr>
                                                                        <td><?= $subscription_record['tpm_transection_id']; ?></td>
                                        			                    <td><?= $subscription_record['ci_sp_title']; ?></td>
                                        			                    <td><?= $subscription_record['customer_name']; ?></td>
                                        			                    <td><?= $subscription_record['tpm_amount']; ?></td>
                                        			                    <td><?= date('d-m-Y',$subscription_record['tpm_timestamp_from']); ?> </td>
                                        			                    <td><?= date('d-m-Y',$subscription_record['tpm_timestamp_to']); ?> </td>
                                        			                    <td><?= $subscription_record['tpm_description']; ?></td>
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
                            <div class="tab-pane fade show" id="Social">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="your-profile-box">
                                            <h2 class="top-heading">Your profile info in pink7 services</h2>
                                            <p class="text">
                                                Personal info and Option to manage it. You can make some of this info, like your contct details, visible to other so they can your easly. you also see a summary of your profile.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="img-box">
                                            <img class="w-100" src="<?= base_url('front-end/') ?>img/img.png" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="social-media-account-box">
                                            <h2 class="top-heading">Social Media Account Connect</h2>
                                            <p class="text">Some info be visible to other people using pink7 service. <a href="#">Learn more</a></p>
                                            <div class="details-box">
                                                <ul class="p-0 m-0">
                                                  <li class="item">
                                                     <div class="facebook-box common-flex first-box">
                                                        <span class="icon-box">
                                                        <img src="<?= base_url('front-end/') ?>images/Links/facebook1.png">
                                                        </span>
                                                        <span>
                                                           <p class="mb-0">Facebook Page</p>
                                                        </span>
                                                     </div>
                                                     <?php $fb = $social['fb_user_data']->row(); ?>
                                                     <?php if($fb->social_status == 0){ ?>
                                                     <div class="facebook-box common-flex">
                                                        <div class="disconnect-btn">
                                                           <a href="<?= $social['fb_login_url'] ?>" class="btn rounded-pill">Connect</a>
                                                        </div>
                                                     </div>
                                                     <?php } ?>
                                                     <?php if($fb->social_status == 1){ ?>
                                                     <div class="facebook-box common-flex">
                                                        <span class="icon-box">
                                                        <img class="rounded-pill" src="<?= $fb->social_photo ?>">
                                                        </span>
                                                        <span>
                                                           <p class="mb-0">Connected as <a href="#"><?= $fb->social_name ?></a></p>
                                                        </span>
                                                     </div>
                                                     <div class="facebook-box common-flex">
                                                        <div class="disconnect-btn">
                                                           <a href="<?= site_url('socialapps/disconnected/facebook') ?>" class="btn rounded-pill">Disconnect</a>
                                                        </div>
                                                     </div>
                                                     <?php } ?>
                                                  </li>
                                                  <li class="item">
                                                     <div class="facebook-box common-flex first-box">
                                                        <span class="icon-box">
                                                        <img src="<?= base_url('front-end/') ?>images/Links/instagram.png">
                                                        </span>
                                                        <span>
                                                           <p class="mb-0">Instagram Profile</p>
                                                        </span>
                                                     </div>
                                                     <?php $in = $social['insta_user_data']->row(); ?>
                                                     <?php if($in->social_status == 0){ ?>
                                                     <div class="facebook-box common-flex">
                                                        <div class="disconnect-btn">
                                                           <a href="<?= $social['insta_login_url'] ?>" class="btn rounded-pill">Connect</a>
                                                        </div>
                                                     </div>
                                                     <?php } ?>
                                                     <?php if($in->social_status == 1){ ?>
                                                     <div class="facebook-box common-flex">
                                                        <span class="icon-box">
                                                        <img class="rounded-pill" src="<?= base_url('front-end/') ?>images/Links/instagram.png">
                                                        </span>
                                                        <span>
                                                           <p class="mb-0">Connected as <a href="<?= $social['insta_login_url'] ?>"><?= $in->social_name ?></a></p>
                                                        </span>
                                                     </div>
                                                     <div class="facebook-box common-flex">
                                                        <div class="disconnect-btn">
                                                           <a href="<?= site_url('socialapps/disconnected/instagram') ?>" class="btn rounded-pill">Disconnect</a>
                                                        </div>
                                                     </div>
                                                     <?php } ?>
                                                  </li>
                                                  
                                                  <li class="item">
                                                     <div class="facebook-box common-flex first-box">
                                                        <span class="icon-box">
                                                        <img src="data:image/jpeg;base64,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">
                                                        </span>
                                                        <span>
                                                           <p class="mb-0">Whatsapp</p>
                                                        </span>
                                                     </div>
                                                     <?php $wp = $social['wp_user_data']->row(); ?>
                                                     <?php if($wp->social_status == 0){ ?>
                                                     <div class="facebook-box common-flex">
                                                        <div class="disconnect-btn">
                                                           <a href="<?= site_url('whatsaap/dashboard') ?>" class="btn rounded-pill">Connect</a>
                                                        </div>
                                                     </div>
                                                     <?php } ?>
                                                     <?php if($wp->social_status == 1){ ?>
                                                     <div class="facebook-box common-flex">
                                                        <span class="icon-box">
                                                        <img src="data:image/jpeg;base64,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">
                                                        </span>
                                                        <span>
                                                           <p class="mb-0">Connected</p>
                                                        </span>
                                                     </div>
                                                     <div class="facebook-box common-flex">
                                                        <div class="disconnect-btn">
                                                           <a href="<?= site_url('socialapps/disconnected/whatsapp') ?>" class="btn rounded-pill">Disconnect</a>
                                                        </div>
                                                     </div>
                                                     <?php } ?>
                  </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="Sync">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="your-profile-box">
                                            <h2 class="top-heading">Your profile info in pink7 services</h2>
                                            <p class="text">
                                                Personal info and Option to manage it. You can make some of this info, like your contct details, visible to other so they can your easly. you also see a summary of your profile.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="img-box">
                                            <img class="w-100" src="<?= base_url('front-end/') ?>img/img.png" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <?php echo form_open_multipart(base_url('user/sync_upload_file'), 'class="form-horizontal"');  ?> 
                                     
                                        <div class="file-btn">
                                            <div class="drag mt-4 common-btn common-d-flex">
                                                <label for="files" class="btn Upload"><i class="far fa-address-book"></i> Upload files here</label>
                                                <a href="<?= base_url('front-end/') ?>csv/datacsv.csv" class="btn Download"><i class="fa fa-download mr-1" aria-hidden="true"></i> Download CVV</a>
                                            </div>
                                            <div class="drag mt-2 common-btn">
                                                <input type="submit" class="btn btn-a-sm" name="importSubmit" value="Submit">
                                            </div>
                                            <input type="file" id="files" name="file" style="visibility: hidden;" value="choose image" />
                                            
                                            <div class="text-center mt-3">
                                                <p>
                                                    Drag and drop or choose a file to upload your contacts list.<br />
                                                    All csv, xlsx, docx and pdf types are supported.
                                                </p>
                                            </div>
                                        </div>
                                        </form>
                                    </div>

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
                                        <div class="contacts-list">
                                            <div class="card mb-5">
                                                <div class="card-body">
                                                    <div id="example1_wrapper" class="dataTables_wrapper no-footer">
                                                        <div class="row">
                                                            <div class="col-md-5 col-sm-5 col-lg-5 col-xl-5 col-12">
                                                                <h3 class="text">Contacts List added</h3>
                                                            </div>
                                                            <div class="col-md-7 col-sm-7 col-lg-7 col-xl-7 col-12">
                                                                <div class="form text-right mb-5">
                                                                    <div class="common-btn">
                                                                        <a href="<?= base_url('user/syncadd'); ?>" class="btn"><i class="fa fa-plus"></i> Add New Contact </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                       
                                                        <table id="example2" class="table table-striped text-center">
                                                            <thead>
                                                                <th scope="col">Name</th>
                                                                <th scope="col">Email Id</th>
                                                                <th scope="col">Contact Number</th>
                                                                <th scope="col">Favorite</th>
                                                                <th scope="col">Whats Up Sync</th>
                                                                <th scope="col">Action </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                             <?php foreach($sync_contacts_records as $contacts_record): ?>
                                                             <tr>
                                                                <td><?= $contacts_record->sync_contacts_name; ?></td>
                                                                <td><?= $contacts_record->sync_contacts_email; ?></td>
                                                                <td><?= $contacts_record->sync_contact_country_code; ?> <?= $contacts_record->sync_contacts_phone; ?></td>
                                                                <td>
                                                                    <?php if($contacts_record->sync_contacts_fav == '1'): ?> 
                                                                    <div class="align-items-center justify-content-between mb-2">
                                                                       <span class="text-dark">Yes</span>
                                                                    </div>
                                                                    <?php endif; ?>
                                                                    <?php if($contacts_record->sync_contacts_fav == '0'): ?> 
                                                                    <div class="align-items-center justify-content-between mb-2">
                                                                       <span class="text-dark">No</span>
                                                                    </div>
                                                                    <?php endif; ?>
                                                                </td>
                                                                
                                                                <td>
                                                                    <?php if($contacts_record->sync_contact_is_whatsapp == '1'): ?> 
                                                                    <div class="align-items-center justify-content-between mb-2">
                                                                       <span class="text-dark">Yes</span>
                                                                    </div>
                                                                    <?php endif; ?>
                                                                    <?php if($contacts_record->sync_contact_is_whatsapp == '0'): ?> 
                                                                    <div class="align-items-center justify-content-between mb-2">
                                                                       <span class="text-dark">No</span>
                                                                    </div>
                                                                    <?php endif; ?>
                                                                </td>
                                                               
                                                                <td>
                                                                    <a style="margin-top: 5px;" href="<?php echo site_url("user/syncedit/".$contacts_record->sync_contacts_id); ?>" class="btn btn-warning border-0 text-white btn-xs mr5" >
                                                                    <i class="fa fa-edit"></i>
                                                                    </a>
                                                                    <a style="margin-top: 5px;" href="<?php echo site_url("user/syncdelete/".$contacts_record->sync_contacts_id); ?>" onclick="return confirm('are you sure to delete?')" class="btn btn-danger border-0 text-white btn-xs"><i class="fa fa-trash"></i></a>
                                                                 </td>
                                                                
                                                             </tr>
                                                             <?php endforeach; ?>
                                                          </tbody>
                                                        </table>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade show" id="Upcoming">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="your-profile-box">
                                            <h2 class="top-heading">Your profile info in pink7 services</h2>
                                            <p class="text">
                                                Personal info and Option to manage it. You can make some of this info, like your contct details, visible to other so they can your easly. you also see a summary of your profile.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="img-box">
                                            <img class="w-100" src="<?= base_url('front-end/') ?>img/img.png" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="top-heading">Upcoming Events</h5>
                                                <p>Some info may be visible to other people using pink7 service. <span class="text-primary">Learn more</span></p>
                                                <div class="row">
                                                    <?php if(!empty($upcoming_data)): ?>
                                                    <?php foreach($upcoming_data as $key => $data): ?>
                                                    <div class="col-md-3">
                                                        <div class="card event">
                                                            <img src="<?= base_url().'/'.$data->upcomming_events_image ?>" />
                                                            <a href="<?= site_url('user/upcomingimage/'.$data->upcomming_events_id) ?>"> 
                                                                <div class="card-body"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; <?= $data->upcomming_events_title ?></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="Schedule">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="your-profile-box">
                                            <h2 class="top-heading">Your profile info in pink7 services</h2>
                                            <p class="text">
                                                Personal info and Option to manage it. You can make some of this info, like your contct details, visible to other so they can your easly. you also see a summary of your profile.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="img-box">
                                            <img class="w-100" src="<?= base_url('front-end/') ?>img/img.png" />
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
                                         <div class="row">
                                           <table id="example3" class="table table-striped text-center">
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

                          
                            <div class="tab-pane fade show" id="Delivered">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="your-profile-box">
                                            <h2 class="top-heading">Your profile info in pink7 services</h2>
                                            <p class="text">
                                                Personal info and Option to manage it. You can make some of this info, like your contct details, visible to other so they can your easly. you also see a summary of your profile.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="img-box">
                                            <img class="w-100" src="<?= base_url('front-end/') ?>img/img.png" />
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
                                         <div class="row">
                                           <table id="example4" class="table table-striped text-center">
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
                                                  
                                                  <?php if(!empty($delivered)): ?>
                                                    <?php foreach($delivered as $delivered_key => $delivered_value): 
                                                          $schedule_social_media =   json_decode($delivered_value->schedule_social_media);
                                                          $schedule_media        =   json_decode($delivered_value->schedule_media);
                                                         ?>
                                                 <tr>
                                                    <td> <img class="thumbnail zoom" src="<?= base_url($delivered_value->schedule_file_path); ?>?v=2.<?= time()?>" width="100px" height="50px" alt="image" />  </td>
                                                    
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
                                                    <td><?= date('d-m-Y',$delivered_value->schedule_date); ?><?= $delivered_value->schedule_time ?></td>
                                                    <td><?= date('d-m-Y',$delivered_value->schedule_create_at); ?></td>
                                                    <td>
                                                        <?php if($delivered_value->schedule_is_send == '1'): ?> 
                                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                                           <span class="text-dark">Completed</span>
                                                        </div>
                                                        <?php endif; ?>
                                                        <?php if($delivered_value->schedule_is_send == '0'): ?> 
                                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                                           <span class="text-dark">Processed</span>
                                                        </div>
                                                        <?php endif; ?>
                                                    </td>
                                                    
                                                    <td>
                                                        <a style="margin-top: 5px;" href="<?php echo site_url("single/scheduleedit/".$delivered_value->schedule_id); ?>" class="btn btn-warning border-0 text-white btn-xs mr5" >
                                                        <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a style="margin-top: 5px;" href="<?php echo site_url("user/scheduldelete/".$delivered_value->schedule_id); ?>" onclick="return confirm('are you sure to delete?')" class="btn btn-danger border-0 text-white btn-xs"><i class="fa fa-trash"></i></a>
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
        </section>
        
        

<?php include('common-file/_footer.php'); ?>


<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script>
  
    $("#example1").DataTable();

</script>

<script>
  
    $("#example2").DataTable();

</script>

<script>
  
    $("#example3").DataTable();

</script>

<script>
  
    $("#example4").DataTable();

</script>