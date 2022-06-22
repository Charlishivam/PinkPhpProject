<?php include('common-file/_header.php'); ?>
      <div class="Pink-preview common-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-9 mx-auto">
                        <div class="preview-box">
                            <div class="wapper-box">
                                <div class="logo-top-header d-flex align-items-center">
                                    <div class="logo-img mr-3">
                                        <img class="w-100" src="<?= base_url($medias->customer_image) ?>?v=1.<?= time() ?>">
                                    </div>
                                    <div class="content">
                                        <h2 class="top-heading mb-0">Pink7 Technology</h2>
                                        <p class="mb-0">Published by <?= $medias->customer_name ?> .' '. <?= date('F D Y',strtotime($medias->schedule_date)) ?> .' '. <?= date('h:i a',strtotime($medias->schedule_time)) ?></p>
                                    </div>
                                </div>
                                <h5 class="my-4"><?= $medias->schedule_content ?></h5>
                                <!--<h6 class="tag-text">#hindufestival #festival #india #delhi #pink7</h6>-->
                                <div class="img-box">
                                    <img class="w-100" src="<?= base_url($medias->schedule_file_path) ?>?v=<?= time() ?>">
                                </div>
                                <div class="button-box mt-4 text-center">
                                    <div class="common-btn">
                                        
                                        <a href="<?= site_url('single/scheduleedit/'.base64_decode($this->uri->segment('3'))) ?>" class="btn">Edit</a>
                                        <a href="<?= site_url('single/publish/'.$this->uri->segment('3')) ?>" class="btn">Publish</a>
                                        <a href="<?= base_url($medias->schedule_file_path) ?>" class="btn" download ><i class="fa fa-download mr-1" aria-hidden="true"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
<?php include('common-file/_footer.php'); ?>