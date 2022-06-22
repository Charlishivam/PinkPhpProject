<?php include('common-file/user_header.php'); ?>
<style>
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
<section>
   <div class="container mt-5">
      <div class="row">
         <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 col-12">
           <?php include('user-side-bar.php'); ?>
         </div>
         <div class="col-sm-9 col-md-9 col-lg-9 col-xl-9 col-12">
            <div class="container list text-center">
               <div class="content-wrapper">
                  <!-- Main content -->
                  <section class="content">
                     <div class="card card-default">
                        <div class="card-header">
                           <div class="d-inline-block">
                              <h3 class="card-title"> <i class="fa fa-edit"></i>
                                 Edit New Contact
                              </h3>
                           </div>
                           <div class="d-inline-block float-right">
                              <a href="<?= base_url('user/synccontacts'); ?>" class="btn-a-sm"><i class="fa fa-list"></i>  Contact List</a>
                           </div>
                        </div>
                        <div class="card-body">
                           <form method="POST" action="<?= base_url()."user/syncedit" ?>" enctype="multipart/form-data">
                               <input type="hidden" name="sync_contacts_id" value="<?= set_value('sync_contacts_id',$single->sync_contacts_id) ?>" />
                              <div class="card-body">
                                 <div class="form-group row mt-3">
                                    <label class="col-lg-4 col-form-label text-lg-right"><span class="text-red" style="color:red">*</span>Name:</label>
                                    <div class="col-lg-8">
                                       <input type="text" name="sync_contacts_name" class="form-control" required="" placeholder="Enter name" value="<?= set_value('sync_contacts_name',$single->sync_contacts_name) ?>" />
                                    </div>
                                 </div>
                                 <div class="form-group row mt-3">
                                    <label class="col-lg-4 col-form-label text-lg-right"><span class="text-red" style="color:red">*</span>Email:</label>
                                    <div class="col-lg-8">
                                       <input type="email" class="form-control" name="sync_contacts_email" placeholder="Enter email"  value="<?= set_value('sync_contacts_email',$single->sync_contacts_email) ?>"/>
                                    </div>
                                 </div>
                                 <div class="form-group row mt-3">
                                    <label class="col-lg-4 col-form-label text-lg-right"><span class="text-red" style="color:red">*</span>Contact:</label>
                                    <div class="col-lg-8">
                                       <input type="number" class="form-control" name="sync_contacts_phone" placeholder="Enter contact number" required="" value="<?= set_value('sync_contacts_phone',$single->sync_contacts_phone) ?>"/>
                                    </div>
                                 </div>
                                <div class="form-group row mt-3">
                                    <label class="col-lg-4 col-form-label text-lg-right"><span class="text-red" style="color:red">*</span>Country Code:</label>
                                    <div class="col-lg-8">
                                       <input type="number" class="form-control" name="sync_contact_country_code" placeholder="Enter country code" required="" value="<?= set_value('sync_contact_country_code',$single->sync_contact_country_code) ?>"/>
                                    </div>
                                 </div>
                                 <div class="form-group row mt-3">
                                    <label class="col-lg-4 col-form-label text-lg-right"><span class="text-red" style="color:red">*</span>Favorite:</label>
                                    <div class="col-lg-8">
                                       <div class="radio-inline">
                                          <label class="radio radio-outline radio-outline-2x radio-primary">
                                          <input type="radio" name="sync_contacts_fav" value='1' <?php if($single->sync_contacts_fav == '1') {?> checked="checked" <?php }?> />
                                          <span></span>
                                          Yes
                                          </label>
                                          <label class="radio radio-outline radio-outline-2x radio-primary radio-disabled">
                                          <input type="radio" name="sync_contacts_fav" value='0' <?php if($single->sync_contacts_fav == '0') {?> checked="checked" <?php }?>/>
                                          <span></span>
                                          No
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                                 
                                 <div class="form-group row mt-3">
                                    <label class="col-lg-4 col-form-label text-lg-right"><span class="text-red" style="color:red">*</span>Whats Up:</label>
                                    <div class="col-lg-8">
                                       <div class="radio-inline">
                                          <label class="radio radio-outline radio-outline-2x radio-primary">
                                          <input type="radio" name="sync_contact_is_whatsapp" value='1' <?php if($single->sync_contact_is_whatsapp == '1') {?> checked="checked" <?php }?> />
                                          <span></span>
                                          Yes
                                          </label>
                                          <label class="radio radio-outline radio-outline-2x radio-primary radio-disabled">
                                          <input type="radio" name="sync_contact_is_whatsapp" value='0' <?php if($single->sync_contact_is_whatsapp == '0') {?> checked="checked" <?php }?>/>
                                          <span></span>
                                          No
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="card-footer">
                                 <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                       <button type="submit" class="btn-a-sm mr-2">Update</button>
                                    </div>
                                 </div>
                              </div>
                        </div>
                        </form>
                     </div>
                     <!-- /.box-body -->
               </div>
               </section>
            </div>
         </div>
      </div>
   </div>

</section>
<?php include('common-file/_footer.php'); ?>