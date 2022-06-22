<?php include('common-file/user_header.php'); ?>
<style>.avatar {
  vertical-align: middle;
  width: 50px;
  height: 50px;
  border-radius: 50%;
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
                  <p>Personal info and Options to manage it. You can make some of this info, like your contct
                     details, visible to others so they can reach your easly. you can also see a summary of
                     ypur profile
                  </p>
               </div>
               <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                  <img src="<?= base_url('front-end/') ?>images/Links/icon1.jpg" alt="">
               </div>
            </div>
            <div class="card">
               <div class="card-body">
                   <?php if($this->session->flashdata('error')){ ?>
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                      <div>
                        <?= $this->session->flashdata('error') ?>
                      </div>
                    </div>
                    <?php } ?>
                    
                    <?php if($this->session->flashdata('success')){ ?>
                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Primary:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                      <div>
                        <?= $this->session->flashdata('success') ?>
                      </div>
                    </div>
                    <?php } ?>
                  <h5>Admin Basic Info</h5>
                  <p>Some info may be visible to other people using pink7 service. <span
                     class="text-primary">Learn more</span></p>
                  <?php echo form_open_multipart(base_url('user/dashboard'), 'class="form-horizontal"');  ?> 
                
                     <div class="row">
                        <div class="col-md-12 control">
                           <label for="">Name:</label>
                           <input type="text" name="customer_name" class="form-control" value="<?php echo set_value('customer_name', $single->customer_name) ?>" /> 
                          
                        </div>
                        <div class="col-md-12 control">
                           <label for="">Email:</label>
                           <input type="text" name="customer_email" class="form-control" value="<?php echo set_value('customer_email', $single->customer_email) ?>" /> 
                        </div>
                        <div class="col-md-12 control">
                           <label for="">Phone:</label>
                           <input type="number" name="customer_mobile" class="form-control" readonly="" value="<?php echo set_value('customer_mobile', $single->customer_mobile) ?>"/>
                        </div>
                        <div class="col-md-12 control">
                           <label for="">Birthday:</label>
                           <input type="date" name="customer_dob" class="form-control" value="<?php echo set_value('customer_dob', $single->customer_dob) ?>"/>
                        </div>
                        <div class="col-md-12 control">
                           <label for="">Anniversary:</label>
                           <input type="date" name="customer_anniversary" class="form-control" value="<?php echo set_value('customer_anniversary', $single->customer_anniversary) ?>"/>
                        </div>

                        <div class="col-md-12 control">
                           <label for="">Gender:</label>
                           <input type="radio" value="0" <?php echo ($single->customer_gender =='0' ? 'checked' : '');?> name="customer_gender">Male &nbsp &nbsp 
                           <input type="radio" value="1" <?php echo ($single->customer_gender =='1' ? 'checked' : '');?> name="customer_gender">Female
                              
                        </div>
                        
                        <div class="col-md-12 control">
                            <div class="row">
                               <label for="">&nbsp &nbsp Photo:</label>
                               <input type="file" name="customer_image" value="choose image"> 
                               <?php if(!empty($single->customer_image)): ?>
                                      <img src="<?= base_url() .$single->customer_image ?>" alt="Avatar" class="avatar"> 
                               <?php  else:?> <img src="<?= base_url() ?>uploads/customer/img_avatar.png" alt="Avatar" class="avatar"> <?php  endif;?>
                               
                           </div>
                           
                        </div>
                        <div class="update ml-auto px-4">
                           <button type="submit" class="btn-a-sm">Update</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </section>
<?php include('common-file/user_footer.php'); ?>
      