<?php include('common-file/user_header.php'); ?>
<style>.avatar {
    vertical-align: middle;
    width: 200px;
    height: 110px;
    border-radius: 15px;
    padding: 5px;
}
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
      <div class="row">
         <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12 mt-4">
            <h5>Your profile info in pink7 services</h5>
            <p>Personal info and Options to manage it. You can make some of this info, like your contct details,
               visible to others so they can reach your easly. you can also see a summary of ypur profile
            </p>
         </div>
         <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
            <img src="<?= base_url('front-end/') ?>images/Links/icon1.jpg" alt="">
         </div>
      </div>
      <div class="card">
         <div class="card-body">
            <?php include('common-file/error_message.php'); ?>
            <h5>Organisation Details</h5>
            <p>Some info may be visible to other people using pink7 service. <span class="text-primary">Learn
               more</span>
            </p>
            <?php echo form_open_multipart(base_url('user/companyinfo'), 'class="form-horizontal"');  ?> 
            <div class="row">
               <div class="col-md-12 control">
                  <label for="">Org Name:</label>
                  <input type="text" name="orgname" class="form-control" value="<?= set_value('orgname',$single->customer_organisation) ?>">
               </div>
               <div class="col-md-12 control">
                  <label for="">Address:</label>
                  <input type="text" name="address" class="form-control"
                     value="<?= set_value('address',$single->customer_address) ?>">
               </div>
               <div class="col-md-12 control">
                  <label for="">About org:</label>
                  <textarea class="form-control" placeholder="Enter Message" rows="4" name="about_org"><?= set_value('about_org',$single->customer_about_org) ?></textarea>
               </div>
               <div class="col-md-12 control">
                  <div class="col-md-2">
                     <label for="">Org Logo:</label>
                  </div>
                  <div class="col-md-12 default mt-3">
                     <div class="row">
                        <div class="col-md-4">
                           <div class="org text-center">
                              <div class="circle card">
                                 <div class="card-body">
                                    <div class="upload__box">
                                       <div class="upload__btn-box">
                                          <label class="upload__btn">
                                          <input type="file" multiple="" name="customer_logo1" data-max_length="10" class="upload__inputfile">
                                           <?php if(!empty($single->customer_logo1)): ?>
                                            <img src="<?= base_url('uploads/images/customer/'.$single->customer_logo1); ?>" alt="Avatar" class="avatar"> 
                                          <?php  else:?> <img src="<?= base_url() ?>uploads/customer/img_avatar.png" alt="Avatar" class="avatar"> <?php  endif;?>
                                          </label>
                                       </div>
                                       <div class="upload__img-wrap"></div>
                                    </div>
                                 </div>
                              </div>
                              <p class="mt-3">Default</p>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="org text-center">
                              <div class="circle card">
                                 <div class="card-body">
                                    <div class="upload__box">
                                       <div class="upload__btn-box">
                                          <label class="upload__btn">
                                          <input type="file" multiple=""  name="customer_logo2"  data-max_length="10" class="upload__inputfile">
                                          <?php if(!empty($single->customer_logo2)): ?>
                                            <img src="<?= base_url('uploads/images/customer/'.$single->customer_logo2); ?>" alt="Avatar" class="avatar"> 
                                          <?php  else:?> <img src="<?= base_url() ?>uploads/customer/img_avatar.png" alt="Avatar" class="avatar"> <?php  endif;?>
                                          </label>
                                       </div>
                                       <div class="upload__img-wrap"></div>
                                    </div>
                                 </div>
                              </div>
                              <p class="mt-3">Reverse</p>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="org text-center">
                              <div class="circle card">
                                 <div class="card-body">
                                    <div class="upload__box">
                                       <div class="upload__btn-box">
                                          <label class="upload__btn">
                                          <input type="file" multiple="" name="customer_logo3"  data-max_length="10" class="upload__inputfile">
                                          <?php if(!empty($single->customer_logo3)): ?>
                                            <img src="<?= base_url('uploads/images/customer/'.$single->customer_logo3); ?>" alt="Avatar" class="avatar"> 
                                          <?php  else:?> <img src="<?= base_url() ?>uploads/customer/img_avatar.png" alt="Avatar" class="avatar"> <?php  endif;?>
                                          </label>
                                       </div>
                                       <div class="upload__img-wrap"></div>
                                    </div>
                                 </div>
                              </div>
                              <p class="mt-3">Monotone</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="update mt-5 ml-auto px-3">
      <button type="submit" name ="submit" class="btn btn-warning">Update</button>
      <button type="submit" name ="submit" class="btn btn-warning">Save</button>
   </div>
   <?php echo form_close( ); ?>
</section>
<?php include('common-file/user_footer.php'); ?>