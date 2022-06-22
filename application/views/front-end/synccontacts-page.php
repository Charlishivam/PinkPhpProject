<!-- DataTables -->
<link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"> 
<style type="text/css">
   .panel-heading a{float: right;}
   #importFrm{margin-bottom: 20px;display: none;}
   #importFrm input[type=file] {display: inline;}
.info:hover
{
  background-color: rgb(204, 241, 241, 1);
  border-top-right-radius: 25px;
  border-bottom-right-radius: 25px;
}
.admin
{
    color: var(--primary-color);
}
</style>
<?php include('common-file/user_header.php'); ?>
<section>
   <div class="container mt-5">
      <div class="row">
         <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 col-12">
           <?php include('user-side-bar.php'); ?>
         </div>
         <div class="col-sm-9 col-md-9 col-lg-9 col-xl-9 col-12">
            <div class="row">
               <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12 mt-2">
                  <h5>Import Contact Files to share greetings</h5>
                  <p>Personal info and Options to manage it. You can make some of this info, like your contct details, visible to others so they can reach your easly. you can also see a summary of ypur profile</p>
               </div>
               <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12" style="margin-top: -40px;">
                  <img src="<?= base_url('front-end/') ?>images/Links/icon1.jpg" alt="">
               </div>
            </div>
            <?php include('common-file/error_message.php'); ?>
            <div class="col-12">
                    <form action="<?php echo site_url("user/sync_upload_file");?>" method="post" enctype="multipart/form-data" >
                    <div class="file-btn">
                        <div class="drag mt-4 common-btn common-d-flex">
                            <label for="files" class="btn Upload"><i class="far fa-address-book"></i> Upload files here</label>
                            <a href="<?= base_url('front-end/') ?>csv/datacsv.csv" class="btn Download"><i class="fa fa-download mr-1" aria-hidden="true"></i> Download CVV</a>
                        </div>
                        <div class="drag mt-2 common-btn">
                            <input type="submit" class="btn btn-a-sm" name="importSubmit" value="Submit">
                        </div>
                        <input type="file" id="files" name="file" style="visibility: hidden;" value="choose image" />
                        
                        <div class="text-center mt-3">
                            <p>
                                Drag and drop or choose a file to upload your contacts list.<br />
                                All csv, xlsx, docx and pdf types are supported.
                            </p>
                        </div>
                    </div>
                    </form>
                </div>
         </div>
      </div>
   </div>
</section>
<section>
   <div class="container list text-center">
      <div class="row">
         <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10 col-12 ml-auto">
            
            <div class="contacts-list mt-5">
               <div class="card mb-5">
                  <div class="card-body">
                     <div class="row mx-4">
                       
                           <h3 class="text">Contacts List added</h3>
                      
                     
                           <div class="d-inline-block ml-auto">
        					<a href="<?= base_url('user/syncadd'); ?>" class="btn-a-sm"><i class="fa fa-plus"></i> Add New Contact </a>
        			
        				   
                        </div>
                     </div>
                     <div class="container mt-4">
                        <div class="row">
                            <form action="<?php echo site_url("user/sync_upload_file");?>" method="post" enctype="multipart/form-data" id="importFrm">
                               <input type="file" name="file" />
                               <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
                            </form>
                           <table id="example1" class="table table-striped text-center">
                              <thead>
                                 <tr class="status"  >
                                    <th scope="col">Name</th>
                                    <th scope="col">Email Id</th>
                                    <th scope="col">Contact Number</th>
                                    <th scope="col">Favorite</th>
                                    <th scope="col">Whats Up Sync</th>

                                    <th scope="col">Action </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php foreach($records as $record): ?>
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
                                   
                                    <td>
                                        <a style="margin-top: 5px;" href="<?php echo site_url("user/syncedit/".$record->sync_contacts_id); ?>" class="btn btn-warning border-0 text-white btn-xs mr5" >
                                        <i class="fa fa-edit"></i>
                                        </a>
                                        <a style="margin-top: 5px;" href="<?php echo site_url("user/syncdelete/".$record->sync_contacts_id); ?>" onclick="return confirm('are you sure to delete?')" class="btn btn-danger border-0 text-white btn-xs"><i class="fa fa-trash"></i></a>
                                     </td>
                                    
                                 </tr>
                                 <?php endforeach; ?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<Script>
   $('.toggler').click(function () {
       $('.navigation').addClass('slide');
   });
   $('.close-btn').click(function () {
       $('.navigation').removeClass('slide');
   });
</Script>
<script type="text/javascript">
   $("#files").change(function() {
   filename = this.files[0].name;
   console.log(filename);
   });
</script>
</body>
</html>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Contacts</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            

            <?php echo form_open_multipart(base_url('user/synccontacts'), 'class="form-horizontal"');  ?> 
            <div class="row">
               <div class="col-md-12 control">
                  <label for="">Name:</label>
                  <input type="text" name="sync_contacts_name" class="form-control" id="sync_contacts_name"  required="" value="<?php echo set_value('sync_contacts_name') ?>" /> 
               </div>
               <div class="col-md-12 control">
                  <label for="">Email:</label>
                  <input type="text" name="sync_contacts_email" class="form-control" id="sync_contacts_email" value="<?php echo set_value('sync_contacts_email') ?>" /> 
               </div>
               <div class="col-md-12 control">
                  <label for="">Phone:</label>
                  <input type="number" name="sync_contacts_phone" class="form-control" id="sync_contacts_phone" required="" value="<?php echo set_value('sync_contacts_phone') ?>"/>
               </div>
               
               <div class="col-md-12 control">
                   <label for="">Favorite:</label>
                   <input type="radio" value="1"  name="sync_contacts_fav" class='sync_contacts_fav'>Yes
                   <input type="radio" value="0"  name="sync_contacts_fav" class='sync_contacts_fav'>No
                
                </div>
               
              
            </div>
            
         </div>
         <div class="modal-footer">
            <button type="submit" class="btn btn-warning">Save</button>
         </div>
         </form>
      </div>
   </div>
</div>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script>
  
    $("#example1").DataTable();

</script>

<script>
$(document).ready(function(){
    $(".editgroup").on("click", function(){
        
        $('#sync_contacts_name').val("");
        $('#sync_contacts_email').val("");
        $('#sync_contacts_phone').val("");
        $('.sync_contacts_fav').val("");
        $('#sync_contacts_id').val("");
        var dataname  = $(this).attr("data-sync-contacts-name");
        var dataemail = $(this).attr("data-sync-contacts-email");
        var dataphone = $(this).attr("data-sync-contacts-phone");
        var datafav   = $(this).attr("data-sync-contacts-fav");
        var dataid    = $(this).attr("data-sync-contacts-id");
       
    
        $('#sync_contacts_name').val(dataname);
        $('#sync_contacts_email').val(dataemail);
        $('#sync_contacts_phone').val(dataphone);
        $('#sync_contacts_phone').val(dataphone);
        $('#sync_contacts_id').val(dataid);
        $('#exampleModal').modal('show');

    });

   

});


</script>

 <script type="text/javascript">
        $("#files").change(function () {
            filename = this.files[0].name;
            console.log(filename);
        });
</script>