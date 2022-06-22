<?php include('common-file/_header.php'); ?>
<style>
   .main-content {
   border-radius: 21px;
   flex-basis: 47%;
   margin: 0 auto;
   border: 2px solid #f413665c;
   /* margin: 23px; */
   width: 80%;
   margin: 0 auto;
   }
   .main-content{
   flex-basis: 47%;
   margin: 0 auto;
   }
   .user-profile{
   display: flex;
   align-items: center;
   }
   .user-profile img {
   width: 55px;
   height: 55px;
   border-radius: 50%;
   margin-right: 10px;
   border: 2px solid #f41366;
   }
   .user-profile p{
   margin-bottom: -5px;
   font-weight: 500;
   color: #626262;
   }
   .user-profile small{
   font-size: 12px;
   }
   .post-container{
   width: 100%;
   background: var(--bg-color);
   border-radius: 6px;
   padding: 20px;
   color: #626262;
   margin: 20px 0;
   }
   .user-profile span{
   font-size: 13px;
   color: #9a9a9a;
   }
   .post-text{
   color: #9a9a9a;
   margin: 15px 0;
   font-size: 15px;
   }
   .post-text span{
   color: #626262;
   font-weight: 500;
   }
   .post-text a{
   color: #1876f2;
   text-decoration: none;
   }
   .post-img{
   width: 100%;
   border-radius: 4px;
   margin-bottom: 5px;
   }
   .post-row{
   display: flex;
   align-items: center;
   justify-content: space-between;
   }
   .post-porfile-icon{
   display: flex;
   align-items: center;
   }
   .post-porfile-icon img{
   width: 20px;
   border-radius: 50%;
   margin-right: 5px;
   }
   .post-row a{
   color: #9a9a9a;
   }
   .user-profile a{
   font-size: 12px;
   color: #1876f2;
   text-decoration: none;
   }
   .cover-img{
   width: 100%;
   border-radius: 6px;
   margin-bottom: 14px;
   }
   .profile-info{
   display: flex;
   align-self: flex-start;
   justify-content: space-between;
   margin-top: 20px;
   }
   .info-col{
   flex-basis: 33%;
   }
   .post-col{
   flex-basis: 65%;
   }
   .profile-intro{
   background: var(--bg-color);
   padding: 20px;
   margin-right: 20px;
   border-radius: 4px;
   }
   .profile-info h3{
   font-weight: 600;
   }
   .intro-text{
   text-align: center;
   margin: 10px 0;
   font-size: 15px;
   }
   .intro-text img{
   width: 15px;
   margin-bottom: -3px;
   }
   .profile-intro hr{
   border: 0;
   height: 1px;
   background: #ccc;
   margin: 24px 0;
   }
   .profile-info ul li{
   list-style: none;
   font-size: 15px;
   margin: 15px 0;
   display: flex;
   align-items: center;
   }
   .profile-info ul li img{
   width: 26px;
   margin-right: 10px;
   }
   .title-box{
   display: flex;
   align-items: center;
   justify-content: space-between;
   }
   .title-box a{
   text-decoration: none;
   color: #1876f2;
   font-size: 14px;
   }
   .photo-box{
   display: grid;
   grid-template-columns: repeat(3, auto);
   grid-gap: 10px;
   margin-top: 15px;
   }
   .photo-box div img{
   width: 100%;
   cursor: pointer;
   }
   .profile-intro p{
   font-size: 14px;
   }
   /*----------------- Media Query For Home Page -----------------*/
   @media (max-width: 900px){
   .main-content{
   flex-basis: 100%;
   }
   .add-post-links a{
   margin-right: 12px;
   font-size: 9px;
   }
   .add-post-links a img{
   width: 16px;
   margin-right: 5px;
   }
   }
   /*----------------------- Media Query For Profile Page------------------------*/
   @media (max-width: 900px){
   .profile-info{
   flex-wrap: wrap;
   }
   .info-col, .post-col{
   flex-basis: 100%;
   }
   }
</style>
<?php $medias = $media->row(); ?>
<div class="container">
   <div style="    margin-top: 20px;"> </div>
   <div class="main-content">
      <div class="post-container">
         <dic class="post-row">
            <div class="user-profile">
               <img src="<?= base_url($medias->customer_image) ?>?v=1.<?= time() ?>">
               <div class="pp-info">
                  <p> Published By <?= $medias->customer_name ?></p>
                  <span><?= date('F D Y',strtotime($medias->schedule_date)) ?> <?= date('h:i a',strtotime($medias->schedule_time)) ?></span>
               </div>
            </div>
         </dic>
         <p class="post-text"><?= $medias->schedule_content ?>
         </p>
         <img src="<?= base_url($medias->schedule_file_path) ?>?v=<?= time() ?>" class="post-img">
         <div class="post-row" style="margin-top:20px;">
            <a href="<?= site_url('single/scheduleedit/'.base64_decode($this->uri->segment('3'))) ?>" class="btn-a-sm" style="border-radius: 14px;">Edit</a>
            <a href="<?= site_url('single/publish/'.$this->uri->segment('3')) ?>" class="btn-a-sm" style="border-radius: 14px;">Publish</a>
            <a href="<?= base_url($medias->schedule_file_path) ?>" style="border-radius: 14px;" download  class="btn-a-sm Download"><i class="fa fa-download mr-1" aria-hidden="true"></i>Download</a>
         </div>
      </div>
   </div>
   <div style="margin-top: 20px;"> </div>
</div>
<?php include('common-file/_footer.php'); ?>