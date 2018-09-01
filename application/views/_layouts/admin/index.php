<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin - Galeri Cahaya Pelangi</title>
    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url('/'); ?>assets/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('/'); ?>assets/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="<?php echo base_url('/'); ?>assets/admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('/'); ?>assets/admin/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('/'); ?>assets/admin/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css">  
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    
    <?php $this->load->view('_layouts/admin/header'); ?>

    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->

            <?php
			if(isset($_view)){
				$this->load->view($_view);
			} else {
				redirect('admin/dashboard');
			}

			?>

        </div>

        <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>Copyright © 2018</small>
            </div>
        </div>
        </footer>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top"><i class="fa fa-angle-up"></i></a>
        <!-- Logout Modal-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Ingin keluar?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Data session akan hilang sehingga harus login kembali
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                        <a class="btn btn-primary" href="<?php echo site_url('auth/logout') ?>">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="<?php echo base_url('/'); ?>assets/admin/vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url('/'); ?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="<?php echo base_url('/'); ?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Page level plugin JavaScript-->
        <script src="<?php echo base_url('/'); ?>assets/admin/vendor/chart.js/Chart.min.js"></script>
        <script src="<?php echo base_url('/'); ?>assets/admin/vendor/datatables/jquery.dataTables.js"></script>
        <script src="<?php echo base_url('/'); ?>assets/admin/vendor/datatables/dataTables.bootstrap4.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="<?php echo base_url('/'); ?>assets/admin/js/sb-admin.min.js"></script>
        <!-- Custom scripts for this page-->
        <script src="<?php echo base_url('/'); ?>assets/admin/js/sb-admin-datatables.min.js"></script>
        <script src="<?php echo base_url('/'); ?>assets/admin/js/sb-admin-charts.min.js"></script>
        <script src="<?php echo base_url('/'); ?>assets/admin/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>

        <script src="<?php echo base_url('/'); ?>assets/admin/functions/ckeditor/ckeditor.js"></script>


    </div>
</body>
</html>