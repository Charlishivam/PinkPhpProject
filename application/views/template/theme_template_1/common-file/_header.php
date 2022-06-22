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
      <title>Home</title>
      <!-- Required meta tags -->
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"  />
      <meta name="description" content="<?= $description ?>" />
      <meta name="keywords" content="<?= $keywords ?>" />
      <link rel="stylesheet" href="<?= base_url($assets) ?>css/style.css" />
      <link rel="stylesheet" href="<?= base_url($assets) ?>css/bootstrap.min.css" />
      <script src="<?= base_url($assets) ?>js/f665390b3c.js" ></script>
   </head>
  <body onload="myFunction()" style="margin: 0">