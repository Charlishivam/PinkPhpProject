<link rel="stylesheet" type="text/css" href="<?= base_url('assets/user-view/css/hierarchy-view.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/user-view/css/main.css') ?>">
<style type="text/css">
   @media (min-width: 992px){
   .content {
   padding: 0px 0 !important;
   }
   }
</style>
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid " id="kt_content" >
   <!-- For Messages -->
   <?php $this->load->view('admin/includes/_messages.php') ?>
   <!--begin::Entry-->
   <div class="d-flex flex-column-fluid">
      <!--begin::Container-->
      <div class="container">
         <!--begin::Card-->
         <div class="card card-custom gutter-b">
            <div class="card-body">
               <!--begin::Top-->
               <div class="d-flex">
                  <!--begin::Pic-->
                  <div class="flex-shrink-0 mr-7">
                     <div class="symbol symbol-50 symbol-lg-120 symbol-light-danger">
                        <?php if(empty($single['customer_image'])){ ?>
                        <img src="<?= base_url('uploads/images/avtar.png' ); ?>" width="100px" height="auto" />
                        <?php  }else{  ?>
                        <img src="<?= base_url('/' .$single['customer_image'] ); ?>" width="100px" height="auto" alt="image" />
                        <?php  }  ?>
                     </div>
                  </div>
                  <!--begin: Info-->
                  <div class="flex-grow-1">
                     <!--begin::Title-->
                     <div class="d-flex justify-content-between flex-wrap mt-1">
                        <div class="d-flex mr-3">
                           <a href="#" class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3"><?php echo isset($single['customer_name'])?$single['customer_name']:''; ?></a>
                           <a href="#">
                           <i class="flaticon2-correct text-success font-size-h5"></i>
                           </a>
                        </div>
                     </div>
                     <!--end::Title-->
                     <!--begin::Content-->
                     <div class="d-flex flex-wrap justify-content-between mt-1">
                        <div class="d-flex flex-column flex-grow-1 pr-8">
                           <table style="font-size: 10px;">
                              <thead>
                                 <tr>
                                    <th scope="col"><a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                       <i class="flaticon2-new-email mr-2 font-size-lg"></i><?php echo isset($single['customer_email'])?$single['customer_email']:''; ?></a>
                                    </th>
                                    <th scope="col"><a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                       <i class="flaticon2-calendar-3 mr-2 font-size-lg"></i> Mobile Number : <?php echo isset($single['customer_mobile'])?$single['customer_mobile']:''; ?></a>
                                    </th>
                                    <th scope="col"><a href="#" class="text-dark-50 text-hover-primary font-weight-bold">
                                       <i class="flaticon2-placeholder mr-2 font-size-lg"></i>Address : <?php echo isset($single['customer_address'])?$single['customer_address']:''; ?></a>
                                    </th>
                                 </tr>
                                 <tr>
                                    <th scope="col"><a href="#" class="text-dark-50 text-hover-primary font-weight-bold">
                                       <i class="flaticon2-placeholder mr-2 font-size-lg"></i>Dob : <?php echo date('d-m-Y',strtotime($single['customer_dob']));  ?></a>
                                    </th>
                                    <th scope="col"> <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                       <i class="flaticon2-calendar-3 mr-2 font-size-lg"></i>Anniversary : <?php echo date('d-m-Y',strtotime($single['customer_anniversary'])) ?></a>
                                    </th>
                                    <th scope="col">
                                       <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                          <i class="flaticon2-calendar-3 mr-2 font-size-lg"></i>Gender : 
                                          <?php if($contact['customer_gender'] == 0) { ?>
                                          <span class="badge badge-pill badge-success mb-1">Male</span> 
                                          <?php } ?>
                                          <?php if($contact['customer_gender'] == 1) { ?>
                                          <span class="badge badge-pill badge-danger mb-1">Female</span>
                                          <?php } ?>
                                    </th>
                                 </tr>
                                 <tr>
                                 <th scope="col"> <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                 <i class="flaticon2-calendar-3 mr-2 font-size-lg"></i>Designation : <?php echo isset($single['customer_designation'])?$single['customer_designation']:''; ?></a>
                                 </th>
                                 <th scope="col"> <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                 <i class="flaticon2-calendar-3 mr-2 font-size-lg"></i>Organisation : <?php echo isset($single['customer_organisation'])?$single['customer_organisation']:''; ?></a>
                                 </th>
                                 </tr>
                              </thead>
                           </table>
                        </div>
                        <div class="d-flex align-items-center w-25 flex-fill float-right mt-lg-12 mt-8">
                        </div>
                     </div>
                     <!--end::Content-->
                  </div>
                  <!--end::Info-->
               </div>
               <!--end::Top-->
               <!--begin::Separator-->
               <div class="separator separator-solid my-7"></div>
               <!--end::Separator-->
               <!--begin::Bottom-->
               <!--<div class="d-flex align-items-center flex-wrap">-->
                  <!--begin: Item-->
               <!--   <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">-->
               <!--      <span class="mr-4">-->
               <!--      <i class="flaticon-piggy-bank icon-2x text-muted font-weight-bold"></i>-->
               <!--      </span>-->
               <!--      <div class="d-flex flex-column text-dark-75">-->
               <!--         <span class="font-weight-bolder font-size-sm"></span>-->
               <!--         <span class="font-weight-bolder font-size-h5">-->
               <!--         <span class="text-dark-50 font-weight-bold">₹</span>-->
               <!--         </span>-->
               <!--      </div>-->
               <!--   </div>-->
               <!--</div>-->
               <!--end::Bottom-->
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <div class="card card-custom">
                  <div class="card-header card-header-tabs-line">
                     <div class="card-title">
                        <h3 class="card-label">History</h3>
                     </div>
                     <div class="card-toolbar">
                        <ul class="nav nav-dark nav-bold nav-tabs nav-tabs-line" data-remember-tab="tab_id" role="tablist" id="rowTab">
                           <li class="nav-item active">
                              <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_2">Company Information</a>
                           </li>
                           <li class="nav-item dropdown">
                              <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_3_7">Subscription Information</a>
                           </li>
                           <li class="nav-item dropdown">
                              <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_3_2">Social Connect</a>
                           </li>
                           <li class="nav-item dropdown">
                              <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_3_4">Contacts List</a>
                           </li>
                           <li class="nav-item dropdown">
                              <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_3_5">Schedule</a>
                           </li>
                            <li class="nav-item dropdown">
                              <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_3_6">Delivered</a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="tab-content">
                        <div class="tab-pane fade show active" id="kt_tab_pane_2_2" role="tabpanel">
                           <!--begin: Datatable-->
                           <!--begin: Datatable-->
                           <table class="table table-bordered table-hover table-checkable" id="kt_datatable">
                              <thead>
                                 <tr>
                                    <th width="50">ID</th>
                                    <th>Organisation Name</th>
                                    <th>Organisation Address</th>
                                    <th>About Organisation</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 
                                 <tr>
                                    <td><?= $single['customer_id']; ?></td>
                                    <td><?php if(isset($single['customer_organisation'])) echo $single['customer_organisation'] ?></td>
                                    <td><?php if(isset($single['customer_address'])) echo $single['customer_address'] ?></td>
                                    <td><?php if(isset($single['customer_about_org'])) echo $single['customer_about_org'] ?></td>
                                 </tr>
                                
                              </tbody>
                              <tfoot>
                                 <th width="50">ID</th>
                                 <th>Organisation Name</th>
                                 <th>Organisation Address</th>
                                 <th>About Organisation</th>
                              </tfoot>
                           </table>
                        </div>
                        <div class="tab-pane fade" id="kt_tab_pane_3_7" role="tabpanel">
                           <table class="table table-bordered table-hover table-checkable" id="kt_datatable1">
                              <thead>
                                 <tr>
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
                                 <?php $i=1;foreach($purchasesubscription as $record):?>
                                 <tr>
                                    <td><?= $record['tpm_transection_id']; ?></td>
                                    <td><?= $record['ci_sp_title']; ?></td>
                                    <td><?= $record['customer_name']; ?></td>
                                    <td><?= $record['tpm_amount']; ?></td>
                                    <td><?= date('d-m-Y',$record['tpm_timestamp_from']); ?> </td>
                                    <td><?= date('d-m-Y',$record['tpm_timestamp_to']); ?> </td>
                                    <td><?= $record['tpm_description']; ?></td>
                                 </tr>
                                 <?php  $i++; endforeach; ?>
                              </tbody>
                              <tfoot>
                                 <th scope="col">Transection Id</th>
                                 <th scope="col">Plan Name</th>
                                 <th scope="col">User Name</th>
                                 <th scope="col">Amount</th>
                                 <th scope="col">Membership From </th>
                                 <th scope="col">Membership To</th>
                                 <th scope="col">Description</th>
                              </tfoot>
                           </table>
                        </div>
                        <div class="tab-pane fade" id="kt_tab_pane_3_2" role="tabpanel">
                           <div class="row">
                              <div class="col-12">
                                 <div class="social-media-account-box">
                                    <h2 class="top-heading">Social Media Account Connect</h2>
                                    <p class="text">Some info be visible to other people using pink7 service. <a href="#">Learn more</a></p>
                                    <div class="details-box">
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
                                       <ul class="p-0 m-0">
                                          <li class="item">
                                             <div class="row">
                                                <div class="col-md-4">
                                                   <div class="facebook-box common-flex first-box">
                                                      <span class="icon-box">
                                                      <img src="<?= base_url('front-end/') ?>images/Links/facebook1.png" style="height:50px;width:50px;">
                                                      </span>
                                                      <span>
                                                         <p class="mb-0">Facebook Page</p>
                                                      </span>
                                                   </div>
                                                   <?php $fb = $social['fb_user_data']->row(); ?>
                                                   <?php if($fb->social_status == 0){ ?>
                                                   <div class="facebook-box common-flex">
                                                      <div class="disconnect-btn">
                                                         <a href="javascript:" class="btn rounded-pill">Connect</a>
                                                      </div>
                                                   </div>
                                                   <?php } ?>
                                                </div>
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
                                                      <a href="javascript:" class="btn rounded-pill">Disconnect</a>
                                                   </div>
                                                </div>
                                                <?php } ?>
                                             </div>
                                          </li>
                                          <br/>
                                          <li class="item">
                                             <div class="row">
                                                <div class="col-md-4">
                                                   <div class="facebook-box common-flex first-box">
                                                      <span class="icon-box">
                                                      <img src="<?= base_url('front-end/') ?>images/Links/instagram.png" style="height:50px;width:50px;">
                                                      </span>
                                                      <span>
                                                         <p class="mb-0">Instagram Profile</p>
                                                      </span>
                                                   </div>
                                                </div>
                                                <?php $fb = $social['insta_user_data']->row(); ?>
                                                <?php if($fb->social_status == 0){ ?>
                                                <div class="facebook-box common-flex">
                                                   <div class="disconnect-btn">
                                                      <a href="javascript:" class="btn rounded-pill">Connect</a>
                                                   </div>
                                                </div>
                                                <?php } ?>
                                                <?php if($fb->social_status == 1){ ?>
                                                <div class="facebook-box common-flex">
                                                   <span class="icon-box">
                                                   <img class="rounded-pill" src="<?= base_url('front-end/') ?>images/Links/instagram.png" style="height:50px;width:50px;">
                                                   </span>
                                                   <span>
                                                      <p class="mb-0">Connected as <a href="#"><?= $fb->social_name ?></a></p>
                                                   </span>
                                                </div>
                                                <div class="facebook-box common-flex">
                                                   <div class="disconnect-btn">
                                                      <a href="javascript:" class="btn rounded-pill">Disconnect</a>
                                                   </div>
                                                </div>
                                                <?php } ?>
                                             </div>
                                          </li>
                                          <br/>
                                          <li class="item">
                                             <div class="row">
                                                <div class="col-md-4">
                                                   <div class="facebook-box common-flex first-box">
                                                      <span class="icon-box">
                                                      <img src="<?= base_url('front-end/') ?>images/Links/twitter.png" style="height:50px;width:50px;">
                                                      </span>
                                                      <span>
                                                         <p class="mb-0">Twitter Profile</p>
                                                      </span>
                                                   </div>
                                                </div>
                                                <?php $tw = $social['tw_user_data']->row(); ?>
                                                <?php if($tw->social_status == 0){ ?>
                                                <div class="facebook-box common-flex">
                                                   <div class="disconnect-btn">
                                                      <a href="<?= $this->data['social']['tw_login_url'] ?>" class="btn rounded-pill">Connect</a>
                                                   </div>
                                                </div>
                                                <?php } ?>
                                                <?php if($tw->social_status == 1){ ?>
                                                <div class="facebook-box common-flex">
                                                   <span class="icon-box">
                                                   <img class="rounded-pill" src="<?= base_url('front-end/') ?>images/Links/twitter.png" style="height:50px;width:50px;">
                                                   </span>
                                                   <span>
                                                      <p class="mb-0">Connected as <a href="#"><?= $tw->social_name ?></a></p>
                                                   </span>
                                                </div>
                                                <div class="facebook-box common-flex">
                                                   <div class="disconnect-btn">
                                                      <a href="javascript:" class="btn rounded-pill">Disconnect</a>
                                                   </div>
                                                </div>
                                                <?php } ?>
                                             </div>
                                          </li>
                                          <br/>
                                          <li class="item">
                                             <div class="row">
                                                <div class="col-md-4">
                                                   <div class="facebook-box common-flex first-box">
                                                      <span class="icon-box">
                                                      <img src="data:image/jpeg;base64,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" style="height:50px;width:50px;">
                                                      </span>
                                                      <span>
                                                         <p class="mb-0">Whatsapp</p>
                                                      </span>
                                                   </div>
                                                </div>
                                                <?php $wp = $social['wp_user_data']->row(); ?>
                                                <?php if($wp->social_status == 0){ ?>
                                                <div class="facebook-box common-flex">
                                                   <div class="disconnect-btn">
                                                      <a href="javascript:" class="btn rounded-pill">Connect</a>
                                                   </div>
                                                </div>
                                                <?php } ?>
                                                <?php if($wp->social_status == 1){ ?>
                                                <div class="facebook-box common-flex">
                                                   <span class="icon-box">
                                                   <img src="data:image/jpeg;base64,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" style="height:50px;width:50px;">> 
                                                   </span>
                                                   <span>
                                                      <p class="mb-0">Connected</p>
                                                   </span>
                                                </div>
                                                <div class="facebook-box common-flex">
                                                   <div class="disconnect-btn">
                                                      <a href="javascript:" class="btn rounded-pill">Disconnect</a>
                                                   </div>
                                                </div>
                                                <?php } ?>
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="kt_tab_pane_3_4" role="tabpanel">
                           <table class="table table-bordered table-hover table-checkable" id="kt_datatable2">
                              <thead>
                                 <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email Id</th>
                                    <th scope="col">Contact Number</th>
                                    <th scope="col">Favorite</th>
                                    <th scope="col">Whats Up Sync</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php foreach($sync_contacts as $record): ?>
                                 <tr>
                                    <td><?= $record->sync_contacts_name; ?></td>
                                    <td><?= $record->sync_contacts_email; ?></td>
                                    <td><?= $record->sync_contact_country_code; ?> <?= $record->sync_contacts_phone; ?></td>
                                    <td>
                                       <?php if($record->sync_contacts_fav == '1'): ?> 
                                       <div class="align-items-center justify-content-between mb-2">
                                          <span class="text-dark">Yes</span>
                                       </div>
                                       <?php endif; ?>
                                       <?php if($record->sync_contacts_fav == '0'): ?> 
                                       <div class="align-items-center justify-content-between mb-2">
                                          <span class="text-dark">No</span>
                                       </div>
                                       <?php endif; ?>
                                    </td>
                                    <td>
                                       <?php if($record->sync_contact_is_whatsapp == '1'): ?> 
                                       <div class="align-items-center justify-content-between mb-2">
                                          <span class="text-dark">Yes</span>
                                       </div>
                                       <?php endif; ?>
                                       <?php if($record->sync_contact_is_whatsapp == '0'): ?> 
                                       <div class="align-items-center justify-content-between mb-2">
                                          <span class="text-dark">No</span>
                                       </div>
                                       <?php endif; ?>
                                    </td>
                                 </tr>
                                 <?php endforeach; ?>
                              </tbody>
                              <tfoot>
                                 <th scope="col">Name</th>
                                 <th scope="col">Email Id</th>
                                 <th scope="col">Contact Number</th>
                                 <th scope="col">Favorite</th>
                                 <th scope="col">Whats Up Sync</th>
                                
                              </tfoot>
                           </table>
                        </div>
                        <div class="tab-pane fade" id="kt_tab_pane_3_5" role="tabpanel">
                            <table class="table table-bordered table-hover table-checkable" id="kt_datatable3">
                              <thead>
                                 <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Social Media</th>
                                    <th scope="col">Festival Name</th>
                                    <th scope="col">Scheduled on</th>
                                    <th scope="col">Created on</th>
                                    <th scope="col">Status</th>
                                    
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
                                           <span class="text-dark">Facebook -C</span>
                                        </div>
                                        <?php endif; ?>
                                    </td>
                                   
                                    <td><?= $schedule_media->greeting_name?></td>
                                    <td><?= date('d-m-Y',strtotime($schedule_value->schedule_date)); ?><?= $schedule_value->schedule_time ?></td>
                                    <td><?= date('d-m-Y',strtotime($schedule_value->schedule_create_at)); ?></td>
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
                                   <?php endforeach;?>
                                 <?php endif; ?>
                                
                              </tbody>
                              <tfoot>
                                    <th scope="col">Image</th>
                                    <th scope="col">Social Media</th>
                                    <th scope="col">Festival Name</th>
                                    <th scope="col">Scheduled on</th>
                                    <th scope="col">Created on</th>
                                    <th scope="col">Status</th>
                                    
                              </tfoot>
                           </table>
                        </div>
                        <div class="tab-pane fade" id="kt_tab_pane_3_6" role="tabpanel">
                            <table class="table table-bordered table-hover table-checkable" id="kt_datatable4">
                              <thead>
                                 <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Social Media</th>
                                    <th scope="col">Festival Name</th>
                                    <th scope="col">Scheduled on</th>
                                    <th scope="col">Created on</th>
                                    <th scope="col">Status</th>
                                    
                                 </tr>
                              </thead>
                              <tbody>
                                  
                                  <?php if(!empty($delivered)): ?>
                                    <?php foreach($delivered as $schedule_key => $schedule_value): 
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
                                           <span class="text-dark">Instagram -C</span>
                                        </div>
                                        <?php endif; ?>
                                        
                                        
                                        <?php if($schedule_social_media->twitter == true): ?> 
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                           <span class="text-dark">Twitter -C</span>
                                        </div>
                                        <?php endif; ?>
                                       
                                       
                                        <?php if($schedule_social_media->facebook == true): ?> 
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                           <span class="text-dark">Facebook -C</span>
                                        </div>
                                        <?php endif; ?>
                                    </td>
                                   
                                    <td><?= $schedule_media->greeting_name?></td>
                                    <td><?= date('d-m-Y',strtotime($schedule_value->schedule_date)); ?><?= $schedule_value->schedule_time ?></td>
                                    <td><?= date('d-m-Y',strtotime($schedule_value->schedule_create_at)); ?></td>
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
                                   <?php endforeach;?>
                                 <?php endif; ?>
                                
                              </tbody>
                              <tfoot>
                                    <th scope="col">Image</th>
                                    <th scope="col">Social Media</th>
                                    <th scope="col">Festival Name</th>
                                    <th scope="col">Scheduled on</th>
                                    <th scope="col">Created on</th>
                                    <th scope="col">Status</th>
                                    
                              </tfoot>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--end::Card-->
      </div>
      <!--end::Container-->
   </div>
   <!--end::Entry-->
</div>
<script>
   // tab
   $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
     localStorage.setItem('activeTab', $(e.target).attr('href'));
   });
   var activeTab = localStorage.getItem('activeTab');
   if (activeTab) {
    $('#rowTab a[href="' + activeTab + '"]').tab('show');
   }
</script>