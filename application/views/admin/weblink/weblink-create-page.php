<?php $this->load->view('admin/includes/_messages'); ?>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugins/custom/uppy/uppy.bundle.css">
<!-- Alert Wrapper. Contains page content -->
<div class="card card-custom gutter-b example example-compact">
	<div class="card-header">
		<h3 class="card-title">Weblink Create</h3>
		<div class="card-toolbar">
			<!--<div class="example-tools justify-content-center">
				<span class="example-toggle" data-toggle="tooltip" title="View code"></span>
			</div>-->
		</div>
	</div>
    <div class="content-wrapper">
    	<section class="content">
            <?= form_open_multipart('','class="form" ') ?>
            	<div class="card-body">
            		<div class="row">
            		    <label class="col-lg-2 col-form-label text-right">Category</label>
            			<div class="col-md-4 my-2 my-md-0">
	            			<div class="col-lg-10">
	            				<?=  form_dropdown('category',$dropdata,set_value('category'),'class="form-control" required') ?>
	            				<span class="form-text text-muted">Select category</span>
	            			</div>
						</div>
						<label class="col-lg-2 col-form-label text-right">Template</label>
            			<div class="col-md-4 my-2 my-md-0">
	            			<div class="col-lg-10">
	            				<?=  form_dropdown('template',$template,'','class="form-control" required') ?>
	            				<span class="form-text text-muted">Select template</span>
	            			</div>
						</div>
					</div>
					<div class="separator separator-dashed my-8"></div>
					<div class="row">
            			<label class="col-lg-2 col-form-label text-right">User name</label>
            			<div class="col-md-9 my-2 my-md-0">
	            			<div class="col-lg-12">
	            				<?=  form_dropdown('username',$users,'','class="form-control" required') ?>
	            				<span class="form-text text-muted">Select user</span>
	            			</div>
						</div>
            		</div>
            		<div class="separator separator-dashed my-8"></div>
					<div class="row">
            			<label class="col-lg-2 col-form-label text-right">Title</label>
            			<div class="col-md-9 my-2 my-md-0">
	            			<div class="col-lg-10">
	            			    <input type="text" name="title" class="form-control" value="<?= set_value('title') ?>" required/>
	            				<span class="form-text text-muted">Web Link title</span>
	            			</div>
						</div>
            		</div>
            		<div class="row">
            			<label class="col-lg-2 col-form-label text-right">Description</label>
            			<div class="col-md-9 my-2 my-md-0">
	            			<div class="col-lg-10">
	            			    <textarea type="text" name="description" class="form-control" required/><?= set_value('description') ?></textarea>
	            				<span class="form-text text-muted">Web Link Description title</span>
	            			</div>
						</div>
            		</div>
            		<div class="row">
            			<label class="col-lg-2 col-form-label text-right">Address</label>
            			<div class="col-md-9 my-2 my-md-0">
	            			<div class="col-lg-10">
	            			    <input type="text" name="address" class="form-control" value="<?= set_value('address') ?>" required/>
	            				<span class="form-text text-muted">Address</span>
	            			</div>
						</div>
            		</div>
                    
                    <div class="row">
            			<label class="col-lg-2 col-form-label text-right">Website</label>
            			<div class="col-md-9 my-2 my-md-0">
	            			<div class="col-lg-10">
	            			    <input type="text" name="website" class="form-control" value="<?= set_value('website') ?>" required/>
	            				<span class="form-text text-muted">Website Url</span>
	            			</div>
						</div>
            		</div>
            		<div class="separator separator-dashed my-8"></div>
            		<div class="row">
						<label class="col-xl-2 col-lg-2 col-form-label text-right">Logo</label>
						<div class="col-lg-3 col-xl-3">
							<div class="image-input image-input-outline" id="kt_image_1">
								<div class="image-input-wrapper" style="background-image: url(<?= base_url('back-end/metronic/theme/html/demo2/dist/assets/media/users/100_1.jpg')?>)"></div>
								<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
									<i class="fa fa-pen icon-sm text-muted"></i>
									<input type="file" name="logo" accept=".png, .jpg, .jpeg" />
									<input type="hidden" name="profile_avatar_remove" />
								</label>
								<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
									<i class="ki ki-bold-close icon-xs text-muted"></i>
								</span>
							</div>
							<span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
						</div>
						<div class="col-lg-5">
							<div class="alert alert-custom alert-default" role="alert">
                                <div class="alert-icon">
                                    <span class="svg-icon svg-icon-primary svg-icon-xl">
                                        <i class="flaticon-danger"></i>
                                    </span>
                                </div>
                                <div class="alert-text">Here you can upload your profile image for business logo<br> Only JPG, PNG  files are allowed.</div>
                            </div>
						</div>
            		</div>
            		<!--<div class="separator separator-dashed my-8"></div>
					<div id="kt_repeater_2" style="margin-top:10px;">
            			<div class="form-group row">
            				<label class="col-lg-2 col-form-label text-right">Banner Image</label>
            				<div data-repeater-list="banners" class="col-lg-10">
            					<div data-repeater-item="bannersfield" class="form-group row align-items-center">
            						<div></div>
            					    <div class="col-md-6 custom-file">
            							<input type="file" name="banners" class="custom-file-input">

            							<label class="custom-file-label selected" style="margin-left:23px;"></label>
            							<input type="hidden" name="bannersh" class="custom-file-input" value="1"> 
            						</div>
            						<div class="col-md-1">
            							<a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
            							<i class="la la-trash-o"></i></a>
            						</div>
            					</div>
            				</div>
            			</div>
            			<div class="form-group row">
            				<label class="col-lg-2 col-form-label text-right"></label>
            				<div class="col-lg-4">
            					<a href="javascript:;" data-repeater-create="" class="btn btn-sm font-weight-bolder btn-light-primary">
            					<i class="la la-plus"></i>More File</a>
            				</div>
            			</div>
            		</div>-->
            		<div class="separator separator-dashed my-8"></div>
					<div id="kt_repeater_2" style="margin-top:10px;">
            			<div class="form-group row">
            				<label class="col-lg-2 col-form-label text-right">YouTube Video Url</label>
            				<div data-repeater-list="videourl" class="col-lg-10">
            					<div data-repeater-item="videourlfield" class="form-group row align-items-center">
            					    <div class="col-md-8">
            							<input type="url" name="videourl" class="form-control" >
            						</div>
            						<div class="col-md-1">
            							<a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
            							<i class="la la-trash-o"></i></a>
            						</div>
            					</div>
            				</div>
            			</div>
            			<div class="form-group row">
            				<label class="col-lg-2 col-form-label text-right"></label>
            				<div class="col-lg-4">
            					<a href="javascript:;" data-repeater-create="" class="btn btn-sm font-weight-bolder btn-light-primary">
            					<i class="la la-plus"></i>More video url</a>
            				</div>
            			</div>
            		</div>
            		<div class="separator separator-dashed my-8"></div>
					<div id="kt_repeater_3" style="margin-top:10px;">
            			<div class="form-group row">
            				<label class="col-lg-2 col-form-label text-right">Gallry Image</label>
            				<div data-repeater-list="gallery" class="col-lg-10">
            					<div data-repeater-item="galleryfield" class="form-group row align-items-center">
            						<div></div>
            					    <div class="col-md-6 custom-file">
            							<input type="file" name="gallery" class="custom-file-input">
            							
            							<label class="custom-file-label selected" for="customFile" style="margin-left:23px;"></label>
            							<input type="hidden" name="gallery" class="custom-file-input" value="1">
            						</div>
            						<div class="col-md-1">
            							<a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
            							<i class="la la-trash-o"></i></a>
            						</div>
            					</div>
            				</div>
            			</div>
            			<div class="form-group row">
            				<label class="col-lg-2 col-form-label text-right"></label>
            				<div class="col-lg-4">
            					<a href="javascript:;" data-repeater-create="" class="btn btn-sm font-weight-bolder btn-light-primary">
            					<i class="la la-plus"></i>More File</a>
            				</div>
            			</div>
            		</div>
            		<div class="separator separator-dashed my-8"></div>
            		<div id="kt_repeater_1">
            			<div class="form-group row">
            				<label class="col-lg-2 col-form-label text-right">Pages</label>
            				<div data-repeater-list="ads" class="col-lg-10">
            					<div data-repeater-item="adsfield" class="form-group row align-items-center" style="display: none;">
            					    <div class="col-md-9">
            							<label>Page Name</label>
										<input type="text" class="form-control" placeholder="Enter page title" name="pagename"/>
            							<div class="d-md-none mb-2"></div>
            						</div>
            						<div class="col-md-9">
            							<label>Page Description</label>
										<textarea type="url" class="form-control editor" id="" name="pagedescription"/></textarea>
            							<div class="d-md-none mb-2"></div>
            						</div>
            						<div class="col-md-1">
            							<a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger" style="    margin-top: 23px;">
            							<i class="la la-trash-o"></i></a>
            						</div>
            					</div>
            				</div>
            			</div>
            			<div class="form-group row">
            				<label class="col-lg-2 col-form-label text-right"></label>
            				<div class="col-lg-4">
            					<a href="javascript:;" data-repeater-create="" class="btn btn-sm font-weight-bolder btn-light-primary allEditors">
            					<i class="la la-plus"></i>Add</a>
            				</div>
            			</div>
            		</div>
            		<div class="separator separator-dashed my-8"></div>
            		<div class="row">
        		        <label class="col-lg-2 col-form-label text-right">Social Media</label>
            			<div class="col-md-3 my-2 my-md-0 input-group">
            			    <input type="url" name="facebook" placeholder="Facebook" class="form-control"> 
            			    <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="flaticon-facebook-logo-button"></i>
                                </span>
                            </div>
    					</div>
    					<div class="col-md-3 my-2 my-md-0 input-group">
            			    <input type="url" name="twitter" placeholder="Twitter" class="form-control"> 
            			    <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="flaticon-twitter-logo-button"></i>
                                </span>
                            </div>
    					</div>
    					<div class="col-md-3 my-2 my-md-0 input-group">
            			    <input type="url" name="linkedin" placeholder="LinkedIn" class="form-control"> 
            			    <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="flaticon-linkedin"></i>
                                </span>
                            </div>
    					</div>
					</div>
					<div class="row mt-10">
        		        <label class="col-lg-2 col-form-label text-right"></label>
            			<div class="col-md-3 my-2 my-md-0 input-group">
            			    <input type="url" name="youtube" placeholder="YouTube" class="form-control"> 
            			    <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="flaticon-youtube"></i>
                                </span>
                            </div>
    					</div>
    					<div class="col-md-3 my-2 my-md-0 input-group">
            			    <input type="url" name="instagram" placeholder="Instagram" class="form-control"> 
            			    <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="flaticon-instagram-logo"></i>
                                </span>
                            </div>
    					</div>
    					<div class="col-md-3 my-2 my-md-0 input-group">
            			    <input type="url" name="pinterest" placeholder="pinterest" class="form-control"> 
            			    <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="flaticon-black"></i>
                                </span>
                            </div>
    					</div>
					</div>
					<div class="separator separator-dashed my-8"></div>
            		<div class="row">
        		        <label class="col-lg-2 col-form-label text-right">Mobiles</label>
            			<div class="col-md-3 my-2 my-md-0 input-group">
            			    <input type="text" name="mobile_1" placeholder="Mobile number first" class="form-control"> 
            			    <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="flaticon2-phone"></i>
                                </span>
                            </div>
    					</div>
    					<div class="col-md-3 my-2 my-md-0 input-group">
            			    <input type="text" name="mobile_2" placeholder="Mobile number second" class="form-control"> 
            			    <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="flaticon2-phone"></i>
                                </span>
                            </div>
    					</div>
    					<div class="col-md-3 my-2 my-md-0 input-group">
            			    <input type="text" name="mobile_3" placeholder="Whatsapp number" class="form-control"> 
            			    <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="flaticon-whatsapp"></i>
                                </span>
                            </div>
    					</div>
					</div>
					<div class="separator separator-dashed my-8"></div>
            		<div class="row">
        		        <label class="col-lg-2 col-form-label text-right">E-mail</label>
            			<div class="col-md-9 my-2 my-md-0 input-group">
            			    <input type="text" name="email" placeholder="E-mail" class="form-control"> 
            			    <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="flaticon-email"></i>
                                </span>
                            </div>
    					</div>
					</div>
					<div class="separator separator-dashed my-8"></div>
					<div class="row">
					    <div class="form-group form-group-last">
                            <div class="alert alert-custom alert-default" role="alert">
                                <div class="alert-icon">
                                    <span class="svg-icon svg-icon-primary svg-icon-xl">
                                        <i class="flaticon2-bell-4 text-success"></i>
                                    </span>
                                </div>
                                <div class="alert-text">Meta tags are snippets of code that tell search engines important information about your web page, such as how they should display it in search results. They also tell web browsers how to display it to visitors.</div>
                            </div>
                        </div>
					</div>
					<div class="row">
            			<label class="col-lg-2 col-form-label text-right">Meta Title</label>
            			<div class="col-md-10 my-2 my-md-0">
	            			<div class="col-lg-10">
	            			    <textarea type="text" name="meta_title" class="form-control" required/></textarea>
	            				<span class="form-text text-muted">Web Link Meta title</span>
	            			</div>
						</div>
            		</div>
            		<div class="row">
            			<label class="col-lg-2 col-form-label text-right">Meta Description</label>
            			<div class="col-md-10 my-2 my-md-0">
	            			<div class="col-lg-10">
	            			    <textarea type="text" name="meta_description" class="form-control" required/></textarea>
	            				<span class="form-text text-muted">Web Link Meta Description</span>
	            			</div>
						</div>
            		</div>
            		<div class="row">
            			<label class="col-lg-2 col-form-label text-right">Meta Keywords</label>
            			<div class="col-md-10 my-2 my-md-0">
	            			<div class="col-lg-10">
	            			    <textarea type="text" name="meta_keywords" class="form-control" required/></textarea>
	            				<span class="form-text text-muted">Web Link Meta Keywords</span>
	            			</div>
						</div>
            		</div>
            	</div>
            	<div class="card-footer">
            		<div class="row">
            			<div class="col-lg-2"></div>
            			<div class="col-lg-2">
            				<button type="submit" class="btn font-weight-bold btn-success mr-2">Submit</button>
            			</div>
            		</div>
            	</div>
            <?= form_close() ?>
        </section>
    </div>
</div>

<script src="<?= base_url() ?>assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js"></script>
<script src="<?= base_url() ?>assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js"></script>
<script src="<?= base_url() ?>assets/js/pages/crud/file-upload/image-input.js"></script>
<script>
$(document).on('change','.custom-file-input',function(){
  var i = $(this).next('label').clone();
  var file = $(this)[0].files[0].name;
  $(this).next('label').text(file);
});

$(document).on('click','.allEditors',function(){
    var classes=$(this).closest('.form-group').prev().find('.editor');
    var id =classes[classes.length-1];
    console.log(id);
    cke(id);
})

function cke(e){
    ClassicEditor
    .create(e)
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
}


// Class definition

var KTCkeditor = function () {
    // Private functions
    var demos = function () {
        ClassicEditor
            .create( document.querySelector( '#editors' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    }

    return {
        // public functions
        init: function() {
            demos();
        }
    };
}();

// Initialization
jQuery(document).ready(function() {
    KTCkeditor.init();
});
</script>
