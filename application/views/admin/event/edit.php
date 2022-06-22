<!-- Content Wrapper. Contains page content -->
<!-- For Messages -->
<?php $this->load->view('admin/includes/_messages.php') ?>
<div class="content-wrapper">
   <!-- Main content -->
   <section class="content">
      <div class="card card-default">
         <div class="card-header">
            <div class="d-inline-block">
               <h3 class="card-title"> <i class="fa fa-edit"></i>
                  Edit Event  
               </h3>
            </div>
            <div class="d-inline-block float-right">
               <a href="<?= base_url('admin/event'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Event List</a>
            </div>
         </div>
         <div class="card-body">
            <form method="POST" action="<?= base_url()."admin/event/edit" ?>" enctype="multipart/form-data">
            <input type="hidden" name="upcomming_events_id"  class="form-control" id="upcomming_events_id" value="<?= set_value('upcomming_events_id',$single->upcomming_events_id) ?>">
            <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                     <label for="upcomming_events_title" class="col-md-12 control-label">Title<span class="text-red" style="color:red">*</span></label>
                    
                     <div class="col-md-12">
                        <input type="text" name="upcomming_events_title" required="" class="form-control" id="upcomming_events_title" value="<?= set_value('upcomming_events_title',$single->upcomming_events_title) ?>" placeholder=" Enter Events Title ">
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                     <label for="upcomming_events_title" class="col-md-12 control-label">Date<span class="text-red" style="color:red">*</span></label>
                    
                     <div class="col-md-12">
                         <input type="date" class="form-control" name="upcomming_events_date" value="<?= set_value('upcomming_events_date',$single->upcomming_events_date) ?>"  placeholder="Start Date" />
                       
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                     <label for="upcomming_events_title" class="col-md-12 control-label">Time<span class="text-red" style="color:red">*</span></label>
                     <div class="col-md-12">
                         <input type="time" class="form-control" name="upcomming_events_time" value="<?= set_value('upcomming_events_time',$single->upcomming_events_time) ?>"  placeholder="Start time" />
                     </div>
                  </div>
               </div>
            </div>
            
            <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                     <label for="title" class="col-md-6 control-label">Image<span class="text-red" style="color:red">*</span></label>
                     <div class="col-md-12">
                        <input type="file" name="upcomming_events_image" class="custom-file-input" id="imgInp">
                        <label class="custom-file-label" for="imgInp">Choose file</label>
                     </div>
                  </div>
               </div>
            </div>
           
            <div class="form-group">
              <img id="blah" src="<?= base_url($single->upcomming_events_image); ?>" width="150" height="150"/>
            </div>
            <div class="form-group">
               <div class="col-md-12">
                  <input type="submit"  name="submit" value="Update Event" class="btn btn-primary pull-right">
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



















