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
                  <img src="<?= base_url('uploads/customer/' .$single['customer_image'] ); ?>" width="100px" height="auto" alt="image" />
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
                                 <i class="flaticon2-placeholder mr-2 font-size-lg"></i>Address : <?php echo isset($address['ad_fulladdress'])?$address['ad_fulladdress']:''; ?></a>
                              </th>
                            
                           </tr>
                          
                           <tr>
                              <th scope="col"><a href="#" class="text-dark-50 text-hover-primary font-weight-bold">
                                 <i class="flaticon2-placeholder mr-2 font-size-lg"></i>Country : <?php echo isset($address['ad_country'])?$address['ad_country']:''; ?></a>
                              </th>
                              <th scope="col"> <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                 <i class="flaticon2-calendar-3 mr-2 font-size-lg"></i>State : <?php echo isset($address['ad_state'])?$address['ad_state']:''; ?></a>
                              </th>
                              <th scope="col"> <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                 <i class="flaticon2-calendar-3 mr-2 font-size-lg"></i>City : <?php echo isset($address['ad_city'])?$address['ad_city']:''; ?></a>
                              </th>
                           </tr>
                           <tr>
                              <th scope="col"> <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                 <i class="flaticon2-calendar-3 mr-2 font-size-lg"></i>Pincode : <?php echo isset($address['ad_postcode'])?$address['ad_postcode']:''; ?></a>
                              </th>

                               <th scope="col"> <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                 <i class="flaticon2-calendar-3 mr-2 font-size-lg"></i>Designation : <?php echo isset($single['customer_designation'])?$single['customer_designation']:''; ?></a>
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
               <div class="d-flex align-items-center flex-wrap">
                  <!--begin: Item-->
                  <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                     <span class="mr-4">
                     <i class="flaticon-piggy-bank icon-2x text-muted font-weight-bold"></i>
                     </span>
                     <div class="d-flex flex-column text-dark-75">
                        <span class="font-weight-bolder font-size-sm">WALLETS</span>
                        <span class="font-weight-bolder font-size-h5">
                        <span class="text-dark-50 font-weight-bold">₹</span>
                        </span>
                     </div>
                  </div>

             
               </div>
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
                              <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_2">Contacts List</a>
                           </li>

                           <li class="nav-item dropdown">
                              <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_3_7"></a>
                           </li>

                           <li class="nav-item dropdown">
                              <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_3_2"></a>
                           </li>

                           <li class="nav-item dropdown">
                              <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_3_4"></a>
                           </li>

                           <li class="nav-item dropdown">
                              <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_3_5"></a>
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
                                      <th>Contact Name</th>
                                      <th>Contact Mobile</th>
                                      <th>Contact Email</th>
                                      <th>Contact Status</th>
                                      <th>Date Time</th>
                                   </tr>
                                </thead>
                                <tbody>


                                  <?php $i=1;foreach($contactlist as $contact):
                                    ?>
                                    <tr>
                                      <td><?= $contact['contact_id']; ?></td>
                                      <td><?php if(isset($contact['contact_name'])) echo $contact['contact_name'] ?></td>
                                      <td><?php if(isset($contact['contact_mobile'])) echo $contact['contact_mobile'] ?></td>
                                      <td><?php if(isset($contact['contact_emial'])) echo $contact['contact_emial'] ?></td>
                                      <td>
                                        <?php if($contact['contact_status'] == 1) { ?>
                                        <span class="badge badge-pill badge-success mb-1">Activate</span> 
                                       <?php } ?>
                                       <?php if($contact['contact_status'] == 0) { ?>
                                        <span class="badge badge-pill badge-danger mb-1">Deactivate</span>
                                      <?php } ?>
                                      </td>
                                      <td><?php if(isset($contact['contact_create_at'])) echo $contact['contact_create_at'] ?></td>
                                    </tr>
                                  <?php  $i++; endforeach; ?>
                               
                                </tbody>
                                
                                <tfoot>
                                <tr>
                                      <th width="50">ID</th>
                                      <th>Contact Name</th>
                                      <th>Contact Mobile</th>
                                      <th>Contact Email</th>
                                      <th>Contact Status</th>
                                      <th>Date Time</th>
                                   </tr>
                                </tfoot>
                             </table>
                            
                        </div>

                        <div class="tab-pane fade" id="kt_tab_pane_3_7" role="tabpanel">
               


                     
                        </div>
                        <div class="tab-pane fade" id="kt_tab_pane_3_2" role="tabpanel">
                          
                        </div>
                       

                        <div class="tab-pane fade" id="kt_tab_pane_3_4" role="tabpanel">
                           
                        </div>

                        
                         <div class="tab-pane fade" id="kt_tab_pane_3_5" role="tabpanel">
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














