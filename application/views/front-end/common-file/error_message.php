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