<?php 
   if(isset($metadata)){
      $title        = $metadata['title'];
      $description  = $metadata['description'];
      $keywords     = $metadata['keywords'];
   }else{
      $title        = '';
      $description  = '';
      $keywords     = '';
   } 
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!--Basic-->
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title><?= $title ?></title>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
      <meta name="description" content="<?= $description ?>" />
      <meta name="keywords" content="<?= $keywords ?>" />
      <meta name="author" content="Digital Kranti" />
      <!--Load Fonts-->
      <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
         rel="stylesheet">
      <!--Load CSS-->
      <link rel="stylesheet" href="<?= base_url($assets) ?>css/basic.css" />
      <link rel="stylesheet" href="<?= base_url($assets) ?>css/layout.css" />
      <link rel="stylesheet" href="<?= base_url($assets) ?>css/blogs.css" />
      <link rel="stylesheet" href="<?= base_url($assets) ?>css/ionicons.css" />
      <link rel="stylesheet" href="<?= base_url($assets) ?>css/magnific-popup.css" />
      <link rel="stylesheet" href="<?= base_url($assets) ?>css/animate.css" />
      <link rel="stylesheet" href="<?= base_url($assets) ?>css/owl.carousel.css" />
      <!--Background Gradient-->
      <link rel="stylesheet" href="<?= base_url($assets) ?>css/gradient.css" />
      <!--Template New-Skin-->
      <link rel="stylesheet" href="<?= base_url($assets) ?>css/new-skin/new-skin.css" />
      <link rel="stylesheet" href="<?= base_url($assets) ?>css/footer.css" />
      <link rel="stylesheet" href="<?= base_url($assets) ?>css/template-colors/orange.css" />
      <link rel="shortcut icon" href="<?= base_url($assets) ?><?= base_url($assets) ?>images/favicons/favicon.png">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <script>
         function openWhatsapp() {
         	var no = document.getElementById("whatsapp-no").value;
         	window.open("https://api.whatsapp.com/send/?phone=+91" + no + "&text=http://vipdental.meracards.com/");
         }
      </script>
      <style>
         .checked-list {
         display: none;
         }
         .text-span {
         font-size: 13px;
         margin: auto;
         position: absolute;
         height: 44px;
         top: 0;
         bottom: 0;
         text-align: center;
         padding: 0px 10px;
         }
         .image {
         background: url("<?= base_url($assets) ?>"/<?= base_url($assets) ?>images/doct.png) center no-repeat !important;
         background-size: cover;
         overflow: hidden;
         /* border-radius: 120px; */
         }
      </style>
   </head>
   <body>