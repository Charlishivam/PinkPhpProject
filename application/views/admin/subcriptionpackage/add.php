<div class="content-wrapper">
   <!-- Main content -->
   <section class="content">
      <div class="card card-default">
         <div class="card-header">
            <div class="d-inline-block">
               <h3 class="card-title"> <i class="fa fa-plus"></i>
                  Add New Subscription  
               </h3>
            </div>
            <div class="d-inline-block float-right">
               <a href="<?= base_url('admin/subscription'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Package List</a>
            </div>
         </div>
         <div class="card-body">
            <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open_multipart(base_url('admin/subscription/add'), 'class="form-horizontal"');  ?> 
            <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                     <label for="title" class="col-md-6 control-label">Title<span class="text-red" style="color:red">*</span></label>
                     <div class="col-md-12">
                        <input type="text" name="ci_sp_title" required="" value="<?= set_value('ci_sp_title') ?>" class="form-control" id="ci_sp_title" placeholder="Enter Title" >
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                     <label for="title" class="col-md-6 control-label">Amount<span class="text-red" style="color:red">*</span></label>
                    
                     <div class="col-md-12">
                        <input type="number" name="ci_sp_amount" required="" class="form-control" value="<?= set_value('ci_sp_amount') ?>" id="ci_sp_amount" placeholder="Enter Amount">
                     </div>
                  </div>
               </div>
            </div>
            
            <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                     <label for="title" class="col-md-6 control-label">Package Type<span class="text-red" style="color:red">*</span></label>
                     <div class="col-md-12">
                         <select name="ci_sp_type" id="color" required="" class="form-control">
                        	<option value="">--- Choose a Package ---</option>
                        	<option value="1">Month</option>
                        	<option value="2">Year</option>
                        </select>
                     </div>
                  </div>
               </div>
            </div>
        
            <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                     <label for="title" class="col-md-6 control-label">Image<span class="text-red" style="color:red">*</span></label>
                     <div class="col-md-12">
                        <input type="file" name="ci_sp_image" class="custom-file-input" id="imgInp">
                        <label class="custom-file-label" for="imgInp">Choose file</label>
                     </div>
                  </div>
               </div>
            </div>
            <div class="form-group">
              <img id="blah" src="<?= base_url('uploads/images/image-placeholder.jpg'); ?>" width="150" height="150"/>
            </div>

          <div id="kt_repeater_3" style="margin-top:10px;">
             <div class="form-group row">
                <label for="title" class="col-md-6 control-label"><span class="text-red" style="color:red">*</span>Description</label>
               
                <div data-repeater-list="sp_vehicle_id" class="col-lg-10">
                   <div data-repeater-item="gallery" class="form-group row align-items-center">
                      <div></div>
                      
                      <div class="col-md-10">
                         <input type="text" name="description" id="description" required="" class="form-control" placeholder="Description">
                      </div>
                      
                      <div class="col-md-1">
                         <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
                         <i class="la la-trash-o"></i></a>
                      </div>
                   </div>
                </div>
             </div>
             <div class="form-group row">
                <label class="col-lg-2 col-form-label text-right"></label>
                <div class="col-lg-4 text-right">
                   <a href="javascript:;" data-repeater-create="" class="btn btn-sm font-weight-bolder btn-light-primary">
                   <i class="la la-plus"></i>Add More</a>
                </div>
             </div>
          </div>
           
            
            <div class="form-group">
               <div class="col-md-12">
                  <input type="submit" name="submit" value="Add Subscription" class="btn btn-primary pull-right">
               </div>
            </div>
            <?php echo form_close( ); ?>
         </div>
         <!-- /.box-body -->
      </div>
   </section>
</div>

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













