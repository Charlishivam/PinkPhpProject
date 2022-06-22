<?php include('common-file/_header.php'); ?>
<?php   $fetchData = "SELECT * FROM `ci_general_settings`";
        $single    = $this->db->query($fetchData)->row();
        
?>

      <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact" style="margin-top: 40px;">
      
      <div class="container" data-aos="fade-up">
                  <br>
        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info1">
              <div class="address">
                <i class="fa fa-map-marker text-white"></i>
                <h4>Location:</h4>
                       <p><?=$single->address ?></p>
                  </div>

              <div class="open-hours">
                <i class="fa fa-clock-o text-white" aria-hidden="true"></i>
                <h4>Open Hours:</h4>
                <p>
                  Monday-Saturday:<br>
                  11:00 AM - 7:00 PM
                </p>
              </div>

              <div class="email">
                <i class="fa fa-envelope text-white"></i>
                <h4>Email:</h4>
                 <p><?=$single->email ?></p>
              </div>

              <div class="phone">
                <i class="fa fa-phone fa-rotate-90 text-white"></i>
                <h4>For Enquiry:</h4>
                <p>  +<?=$single->mobile_number ?></p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">
            <?php include('common-file/error_message.php'); ?>
            <form method="POST" action="<?= base_url()."home/contactspage" ?>" enctype="multipart/form-data">
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="contact_us_name" class="form-control" id="name" placeholder="Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="number" class="form-control" name="contact_us_phone" id="number" placeholder="Mobile number" data-rule="number" data-msg="Please enter a valid number" />
                  <div class="validate"></div>
                </div>
                 <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="contact_us_email" id="email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
                 <div class="col-md-6 form-group">
                  <input type="text" name="contact_us_subject" class="form-control" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                 </div>
        
               <div class="form-group">
                <textarea class="form-control" name="contact_us_message" rows="8" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              
            <div class="text-center"><button class="btn btn-a-sm" type="submit">Send Message</button></div>
            </form>
            <br><br>
          </div>
      </div>
 </div> 
    </section><!-- End Contact Section -->

<!-- contactus end-->

<!-- mapping section start -->
<div>
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25505.559689387774!2d77.2253636391018!3d28.631395577186623!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfdb87b535a21%3A0x31ed7db6ae96485d!2sTrust%20Cradle!5e0!3m2!1sen!2sin!4v1653376813283!5m2!1sen!2sin" width="600" height="450" style="border:0; width: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<!-- mapping section end -->

<?php include('common-file/_footer.php'); ?>