<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login - Galeri Cahaya Pelangi</title>
  <link href="<?php echo base_url('/'); ?>assets/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url('/'); ?>assets/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('/'); ?>assets/admin/css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <?php
        if(isset($_view) && $_view){
            $this->load->view($_view);
        } else {
            redirect('admin/dashboard');
        }
    ?>
  </div>
  <script src="<?php echo base_url('/'); ?>assets/admin/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('/'); ?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url('/'); ?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
