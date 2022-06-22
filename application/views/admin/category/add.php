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
                  Add New Category  
               </h3>
            </div>
            <div class="d-inline-block float-right">
               <a href="<?= base_url('admin/category'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Category List</a>
            </div>
         </div>
         <div class="card-body">
            <form method="POST" action="<?= base_url()."admin/category/add" ?>" enctype="multipart/form-data">

            <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                     <label for="cat_name" class="col-md-12 control-label">Category Name<span class="text-red" style="color:red">*</span></label>
                    
                     <div class="col-md-12">
                     
                        <input type="text" name="cat_name" required="" class="form-control" id="code" placeholder=" Enter Category Name ">
                     
                     </div>
                  </div>
               </div>
            </div>
            
          
            <div class="form-group">
               <div class="col-md-12">
                  <input type="submit"  name="submit" value="Add category" class="btn btn-primary pull-right">
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

















