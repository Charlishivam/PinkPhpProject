<?php include('common-file/_header.php'); ?>
        <section class="main-section common-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <div class="tab-section">
                            <ul class="nav tab-section" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <div class="nav-link active" id="home-tab" data-toggle="tab" data-target="#Dashboard" type="button" role="tab" aria-controls="home" aria-selected="true">
                                        <span><img src="<?= base_url('front-end/') ?>img/sycn.png" /></span> WhasApp Sync Edit
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-lg-9">
                        <div class="tab-content">
                            
                            <div class="tab-pane fade show active" id="Dashboard">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="your-profile-box">
                                            <h2 class="top-heading">Your profile info in pink7 services</h2>
                                            <p class="text">
                                                Personal info and Option to manage it. You can make some of this info, like your contct details, visible to other so they can your easly. you also see a summary of your profile.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="img-box">
                                            <img class="w-100" src="<?= base_url('front-end/') ?>img/img.png" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="top-heading">Edit Contact Number</h5>
                                                <p>These details is secured and will not be visible to anyone outside Pink7.in. <span class="text-primary">Read more</span></p>
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
                                                            <label class="col-lg-4 col-form-label text-lg-right"><span class="text-red" style="color:red">*</span>Country Code:</label>
                                                            <div class="col-lg-8">
                                                               <input type="number" class="form-control" name="sync_contact_country_code" placeholder="Enter country code" required="" value="<?= set_value('sync_contact_country_code',$single->sync_contact_country_code) ?>"/>
                                                            </div>
                                                         </div>
                                                         <div class="form-group row mt-3">
                                                            <label class="col-lg-4 col-form-label text-lg-right"><span class="text-red" style="color:red">*</span>Contact:</label>
                                                            <div class="col-lg-8">
                                                               <input type="number" class="form-control" name="sync_contacts_phone" placeholder="Enter contact number" required="" value="<?= set_value('sync_contacts_phone',$single->sync_contacts_phone) ?>"/>
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
                                                            <label class="col-lg-4 col-form-label text-lg-right"><span class="text-red" style="color:red">*</span>Whats Up Number:</label>
                                                            <div class="col-lg-8">
                                                               <div class="radio-inline">
                                                                  <label class="radio radio-outline radio-outline-2x radio-primary">
                                                                  <input type="radio" name="sync_contact_is_whatsapp" value='1' <?php if($single->sync_contact_is_whatsapp == '1') {?> checked="checked" <?php }?> />
                                                                  
                                                                  <span></span>
                                                                  Yes
                                                                  </label>
                                                                  <label class="radio radio-outline radio-outline-2x radio-primary radio-disabled">
                                                                  <input type="radio" name="sync_contact_is_whatsapp" value='0' <?php if($single->sync_contact_is_whatsapp == '0') {?> checked="checked" <?php }?> />
                                                                 
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
                                                               <button type="submit" class="btn btn-a-sm mr-2">Update</button>
                                                            </div>
                                                         </div>
                                                      </div>
                                                 </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php include('common-file/_footer.php'); ?>




