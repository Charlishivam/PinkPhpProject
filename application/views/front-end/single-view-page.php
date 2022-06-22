    <?php include('common-file/_header.php'); ?>
       <?php $data = $single->row(); ?>
        <div class="Pink-project common-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-5">
                        <div class="img-box">
                           <img class="w-100" src="<?= base_url('uploads/greeting/'.$data->greeting_image) ?>">
                        </div>
                    </div>
                    <div class="col-12 col-md-7">
                        <div class="content-box">
                            <h2 class="pink-color"><?= $data->greeting_name ?></h2>
                            <p><?= $data->greeting_description ?></p>
                            <?php if($this->session->flashdata('error')){ ?>
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                               <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                  <use xlink:href="#exclamation-triangle-fill"/>
                               </svg>
                               <div>
                                  <?= $this->session->flashdata('error') ?>
                               </div>
                            </div>
                            <?php } ?>
                            <?php if($this->session->flashdata('success')){ ?>
                            <div class="alert alert-primary d-flex align-items-center" role="alert">
                               <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Primary:">
                                  <use xlink:href="#exclamation-triangle-fill"/>
                               </svg>
                               <div>
                                  <?= $this->session->flashdata('success') ?>
                               </div>
                            </div>
                            <?php } ?>
                            <?= form_open() ?>
                            <div class="form-group mb-5">

                                <textarea class="form-control" name="content" rows="4" data-rule="required" data-msg="Please write something for us" placeholder=""></textarea>
                                <div class="validate"></div>
                                <?php echo form_error('content', '<div class="error">', '</div>'); ?>
                            </div>
                            <?php if(!empty($user->customer_logo1) || !empty($user->customer_logo2) || !empty($user->customer_logo2)){ ?>
                            <div class="underline">
                                <p>Choose Logo</p>
                            </div>
                            <div class="row mb-3">
                                <?php if(!empty($user->customer_logo1) && file_exists('uploads/images/customer/'.$user->customer_logo1)){ ?>
                                <div class="col-6 col-md-6 col-lg-3 text-center">
                                    <div class="common-logo-box">
                                        <img src="<?= base_url('uploads/images/customer/'.$user->customer_logo1) ?>" class="w-100" alt="" width="100%">
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        
                                        <input type="radio" id="logo1" name="logo" class="custom-control-input" value="<?= 'uploads/images/customer/'.$user->customer_logo1 ?>">
                                        <label for="Default">Default Logo</label>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php if(!empty($user->customer_logo2) && file_exists('uploads/images/customer/'.$user->customer_logo2)){ ?>
                                <div class="col-6 col-md-6 col-lg-3 text-center">
                                    <div class="common-logo-box">
                                        
                                         <img src="<?= base_url('uploads/images/customer/'.$user->customer_logo1) ?>" class="w-100" alt="" width="100%">
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="logo2" name="logo" class="custom-control-input" value="<?= 'uploads/images/customer/'.$user->customer_logo2 ?>">
                                        <label for="Color">Color Logo</label>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php if(!empty($user->customer_logo3) && file_exists('uploads/images/customer/'.$user->customer_logo3)){ ?>
                                <div class="col-6 col-md-6 col-lg-3 text-center">
                                    <div class="common-logo-box">
                                        <img src="<?= base_url('uploads/images/customer/'.$user->customer_logo3) ?>" class="w-100" alt="" width="100%">
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        
                                        <input type="radio" id="logo3" name="logo" class="custom-control-input" value="<?= 'uploads/images/customer/'.$user->customer_logo3 ?>">
                                        <label for="White">White Logo</label>
                                    </div>
                                </div>
                                <?php } ?>
                                <!--<div class="col-6 col-md-6 col-lg-3 text-center">-->
                                <!--    <div class="common-logo-box">-->
                                <!--        <img class="w-100" src="img/img-preview/logo.png" />-->
                                <!--    </div>-->
                                <!--     <div class="custom-control custom-radio custom-control-inline">-->
                                <!--        <input type="radio" id="Shape" name="radio-group" />-->
                                <!--        <label for="Shape">Shape - Logo</label>-->
                                <!--    </div>-->
                                <!--</div>-->
                            </div>
                            <?php echo form_error('logo', '<div class="error">', '</div>'); ?>
                            <?php } ?>
                            <div class="underline">
                                <p>Logo Position</p>
                            </div>

                            
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="test1" name="logo_position" class="custom-control-input position" value="top_left" checked>
                                    <label for="test1">Top Left</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="test2" name="logo_position" class="custom-control-input position" value="bottom_left" >
                                    <label for="test2">Bottom Left</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                   
                                    <input type="radio" id="test3" name="logo_position" class="custom-control-input position" value="top_right" >
                                    <label for="test3">Top Right</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="test4" name="logo_position" class="custom-control-input position" value="bottom_right">
                                    <label for="test4">Bottom Right</label>
                                </div>
                                <?php echo form_error('logo_position', '<div class="error">', '</div>'); ?>
                           

                            <div class="underline mt-4">
                                <p>Deployment</p>
                            </div>

                            <div class="row Deployment-box">
                                <div class="col-6 col-md-3">
                                    <div class="common-logo-box text-center">
                                        <div class="social-media-icon">
                                            <img class="w-100 h-100" src="<?= base_url('front-end/') ?>img/facebook.png" />
                                        </div>
                                        <?php if($connection['fb_connection'] == true){ ?>
                                        <label class="switch">
                                            <input type="checkbox" name="facebook" value="facebook" id="toogles">
                                            <span class="slider round"></span>
                                        </label>
                                        <?php }else{ ?>
                                        <a href="<?= site_url('user/socialmedia') ?>" class="text-center btn btn-outline-danger waves-effect" style="margin: 0 auto;" title="view details" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <?php } ?>            
                                    </div>
                                </div>
                                
                                <div class="col-6 col-md-3">
                                    <div class="common-logo-box text-center">
                                        <div class="social-media-icon">
                                            <img class="w-100 h-100" src="<?= base_url('front-end/') ?>img/instagram-img.png" />
                                        </div>
                                        <?php if($connection['insta_connection'] == true){ ?>
                                        <label class="switch">
                                            <input type="checkbox" name="instagram" class="custom-control-input position" value="instagram" id="toogles1">
                                            <span class="slider round"></span>
                                        </label>
                                        <?php }else{ ?>
                                        <a href="<?= site_url('user/socialmedia') ?>" class="text-center btn btn-outline-danger waves-effect" style="margin: 0 auto;" title="view details" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="common-logo-box text-center">
                                        <div class="social-media-icon">
                                            
                                            <img class="w-100 h-100" src="<?= base_url('front-end/') ?>img/twitter-img.png" />
                                        </div>
                                        <?php if($connection['tw_connection'] == true){ ?>
                                        <label class="switch">
                                            <input type="checkbox" name="twitter" class="custom-control-input position" value="twitter" id="toogles2">
                                            <span class="slider round"></span>
                                        </label>
                                        <?php }else{ ?>
                                        <a href="<?= site_url('user/socialmedia') ?>" class="text-center btn btn-outline-danger waves-effect" style="margin: 0 auto;" title="view details" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="common-logo-box text-center">
                                        <div class="social-media-icon">
                                            <img class="w-100 h-100" src="<?= base_url('front-end/') ?>img/whatsapp.png" />
                                            
                                        </div>
                                        <?php if($connection['whsp_connection'] == true){ ?>
                                        <label class="switch">
                                            <input type="checkbox" name="whatsapp" class="custom-control-input position" value="whatsapp" id="toogles3">
                                            <span class="slider round"></span>
                                        </label>
                                        <?php }else{ ?>
                                         <a href="<?= site_url('whatsaap/dashboard/scan') ?>" class="btn btn-light w-50" style="margin: 0 auto;" title="view details" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                                         <?php } ?>
                                    </div>
                                </div>
                            </div>
                            
                            <?php echo form_error('whatsapp', '<div class="error">', '</div>'); ?>
                            <?php echo form_error('twitter', '<div class="error">', '</div>'); ?>
                            <?php echo form_error('instagram', '<div class="error">', '</div>'); ?>
                            <?php echo form_error('facebook', '<div class="error">', '</div>'); ?>

                            <div class="underline">
                                <p>Publishing Options</p>
                            </div>

                            <!--<form>-->
                            <!--    <div class="custom-control custom-radio custom-control-inline">-->
                            <!--        <input type="radio" id="Publish" checked name="radio-group" />-->
                            <!--        <label for="Publish">Publish Now</label>-->
                            <!--    </div>-->
                            <!--</form>-->

                          
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="Schedule" name="radio-group" />
                                    <label for="Schedule">Schedule for a Specific Date</label>
                                </div>
                                <div class="time-zone-box mt-4 pl-md-4">
                                    <div class="row">
                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-4">
                                            <input type="date" min="<?= date('Y-m-d',strtotime('+0 days')) ?>" name="date" class="form-control">
                                            <?php echo form_error('date', '<div class="error">', '</div>'); ?>
                                        </div>
                                        <?php $hours = array_combine(range(1,24), range(1,24)); ?>
                                        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-2">
                                            <?= form_dropdown('hours',$hours,'','class="form-control" required') ?>
                                            <?php echo form_error('hours', '<div class="error">', '</div>'); ?>
                                        </div>
                                        <?php $minutes = array_combine(range(1,59), range(1,59)); ?>
                                        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-2">
                                            <?= form_dropdown('minutes',$minutes,'','class="form-control" required') ?>
                                            <?php echo form_error('minutes', '<div class="error">', '</div>'); ?>
                                        </div>
                                        <?php $am_pm = array('AM'=>'AM','PM'=>'PM'); ?>
                                        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-2">
                                            <?= form_dropdown('am_pm',$am_pm,'','class="form-control" required') ?>
                                            <?php echo form_error('am_pm', '<div class="error">', '</div>'); ?>
                                        </div>
                                        <div class="col-12 mt-5">
                                            <div class="time-zone-text">
                                                <p>Time Zone: <b>IST</b></p>
                                            </div>
                                            <div>
                                                <input type="checkbox" name="cb" id="cb">
                                                <label for="cb">Remember me</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if(!empty($user->customer_logo1) && file_exists('uploads/images/customer/'.$user->customer_logo1) 
                                || !empty($user->customer_logo2) && file_exists('uploads/images/customer/'.$user->customer_logo2) 
                                || !empty($user->customer_logo2) && file_exists('uploads/images/customer/'.$user->customer_logo3)){ ?>

                                <div class="button-box mt-4">
                                    <div class="common-btn">
                                        <button type="submit" class="btn" name="preview" value="preview" style="padding: 11px 0px;"> Preview
                                        </button>
                                         <button type="submit"  class="btn" name="schedule" value="schedule" style="padding: 11px 0px;"> Schedule
                                        </button>
                                        <button type="submit" class="btn" name="publish" value="publish" style="padding: 11px 0px;"> Publish
                                        </button>
                            
                                    </div>
                                </div>
                                <?php }else{ ?>
                                <div class="message-box mb-4">
                                   <div class="row">
                                       <div class="alert alert-info alert-dismissible fade show" role="alert">
                                          <strong>Alert !</strong> Your profile is not a configured , Please first update your profile and configured logo, after configuration you can schedule media. <a href="<?= site_url('user/companyinfo') ?>">Click here ?</a>
                                        </div>
                                   </div>
                                </div>
                                <?php } ?>
                                <div class="clearfix "></div>
                                <?= form_close() ?>
                                <hr>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include('common-file/_footer.php'); ?>
