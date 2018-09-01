<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Galeri Cahaya Pelangi</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- styles -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700" rel="stylesheet">
  <link href="<?php echo base_url('/'); ?>assets/front/css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo base_url('/'); ?>assets/front/css/bootstrap-responsive.css" rel="stylesheet">
  <link href="<?php echo base_url('/'); ?>assets/front/css/docs.css" rel="stylesheet">
  <link href="<?php echo base_url('/'); ?>assets/front/css/prettyPhoto.css" rel="stylesheet">
  <link href="<?php echo base_url('/'); ?>assets/front/js/google-code-prettify/prettify.css" rel="stylesheet">
  <link href="<?php echo base_url('/'); ?>assets/front/css/flexslider.css" rel="stylesheet">
  <link href="<?php echo base_url('/'); ?>assets/front/css/sequence.css" rel="stylesheet">
  <link href="<?php echo base_url('/'); ?>assets/front/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url('/'); ?>assets/front/color/default.css" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo base_url('/'); ?>assets/front/css/bootstrap-fileupload.min.css"> 

  <!-- fav and touch icons -->
  <link rel="shortcut icon" href="assets/ico/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
</head>

<body>
  
  <?php $this->load->view('_layouts/front/header'); ?>

  <?php
    if(isset($_view) && $_view){
      $this->load->view($_view);
    } else {
      redirect('beranda');
    }

  ?>

  <?php $this->load->view('_layouts/front/footer'); ?>

  <!-- JavaScript Library Files -->
  <script src="<?php echo base_url('/'); ?>assets/front/js/jquery.min.js"></script>
  <script src="<?php echo base_url('/'); ?>assets/front/js/jquery.easing.js"></script>
  <script src="<?php echo base_url('/'); ?>assets/front/js/google-code-prettify/prettify.js"></script>
  <script src="<?php echo base_url('/'); ?>assets/front/js/modernizr.js"></script>
  <script src="<?php echo base_url('/'); ?>assets/front/js/bootstrap.js"></script>
  <script src="<?php echo base_url('/'); ?>assets/front/js/jquery.elastislide.js"></script>
  <script src="<?php echo base_url('/'); ?>assets/front/js/sequence/sequence.jquery-min.js"></script>
  <script src="<?php echo base_url('/'); ?>assets/front/js/sequence/setting.js"></script>
  <script src="<?php echo base_url('/'); ?>assets/front/js/jquery.prettyPhoto.js"></script>
  <script src="<?php echo base_url('/'); ?>assets/front/js/portfolio/jquery.quicksand.js"></script>
  <script src="<?php echo base_url('/'); ?>assets/front/js/portfolio/setting.js"></script>
  <script src="<?php echo base_url('/'); ?>assets/front/js/application.js"></script>
  <script src="<?php echo base_url('/'); ?>assets/front/js/jquery.flexslider.js"></script>
  <script src="<?php echo base_url('/'); ?>assets/front/js/hover/jquery-hover-effect.js"></script>
  <script src="<?php echo base_url('/'); ?>assets/front/js/hover/setting.js"></script>

  <!-- Template Custom JavaScript File -->
  <script src="<?php echo base_url('/'); ?>assets/front/js/custom.js"></script>
  <script src="<?php echo base_url('/'); ?>assets/admin/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>


</body>
</html>
