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
                  Edit Teamplates  
               </h3>


            </div>
            <div class="d-inline-block float-right">
               <a href="<?= base_url('admin/subsubcategory'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Teamplates List</a>
            </div>
         </div>
         <div class="card-body">
            <form method="POST" action="<?= base_url()."admin/subsubcategory/edit" ?>" enctype="multipart/form-data">
                <?php $tag_id   = json_decode($single->greeting_tag_id); ?>
                <input type="hidden" name="greeting_id" value="<?= set_value('greeting_id',$single->greeting_id) ?>">
                
            <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                     <label for="cat_name" class="col-md-12 control-label">Tilte<span class="text-red" style="color:red">*</span></label>
                     <div class="col-md-12">
                         <input type="text" name="greeting_name" required="" value="<?= set_value('greeting_name',$single->greeting_name) ?>" class="form-control" id="greeting_name" placeholder="Enter Title" >
                     </div>
                  </div>
               </div>
            </div>  
            
            <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                     <label for="cat_name" class="col-md-12 control-label">Description<span class="text-red" style="color:red">*</span></label>
                     <div class="col-md-12">
                         <textarea  name="greeting_description" required="" class="form-control"><?= set_value('greeting_description',$single->greeting_description) ?></textarea>
                     </div>
                  </div>
               </div>
            </div>  
                
            <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                     <label for="cat_name" class="col-md-12 control-label">Category<span class="text-red" style="color:red">*</span></label>
                     <div class="col-md-12">
                         <?= form_dropdown('greeting_cat_id',$parents,set_value('greeting_cat_id',$single->greeting_cat_id),'class="form-control" required id="greeting_cat_id"') ?>
                         <?= form_error('greeting_cat_id', '<div class="error">', '</div>'); ?>
                     </div>
                  </div>
               </div>
            </div>    
                


            <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                     <label for="cat_name" class="col-md-12 control-label">Subcategory<span class="text-red" style="color:red">*</span></label>
                     <div class="col-md-12">
                         <?= form_dropdown('greeting_sub_cat_id',$cat_parents,set_value('greeting_sub_cat_id',$single->greeting_sub_cat_id),'class="form-control" required id="greeting_sub_cat_id"') ?>
                         <?= form_error('greeting_sub_cat_id', '<div class="error">', '</div>'); ?>
                     </div>
                  </div>
               </div>
            </div>
            
            
            
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title" class="col-md-6 control-label">Select Tag<span class="text-red" style="color:red">*</span></label>
                     <div class="col-md-12">
                        <?= form_dropdown('tag_id[]',$tags,set_value('tag_id[]',$tag_id),'class="form-control getsubcat" id="kt_select2_3" required multiple="multiple"') ?>
                        <?= form_error('tag_id', '<div class="error">', '</div>'); ?>
                     </div>
                  </div>
               </div>
            </div>
           <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                     <label for="cat_name" class="col-md-12 control-label">Events<span class="text-red" style="color:red">*</span></label>
                     <div class="col-md-12">
                         <?= form_dropdown('greeting_event_id',$all_event,set_value('greeting_event_id',$single->greeting_event_id),'class="form-control" id="greeting_event_id"') ?>
                         <?= form_error('greeting_sub_event_id', '<div class="error">', '</div>'); ?>
                     </div>
                  </div>
               </div>
            </div> 
            <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                     <label for="title" class="col-md-6 control-label">Greeting Image<span class="text-red" style="color:red">*</span></label>
                     <div class="col-md-12">
                        <input type="file" name="greeting_image" class="custom-file-input" id="imgInp">
                        <label class="custom-file-label" for="imgInp">Choose file</label>
                     </div>
                  </div>
               </div>
            </div>
            <div class="form-group">
              <img id="blah" src="<?= base_url('uploads/greeting/'.$single->greeting_image); ?>" width="150" height="150"/>
            </div>
            <div class="form-group">
               <div class="col-md-12">
                  <input type="submit"  name="submit" value="Update Greeting" class="btn btn-primary pull-right">
               </div>
            </div>
            <?php echo form_close( ); ?>
         </div>
         <!-- /.box-body -->
      </div>
   </section>
</div>
<script src="<?= base_url() ?>assets/js/pages/crud/forms/widgets/select2.js"></script>

<script type="text/javascript">
  $('#kt_select2_3').select2({
         placeholder: "Select a Tags",
        });
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

<script type="text/javascript">
    $(document).on('change','#greeting_cat_id',function(){
         var _this = $(this);
         $.ajax({
           url:"<?php echo base_url(); ?>/admin/subsubcategory/get_sub_category",
           type: "post",
           data: {'greeting_cat_id':_this.val()} ,
           success: function (response) {
            console.log(response);
            let subcat = JSON.parse(response);
            $('#greeting_sub_cat_id').find('option').not(':first').remove();
            for (var i = subcat.length - 1; i >= 0; i--) {
               $('#greeting_sub_cat_id').append('<option value="'+subcat[i].cat_id+'">'+subcat[i].cat_name+'</option>');
            }
           },
           error: function(jqXHR) {

           }
         });
    })
</script>

<script type="text/javascript">
    
       function set_no_of_images()
       {
           type=$('#set_no_of_images_status').val();

          
           if(type=="one")
           {

               $('#image_position1').show();
               $('#image_position2').hide();
           }

           if(type=="two")
           {
               $('#image_position2').show();
               $('#image_position1').show();
           }
       }
    
</script>

















