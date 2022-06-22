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
      <div class="profile">
         <a class="nav-link" href="<?= base_url()?>user/dashboard">
            <div class="admin">
               &nbsp <img src="<?= base_url('front-end/') ?>images/Links/home.png"> &nbsp Dashboard 
            </div>
         </a>
         <a class="nav-link" href="<?= base_url()?>user/dashboard">
            <div class="admin info">
               &nbsp <img src="<?= base_url('front-end/') ?>images/Links/icons8-personal-information-64.png"> &nbsp Admin Info
            </div>
         </a>
         <a class="nav-link" href="<?= base_url()?>user/companyinfo">
            <div class="admin">
               &nbsp <img src="<?= base_url('front-end/') ?>images/Links/icons8-organization-96.png"> &nbsp Company Info
            </div>
         </a>
         <a class="nav-link" href="<?= base_url()?>user/socialmedia">
            <div class="admin">
               &nbsp <img src="<?= base_url('front-end/') ?>images/Links/4187236.png"> &nbsp Social Media 
            </div>
         </a>
         <a class="nav-link" href="<?= base_url()?>user/upcomingevents">
            <div class="admin">
               &nbsp <img src="<?= base_url('front-end/') ?>images/Links/icons8-tear-off-calendar-100.png"> &nbsp Upcoming Events
            </div>
         </a>
         <a class="nav-link" href="<?= base_url()?>user/delivered">
            <div class="admin">
               &nbsp <img src="<?= base_url('front-end/') ?>images/Links/icons8-double-tick-96.png"> &nbsp Delivered
            </div>
         </a>
      </div>
   </div>
   <div class="col-sm-9 col-md-9 col-lg-9 col-xl-9 col-12">
   <h4 class="text-center">User Profile</h4>
   <p class="text-center">info about your organisation and administrator across pink7 services</p>
   <div class="row">
      <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12 mt-4">
         <h5>Your profile info in pink7 services</h5>
         <p>Personal info and Options to manage it. You can make some of this info, like your contct details, visible to others so they can reach your easly. you can also see a summary of ypur profile</p>
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
         <h5>Scan and connect whatsapp</h5>
         <p>Some info may be visible to other people using pink7 service. <span class="text-primary">Learn more</span></p>
         <div class="row">
            <div class="col-md-3">
               <div class="card text-center">
                  <img src="https://logodownload.org/wp-content/uploads/2015/04/whatsapp-logo-1.png" class="card-img-top media" alt="" width="100%">
                  <div class="card-body">
                     <div class="col-md-12">
                        <a href="javascript:;" class="btn btn-outline-danger waves-effect px-3 refresh" title="view details" ><i class="fa fa-qrcode" aria-hidden="true"></i></a>
                    </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="card text-center client">
               </div>
            </div>
            <div class="col-md-4">
               <div class="card text-center sender">
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php include('common-file/user_footer.php'); ?>
<script src="https://cdn.socket.io/4.5.0/socket.io.js"></script>
<script>
$(document).ready(function(){ 
    var socket = io.connect('https://pink7technology.herokuapp.com');
    $('.client').html('<a href="javascript:;" class="btn btn-outline-danger waves-effect px-3 refresh" title="view details" style="padding: 45%;"><i class="fa fa-qrcode" aria-hidden="true"></i></a>');
    socket.on("connect_error", (err) => {
      console.log(`connect_error due to ${err.message}`);
    });
    
    socket.on('remove-session', function (id) {
		$(`.client.client-${id}`).remove();
		console.log(`remove-session: ${id}`);
	});
	
	
	socket.on('message', function (data) {
		console.log(`message: ${data.id}`);
	});
	
	socket.on('authenticated', function (data) {
	    $('.client img').remove();
	    //$('.sender').html("<pre>["+data.id+"]</pre>");
		console.log(`authenticated: ${data.id}`);
		 window.location.replace('<?= site_url('socialapps/redirect_whatsaap') ?>');
	});
	
	socket.on('auth_failure', msg => {
      console.error('AUTHENTICATION FAILURE', msg);
    });

    socket.on('qr', function (data) {
        $('.client img').remove()
        $('.client').html("<img class='img-thumbnail' src="+data.src+">");
		console.log(`qr: ${data.src}`);
	});
	
    socket.on('init', function (data) {
		for (var i = 0; i < data.length; i++) {
		    console.log(data[i]);
		}
		socket.emit('authenticated', { id: "<?= md5($userid) ?>" });
	})
	
	socket.on('ready', function (data) {
		console.log(`ready: ${data.id}`);
	});
	
	$(document).on('click','.refresh',function(){
	    $('.client img').remove()
	    $('.client').html("<img src='https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87_w200.gif' style='width: 96%;padding: 40%;'>");
	    
	    socket.emit('create-session', {
    		id: "<?= md5($userid) ?>",
    		description: "User <?= md5($userid) ?>"
    	});
	})
	
});
</script>