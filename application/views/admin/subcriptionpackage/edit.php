<div class="content-wrapper">
   <!-- Main content -->
   <section class="content">
      <div class="card card-default">
         <div class="card-header">
            <div class="d-inline-block">
               <h3 class="card-title"> <i class="fa fa-plus"></i>
                  Edit Subcription Package  
               </h3>
            </div>
            <div class="d-inline-block float-right">
               <a href="<?= base_url('admin/subscription'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Subcriprion Package List</a>
            </div>
         </div>
         <div class="card-body">
            <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open_multipart(base_url('admin/subscription/edit'), 'class="form-horizontal"');  ?> 

            <input type="hidden" name="ci_sp_id" value="<?= set_value('ci_sp_id',$single->ci_sp_id) ?>">
            <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                     <label for="title" class="col-md-6 control-label">Title<span class="text-red" style="color:red">*</span></label>
                     <div class="col-md-12">
                        <input type="text" name="ci_sp_title" required="" value="<?= set_value('ci_sp_title',$single->ci_sp_title) ?>" class="form-control" id="name" placeholder="Enter Title" >
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                     <label for="title" class="col-md-6 control-label">Amount<span class="text-red" style="color:red">*</span></label>
                    
                     <div class="col-md-12">
                        <input type="number" name="ci_sp_amount" required="" class="form-control" value="<?= set_value('ci_sp_amount',$single->ci_sp_amount) ?>" id="ci_sp_amount" placeholder="Enter Amount">
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
                        	<option value="1" <?php if ($single->ci_sp_type == '1') echo ' selected="selected"'; ?>>Month</option>
                        	<option value="2" <?php if ($single->ci_sp_type == '2') echo ' selected="selected"'; ?>>Year</option>
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
              <img id="blah" src="<?= base_url($single->ci_sp_image); ?>" width="150" height="150"/>
            </div>
            
            
            <div id="kt_repeater_1">
                <?php $sql ="SELECT * FROM subscription_description WHERE subscription_id =".$single->ci_sp_id; 
                        $query=$this->db->query($sql);
                        $result=$query->result_array();

                
                 ?>
                <?php foreach($result as $key => $data){ ?>
                <div class="form-group row">

                    <input type="hidden" name="subscription_description_id[]" value="<?php echo $data['subscription_description_id']; ?>">
                    
                    
                    <div class="col-lg-12">
                        <div class="form-group row align-items-center" >
                            <div class="col-md-10">
                                <label>Description</label>
                                <input type="text" name="sp_description[]" id="sp_description" required="" class="form-control" placeholder="Description" value="<?= set_value('description',$data['description']) ?>">
                                <div class="d-md-none mb-2"></div>
                            </div>
                            <div class="col-md-1">
                                <a href="<?php echo site_url("admin/subscription/descriptiondelete/".$data['subscription_description_id']);?>" onclick="return confirm('are you sure to delete?')" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger" style=" margin-top: 23px;">
                                <i class="la la-trash-o"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="form-group row">
                    
                    <div data-repeater-list="sp_id" class="col-lg-12">
                        <div data-repeater-item="adsfield" class="form-group row align-items-center">
                            
                            <div class="col-md-10">
                                <label>Description</label>
                                <input type="text" name="description" class="form-control" placeholder="Description" value="">
                                <div class="d-md-none mb-2"></div>
                            </div>
                            <div class="col-md-1">
                                <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger" style="    margin-top: 23px;">
                                <i class="la la-trash-o"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label text-right"></label>
                    <div class="col-lg-4">
                        <a href="javascript:;" data-repeater-create="" class="btn btn-sm font-weight-bolder btn-light-primary allEditors">
                        <i class="la la-plus"></i>Add More</a>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
               <div class="col-md-12">
                  <input type="submit" name="submit" value="Update Subcription" class="btn btn-primary pull-right">
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













