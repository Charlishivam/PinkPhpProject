<div class="content-wrapper">
   <!-- Main content -->
   <section class="content">
      <div class="card card-default">
         <div class="card-header">
            <div class="d-inline-block">
               <h3 class="card-title"> <i class="fa fa-plus"></i>
                  Add New User  
               </h3>
            </div>
            <div class="d-inline-block float-right">
               <a href="<?= base_url('admin/customer'); ?>" class="btn btn-success"><i class="fa fa-list"></i> User List</a>
            </div>
         </div>
         <div class="card-body">
            <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open_multipart(base_url('admin/customer/add'), 'class="form-horizontal"');  ?> 
            <div class="row">
               <div class="col-md-6">
                   <div class="form-group">
                     <label for="title" class="col-md-6 control-label">First Name<span class="text-red" style="color:red">*</span></label>
                     <div class="col-md-12">
                        <input type="text" name="customer_first_name" required="" value="<?= set_value('customer_first_name') ?>" class="form-control" id="name" placeholder="Enter First Name" >
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                   <div class="form-group">
                     <label for="title" class="col-md-6 control-label">Last Name<span class="text-red" style="color:red">*</span></label>
                     <div class="col-md-12">
                        <input type="text" name="customer_last_name" required="" value="<?= set_value('customer_last_name') ?>" class="form-control" id="customer_last_name" placeholder="Enter First Name" >
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                   <div class="form-group">
                     <label for="title" class="col-md-6 control-label">Mobile Number<span class="text-red" style="color:red">*</span></label>
                    
                     <div class="col-md-12">
                        <input type="number" name="customer_mobile" required="" class="form-control" value="<?= set_value('customer_mobile') ?>" id="customer_mobile" placeholder="Enter Mobile Number">
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <label for="title" class="col-md-6 control-label">Email<span class="text-red" style="color:red">*</span></label>
                     <div class="col-md-12">
                        <input type="email"  required="" name="customer_email" class="form-control" id="mobile" value="<?= set_value('customer_email') ?>" placeholder="Enter Email">
                     </div>
               </div>
            </div>
            

            <div class="row">
               <div class="col-md-6">
                   <div class="form-group">
                     <label for="title" class="col-md-6 control-label">Address<span class="text-red" style="color:red">*</span></label>
                     <div class="col-md-12">
                        <input type="text" required="" value="<?= set_value('customer_address') ?>" name="customer_address" class="form-control" id="customer_address" placeholder=" Enter address ">
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <label for="title" class="col-md-6 control-label">Designation<span class="text-red" style="color:red">*</span></label>
                     <div class="col-md-12">
                        <input type="text" value="<?= set_value('customer_designation') ?>" required="" name="customer_designation" class="form-control" id="customer_designation" placeholder=" Enter Designation ">
                     </div>
               </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                  <label for="title" class="col-md-6 control-label">Customer Birthday<span class="text-red" style="color:red">*</span></label>
                     <div class="col-md-12">
                        <input type="date" value="<?= set_value('customer_dob') ?>" required="" name="customer_dob" class="form-control" id="customer_dob" placeholder=" Enter Dob ">
                     </div>
               </div>
               <div class="col-md-6">
                   <div class="form-group">
                     <label for="title" class="col-md-6 control-label">Customer Anniversary<span class="text-red" style="color:red">*</span></label>
                     <div class="col-md-12">
                        <input type="date" required="" value="<?= set_value('customer_anniversary') ?>" name="customer_anniversary" class="form-control" id="customer_anniversary" placeholder=" Enter Customer anniversary.. ">
                     </div>
                  </div>
               </div>
               
            </div>
            
            <div class="row">
                <div class="col-md-6">
                  <label for="title" class="col-md-6 control-label">Customer Organisation<span class="text-red" style="color:red">*</span></label>
                     <div class="col-md-12">
                        <input type="text" value="<?= set_value('customer_organisation') ?>" required="" name="customer_organisation" class="form-control" id="customer_organisation" placeholder=" Enter Organisation ">
                     </div>
               </div>
               <div class="col-md-6">
                   <div class="form-group">
                     <label for="title" class="col-md-6 control-label">About Organization<span class="text-red" style="color:red">*</span></label>
                     <div class="col-md-12">
                        <input type="text" required="" value="<?= set_value('customer_about_org') ?>" name="customer_about_org" class="form-control" id="customer_about_org" placeholder=" Enter About Org.. ">
                     </div>
                  </div>
               </div>
               
            </div>
            
            <div class="row">
            <label class="col-lg-2 col-form-label text-lg-right">Customer Logo:</label>
                 <div class="col-lg-6">
                    <div class="input-group">
                       <div class="image-input image-input-outline" id="kt_image_1">
                          <div class="image-input-wrapper" style="background-image: url(<?= base_url('uploads/images/avtar.png'); ?>)"></div>
                          
                          <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                          <i class="fa fa-pen icon-sm text-muted"></i>
                          <input type="file" name="customer_image" value="<?= set_value('customer_image') ?>" accept=".png, .jpg, .jpeg" />
                          <input type="hidden" name="profile_avatar_remove" value="<?= set_value('customer_image') ?>" />
                          </label>
                          <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                          <i class="ki ki-bold-close icon-xs text-muted"></i>
                          </span>
                       </div>
                        </div>
                       <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
    
                    </div>
             </div>
             
        <div class="separator separator-dashed my-10"></div>
        <h2>Company Organisation Logo</h2></br>
        <div class="separator separator-dashed my-10"></div>
             
        <div class="row">
            <label class="col-lg-2 col-form-label text-lg-right">Default Image:</label>
                 <div class="col-lg-6">
                    <div class="input-group">
                       <div class="image-input image-input-outline" id="kt_image_2">
                          <div class="image-input-wrapper" style="background-image: url(<?= base_url('uploads/images/avtar.png'); ?>)"></div>
                          
                          <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                          <i class="fa fa-pen icon-sm text-muted"></i>
                          <input type="file" name="customer_logo1" value="<?= set_value('customer_logo1') ?>" accept=".png, .jpg, .jpeg" />
                          <input type="hidden" name="profile_avatar_remove" value="<?= set_value('customer_logo1') ?>" />
                          </label>
                          <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                          <i class="ki ki-bold-close icon-xs text-muted"></i>
                          </span>
                       </div>
                        </div>
                       <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
    
                    </div>
             </div>
             
             <div class="row">
            <label class="col-lg-2 col-form-label text-lg-right">Monotone Image:</label>
                 <div class="col-lg-6">
                    <div class="input-group">
                       <div class="image-input image-input-outline" id="kt_image_3">
                          <div class="image-input-wrapper" style="background-image: url(<?= base_url('uploads/images/avtar.png'); ?>)"></div>
                          
                          <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                          <i class="fa fa-pen icon-sm text-muted"></i>
                          <input type="file" name="customer_logo2" value="<?= set_value('customer_logo2') ?>" accept=".png, .jpg, .jpeg" />
                          <input type="hidden" name="profile_avatar_remove" value="<?= set_value('customer_logo2') ?>" />
                          </label>
                          <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                          <i class="ki ki-bold-close icon-xs text-muted"></i>
                          </span>
                       </div>
                        </div>
                       <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
    
                    </div>
             </div>
             
             
             <div class="row">
            <label class="col-lg-2 col-form-label text-lg-right">Reverse Image:</label>
                 <div class="col-lg-6">
                    <div class="input-group">
                       <div class="image-input image-input-outline" id="kt_image_4">
                          <div class="image-input-wrapper" style="background-image: url(<?= base_url('uploads/images/avtar.png'); ?>)"></div>
                          
                          <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                          <i class="fa fa-pen icon-sm text-muted"></i>
                          <input type="file" name="customer_logo3" value="<?= set_value('customer_logo3') ?>" accept=".png, .jpg, .jpeg" />
                          <input type="hidden" name="profile_avatar_remove" value="<?= set_value('customer_logo3') ?>" />
                          </label>
                          <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                          <i class="ki ki-bold-close icon-xs text-muted"></i>
                          </span>
                       </div>
                        </div>
                       <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
    
                    </div>
             </div>
            
                
           

            
            
            
            
          
            
            
          
            
            <div class="form-group">
               <div class="col-md-12">
                  <input type="submit" name="submit" value="Add Customer" class="btn btn-primary pull-right">
               </div>
            </div>
            <?php echo form_close( ); ?>
         </div>
         <!-- /.box-body -->
      </div>
   </section>
</div>


<script src="<?= base_url() ?>assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js"></script>
<script src="<?= base_url() ?>assets/js/pages/crud/forms/widgets/bootstrap-timepicker.js"></script>

<script>
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
</script>

<script>
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah1').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#imgInp1").change(function() {
  readURL(this);
});
</script>


<script>
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah2').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#imgInp2").change(function() {
  readURL(this);
});
</script>

<script>
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
     
    reader.onload = function(e) {
      $('#blah3').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#imgInp3").change(function() {
  readURL(this);
});
</script>













