<?php include('common-file/_header.php'); ?>
<!--- prticing section start -->
<section>
    
           <div class="common-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                    </div>
                    <div class="col-12 col-md-8 mx-auto">       
                        <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                              <h1 class="display-4 fw-normal">Pricing</h1>
                              <p class="fs-5 text-muted">Pink7.in is a plateform where you can minimize your bill by choosing different plan. <br>Get start now. Select your plan and make your brand visible</p>
                              <span style="margin: 0.8em;">Monthly</span>
                        <label class="switch">
                            <input type="checkbox" id="toggle"/>
                            <span class="slider round"></span>
                        </label>
                        <span style="margin: 0.8em;">Annually</span>
                        </div>
                    </div>
                </div>
                <?php include('common-file/error_message.php'); ?>
                <form method="POST" action="<?= base_url()."subscription" ?>" enctype="multipart/form-data">
                    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center month" id="month">
                      <?php if(!empty($subcription_package_month)): ?>  
                          <?php foreach($subcription_package_month as $package_month_key => $package_month_value): ?>
                          <input type="hidden" name="plan_id" value=<?= $package_month_value->ci_sp_id ?> />
                           <?php $sql ="SELECT * FROM subscription_description WHERE subscription_id =".$package_month_value->ci_sp_id; 
                                    $query=$this->db->query($sql);
                                    $result=$query->result_array();
                           ?>
                          <div class="col">
                            <div class="card mb-4 rounded-3 shadow-sm">
                              <div class="card-header py-3">
                                <h4 class="my-0 fw-normal"><?= $package_month_value->ci_sp_title ?></h4>
                              </div>
                              <div class="card-body">
                                <h1 class="card-title pricing-card-title">&#8377;<?= $package_month_value->ci_sp_amount ?><small class="text-muted fw-light">/mo</small></h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                  <?php foreach($result as $key => $data): ?>
                                    <li><?=  $data['description'] ?></li>
                                  <?php endforeach; ?>
                                </ul>
        
                                <div class="pricing-button">
                                    <?php if(!empty(user_detail())): ?>
                                    <?php   
                                        $pkgsqlmonth   ="SELECT * FROM ci_purchase_membership WHERE tpm_active_status='1' AND tpm_plan_id =".$package_month_value->ci_sp_id. " AND tpm_user_id =".user_detail()->customer_id . " ORDER BY tpm_plan_id"; 
                                        $pkgquerymonth   =$this->db->query($pkgsqlmonth);
                                        $pkgresultmonth  =$pkgquerymonth->result_array();
                                      ?>
                                        <?if(!empty($pkgresultmonth)): ?>
                                          <a href="javascript:"<button type="button" class="w-100 btn btn-lg">Active <i class="fa fa-arrow-right"></i></button></a>
                                        <?php endif; ?>
                                        <?if(empty($pkgresultmonth)): ?>
                                          <a href="<?= base_url()."subscription/index/".$package_month_value->ci_sp_id ?>"<button type="submit" class="w-100 btn btn-lg">Get-started <i class="fa fa-arrow-right"></i></button></a>
                                        <?php endif; ?>
                                    <?php else: ?>
                                         <a href="<?= base_url()."subscription/index/".$package_month_value->ci_sp_id ?>"<button type="submit" class="w-100 btn btn-lg">Get-started <i class="fa fa-arrow-right"></i></button></a>
                                    <?php endif; ?>
                                 </div>
                              </div>
                            </div>
                          </div>
                         <?php endforeach; ?>
                      <?php endif; ?>
                    </div>
                </form>
                <form method="POST" action="<?= base_url()."subscription" ?>" enctype="multipart/form-data">
                    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center year" id="year">
                      <?php if(!empty($subcription_package_year)): ?> 
                       <?php foreach($subcription_package_year as $package_year_key => $package_year_value): ?>
                        <?php $sql ="SELECT * FROM subscription_description WHERE subscription_id =".$package_year_value->ci_sp_id; 
                                $query=$this->db->query($sql);
                                $result_year=$query->result_array();
                        ?>
                          <div class="col">
                            <div class="card mb-4 rounded-3 shadow-sm">
                              <div class="card-header py-3">
                                <h4 class="my-0 fw-normal"><?= $package_year_value->ci_sp_title ?></h4>
                              </div>
                              <div class="card-body">
                                <h1 class="card-title pricing-card-title">&#8377;<?= $package_year_value->ci_sp_amount ?><small class="text-muted fw-light">/mo</small></h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                  <?php foreach($result_year as $key_year => $data_year): ?>
                                    <li><?=  $data_year['description'] ?></li>
                                  <?php endforeach; ?>
                                </ul>
        
                                <div class="pricing-button">
                                    <?php if(!empty(user_detail())): ?>
                                    <?php   
                                        $pkgsql  ="SELECT * FROM ci_purchase_membership WHERE tpm_active_status='1' AND tpm_plan_id =".$package_year_value->ci_sp_id. " AND tpm_user_id =".user_detail()->customer_id . " ORDER BY tpm_plan_id"; 
                                        $pkgquery=$this->db->query($pkgsql);
                                        $pkgresult  =$pkgquery->result_array();
                                      ?>
                                        <?if(!empty($pkgresult)): ?>
                                          <a href="javascript:"<button type="button" class="w-100 btn btn-lg">Active <i class="fa fa-arrow-right"></i></button></a>
                                        <?php endif; ?>
                                        <?if(empty($pkgresult)): ?>
                                          <a href="<?= base_url()."subscription/index/".$package_year_value->ci_sp_id ?>"<button type="submit" class="w-100 btn btn-lg">Get-started <i class="fa fa-arrow-right"></i></button></a>
                                        <?php endif; ?>
                                    <?php else: ?>
                                         <a href="<?= base_url()."subscription/index/".$package_year_value->ci_sp_id ?>"<button type="submit" class="w-100 btn btn-lg">Get-started <i class="fa fa-arrow-right"></i></button></a>
                                    <?php endif; ?>
                                 </div>
                              </div>
                            </div>
                          </div>
                         <?php endforeach; ?>
                      <?php endif; ?>
                    </div>
                </form>
                <div class="col-12 text-center">
                     <h1 class="display-4 fw-normal">Compare plans</h1>
                </div>
                <div class="col-12 mt-4 Compare-table">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th style="width: 34%;"></th>
                            <th style="width: 22%;">Basic</th>
                            <th style="width: 22%;">Professional</th>
                            <th style="width: 22%;">Enterprise</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row" class="text-start">Graphic on daily basis</th>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                          </tr>
                          <tr>
                            <th scope="row" class="text-start">Broadcasting</th>
                            <td></td>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                          </tr>
                        </tbody>

                        <tbody>
                          <tr>
                            <th scope="row" class="text-start">Brand Consultation</th>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                          </tr>
                          <tr>
                            <th scope="row" class="text-start">Brand Building</th>
                            <td></td>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                          </tr>
                          <tr>
                            <th scope="row" class="text-start">Unlimited members</th>
                            <td></td>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                          </tr>
                          <tr>
                            <th scope="row" class="text-start">Extra security</th>
                            <td></td>
                            <td></td>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    
    
   
</section>
<!--- pricing section end -->
<?php include('common-file/_footer.php'); ?>

<script type="text/javascript">

        $(document).ready(function() {
            $("#year").hide();
            $('#toggle').click(function() {
                if($("#toggle").prop('checked') == true){
                    $("#year").show();
                    $("#month").hide();
           
                }
                
                if($("#toggle").prop('checked') == false){
                    $("#month").show();
                    $("#year").hide();
                }
             
            })
        });
    
       
    
</script>