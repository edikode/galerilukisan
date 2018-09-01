<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo site_url('admin/dashboard') ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">My Dashboard</li>
</ol>
<!-- Icon Cards-->


<div class="row">
    <div class="col-md-4 col-sm-6 mb-3">
        <div class="card text-white bg-primary o-hidden h-100" style="min-height: 150px">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5"><?php echo $pembelian; ?> Pembelian Baru!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('admin/transaksi') ?>">
            <span class="float-left">Lihat Semua</span>
            <span class="float-right">
            <i class="fa fa-angle-right"></i>
            </span>
            </a>
        </div>
    </div>
    <div class="col-md-4 col-sm-6 mb-3">
        <div class="card text-white bg-warning o-hidden h-100" style="min-height: 150px">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-list"></i>
                </div>
                <div class="mr-5"><?php echo $pemesanan; ?> Pemesanan Baru!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('admin/pemesanan') ?>">
            <span class="float-left">Lihat Semua</span>
            <span class="float-right">
            <i class="fa fa-angle-right"></i>
            </span>
            </a>
        </div>
    </div>
    <div class="col-md-4 col-sm-6 mb-3">
        <div class="card text-white bg-danger o-hidden h-100" style="min-height: 150px">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-user"></i>
                </div>
                <div class="mr-5"><?php echo $pembeli; ?> Member terdaftar!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('admin/pembeli') ?>">
            <span class="float-left">Lihat Semua</span>
            <span class="float-right">
            <i class="fa fa-angle-right"></i>
            </span>
            </a>
        </div>
    </div>
</div>

<br><br>
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Pemesanan Terbaru
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="no">No</th>
                        <th>Nama</th>
                        <th>Tujuan</th>
                        <th>Total</th>
                        <th width="150px">Status</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    foreach($data_pemesanan as $p){
                        if($p->total == ""){
                            continue;
                        }
                        ?>
                        <tr>
                            <td class="no"><?php echo $no++; ?></td>
                            <td>
                                <?php
                                $pembeli = $this->User_model->detail_data($p->pembeli_id);
                                echo $pembeli->first_name;
                                ?>
                            </td>
                            <td><?php echo $p->alamat; ?><br><?php echo $p->kabupaten; ?>-<?php echo $p->provinsi; ?></td>
                            <td align="right"><?php echo number_format($p->total, 0, ',', '.'); ?></td>
                            <td>
                                <?php 
                                if ($p->status == 3) {
                                    echo "<div class='alert alert-warning'>Menunggu Validasi dari Admin</div>";
                                } else if($p->status == 2){
                                    echo "<div class='alert alert-danger'>Pembayaran Tidak Valid</div>";
                                } else if($p->status == 1){
                                    echo "<div class='alert alert-success'>Data Sukses divalidasi, dan proses pengiriman</div>";
                                } else if($p->status == 0){
                                    echo "<div class='alert alert-danger'>Belum Konfirmasi</div>";
                                }
                                ?>
                            </td>
                        </tr>

                    <?php } ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
