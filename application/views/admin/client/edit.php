<!-- Content Wrapper. Contains page content -->
<!-- For Messages -->
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script> 
<?php $this->load->view('admin/includes/_messages.php') ?>
<div class="content-wrapper">
   <!-- Main content -->
   <section class="content">
      <div class="card card-default">
         <div class="card-header">
            <div class="d-inline-block">
               <h3 class="card-title"> <i class="fa fa-plus"></i>
                  Edit Client's Logo
               </h3>
            </div>
            <div class="d-inline-block float-right">
               <a href="<?= base_url('admin/client'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Client's Logo List</a>
            </div>
         </div>
         <div class="card-body">
            <form method="POST" action="<?= base_url()."admin/client/edit/".$single->client_id ?>" enctype="multipart/form-data">
                
                
            <input type="hidden" name="client_id" value="<?= set_value('client_id',$single->client_id) ?>">
            <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                     <label for="knowedge_heading" class="col-md-12 control-label">Client Title<span class="text-red" style="color:red">*</span></label>
                    
                     <div class="col-md-12">
                        <input type="text" name="client_title" class="form-control" id="client_title" placeholder="Enter Client Title" value="<?= set_value('client_title',$single->client_title) ?>">
                        <?php echo form_error('client_title');?>
                        
                     </div>
                  </div>
               </div>
               
            </div>
           

             <div class="row">
               <div class="col-md-6">
                   <div class="form-group">
                     <label for="title" class="col-md-6 control-label">Client's Logo<span class="text-red" style="color:red">*</span></label>
                     <div class="col-md-12">
                        <input type="file" name="client_image" class="custom-file-input" id="imgInp">
                        <label class="custom-file-label" for="imgInp">Choose file</label>
                     </div>
                  </div>
               </div>

               <div class="col-md-6">
                   <div class="form-group">
                     <label for="title" class="col-md-6 control-label">Logo<span class="text-red" style="color:red">*</span></label>
                     <div class="col-md-12">
                         <img id="blah" src="<?= base_url('uploads/client/'.$single->client_image); ?>" width="150" height="150"/>
                     </div>
                  </div>
               </div>
            </div>
           
            <div class="form-group">
               <div class="col-md-12">
                  <input type="submit"  name="submit" value="Update Client" class="btn btn-primary pull-right">
               </div>
            </div>
            <?php echo form_close( ); ?>
         </div>
         <!-- /.box-body -->
      </div>
   </section>
</div>

  
<script>
    CKEDITOR.replace('editor1')
</script>

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























