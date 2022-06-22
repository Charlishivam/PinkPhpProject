<!-- Content Wrapper. Contains page content -->
<!-- For Messages -->
<?php $this->load->view('admin/includes/_messages.php') ?>
<div class="content-wrapper">
   <!-- Main content -->
   <section class="content">
      <div class="card card-default">
         <div class="card-header">
            <div class="d-inline-block">
               <h3 class="card-title"> <i class="fa fa-plus"></i>
                  Edit Subcategory  
               </h3>

            </div>
            <div class="d-inline-block float-right">
               <a href="<?= base_url('admin/subcategory'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Subcategory List</a>
            </div>
         </div>
         <div class="card-body">
            <form method="POST" action="<?= base_url()."admin/subcategory/edit" ?>" enctype="multipart/form-data">

                <input type="hidden" name="cat_id" value="<?= set_value('cat_id',$single->cat_id) ?>">


            <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                     <label for="cat_name" class="col-md-12 control-label">Category Name<span class="text-red" style="color:red">*</span></label>
                    
                     <div class="col-md-12">
                         <?= form_dropdown('cat_parents',$cat_parents,set_value('cat_parents',$single->cat_parents),'class="form-control" required id="cat_parents"') ?>
                         <?= form_error('cat_parents', '<div class="error">', '</div>'); ?>
                     </div>
                  </div>
               </div>
            </div>

            <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                     <label for="cat_name" class="col-md-12 control-label">Subcategory Name<span class="text-red" style="color:red">*</span></label>
                     <div class="col-md-12">
                        <input type="text" name="cat_name" required="" class="form-control" id="code" placeholder=" Enter Category Name " value="<?= set_value('cat_name',$single->cat_name) ?>">
                     </div>
                  </div>
               </div>
            </div>
            
            
            <div class="form-group">
               <div class="col-md-12">
                  <input type="submit"  name="submit" value="Update subcategory" class="btn btn-primary pull-right">
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

















