    <?php if(!empty($greeting_data)): ?>
        <?php foreach($greeting_data as $greetingdata_key => $greetingdata_value): ?>
             <div class="mItem" style="margin-bottom: 0px !important;">
                 <a href="<?= site_url('single/'.base64_encode($greetingdata_value->greeting_id)) ?>">
                    <img src="<?= base_url('uploads/greeting').'/'.$greetingdata_value->greeting_image ?>"  alt="" />
                  </a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
    
    
    
    
       <div class="mItem" style="margin-bottom: 0px !important;">
                   <h2 class="card-title">Image Not available</h2>
                   <p class="card-text">This Category Image is not available.</p>
        </div>
    <?php endif; ?>
