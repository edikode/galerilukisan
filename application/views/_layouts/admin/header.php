<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="<?php echo site_url('admin/dashboard'); ?>">
        Admin Lukisan
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item <?php if($this->uri->segment(2) == 'dashboard') { echo "active"; } ?>" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="<?php echo base_url('admin/dashboard'); ?>">
                <i class="fa fa-fw fa-dashboard"></i>
                <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item <?php //if($this->uri->segment(2) == 'produk' || $this->uri->segment(2) == 'kategori') { echo "active"; } ?>" data-toggle="tooltip" data-placement="right" title="Produk">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#produk" data-parent="#exampleAccordion">
                <i class="fa fa-fw fa-image"></i>
                <span class="nav-link-text">Produk</span>
                </a>
                <ul class="sidenav-second-level collapse" id="produk">
                    <li class="<?php if($this->uri->segment(2) == 'produk') { echo "active"; } ?>">
                        <a href="<?php echo base_url('admin/produk') ?>">Produk</a>
                    </li>
                    <li class="<?php if($this->uri->segment(2) == 'kategori') { echo "active"; } ?>">
                        <a href="<?php echo base_url('admin/kategori') ?>">Kategori Produk</a>
                    </li>
                    <li class="<?php if($this->uri->segment(2) == 'harga') { echo "active"; } ?>">
                        <a href="<?php echo base_url('admin/harga') ?>">Harga</a>
                    </li>
                    <li class="<?php if($this->uri->segment(2) == 'ukuran') { echo "active"; } ?>">
                        <a href="<?php echo base_url('admin/ukuran') ?>">Ukuran</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item <?php if($this->uri->segment(2) == 'pembelian') { echo "active"; } ?>" data-toggle="tooltip" data-placement="right" title="Pembelian">
                <a class="nav-link" href="<?php echo base_url('admin/pembelian') ?>">
                	<i class="fa fa-fw fa-shopping-cart"></i>
                	<span class="nav-link-text">Pembelian</span>
                </a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(2) == 'pemesanan') { echo "active"; } ?>" data-toggle="tooltip" data-placement="right" title="Pemesanan">
                <a class="nav-link" href="<?php echo base_url('admin/pemesanan') ?>">
                    <i class="fa fa-fw fa-shopping-cart"></i>
                    <span class="nav-link-text">Pemesanan</span>
                </a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(2) == 'laporan') { echo "active"; } ?>" data-toggle="tooltip" data-placement="right" title="Laporan">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#laporan" data-parent="#exampleAccordion">
                <i class="fa fa-fw fa-list-alt"></i>
                <span class="nav-link-text">Laporan</span>
                </a>
                <ul class="sidenav-second-level collapse" id="laporan">
                    <li>
                        <a href="<?php echo base_url('admin/laporan_pemesanan') ?>">Laporan Pemesanan</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/laporan_pembelian') ?>">Laporan Pembelian</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/laporan_produk') ?>">Data Produk</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/laporan_stok') ?>">Stok</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item <?php if($this->uri->segment(2) == 'artikel') { echo "active"; } ?>" data-toggle="tooltip" data-placement="right" title="Edukasi">
                <a class="nav-link" href="<?php echo base_url('admin/artikel') ?>">
                    <i class="fa fa-fw fa-image"></i>
                    <span class="nav-link-text">Edukasi</span>
                </a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(2) == 'pembeli') { echo "active"; } ?>" data-toggle="tooltip" data-placement="right" title="Pembeli">
                <a class="nav-link" href="<?php echo base_url('admin/pembeli') ?>">
                    <i class="fa fa-fw fa-users"></i>
                    <span class="nav-link-text">Pembeli</span>
                </a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(2) == 'profil') { echo "active"; } ?>" data-toggle="tooltip" data-placement="right" title="Pengaturan">
                <a class="nav-link" href="<?php echo base_url('admin/profil') ?>">
                	<i class="fa fa-fw fa-user"></i>
                	<span class="nav-link-text">Profil</span>
                </a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(2) == 'user') { echo "active"; } ?>" data-toggle="tooltip" data-placement="right" title="User">
                <a class="nav-link" href="<?php echo base_url('admin/user') ?>">
                    <i class="fa fa-fw fa-user"></i>
                    <span class="nav-link-text">User</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler"><i class="fa fa-fw fa-angle-left"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-fw fa-envelope"></i>
                <span class="d-lg-none">Pemberitahuan <span class="badge badge-pill badge-primary">New</span>
                </span>
                <?php 
                $notif_pembelian = $this->fungsi->pembelian_baru();
                $notif_pemesanan = $this->fungsi->pemesanan_baru();
                if(count($notif_pembelian) != 0 || count($notif_pemesanan) != 0){ ?>
                    <span class="indicator text-primary d-none d-lg-block">
                    <i class="fa fa-fw fa-circle"></i>
                    </span>
                <?php } ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="messagesDropdown">
                    <h6 class="dropdown-header">Pemberitahuan Baru:</h6>
                    <?php foreach ($notif_pembelian as $notif1): ?>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo site_url('admin/pembelian/edit/'.$notif1->id) ?>">
                            <strong><?php echo $this->fungsi->nama_pembeli($notif1->pembeli_id.'-pembeli'); ?></strong>
                            <span class="small float-right text-muted"><?php echo $this->fungsi->tanggal_id($notif1->tanggal); ?></span>
                            <div class="dropdown-message small">
                                <?php echo "Total Pembelian Rp. ".number_format($notif1->total,0,',','.').",-"; ?>
                            </div>
                            </a>
                    <?php endforeach ?>

                    <?php foreach ($notif_pemesanan as $notif2): ?>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo site_url('admin/pemesanan/edit/'.$notif2->id) ?>">
                            <strong><?php echo $this->fungsi->nama_pembeli($notif2->pembeli_id.'-pembeli'); ?></strong>
                            <span class="small float-right text-muted"><?php echo $this->fungsi->tanggal_id($notif2->tanggal); ?></span>
                            <div class="dropdown-message small">
                                <?php echo "Total Pemesanan Rp. ".number_format($notif2->total,0,',','.').",-"; ?>
                            </div>
                            </a>
                    <?php endforeach ?>

                    <?php if(count($notif_pembelian) == 0 && count($notif_pemesanan) == 0){ ?>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item small" href="#">Tidak ada pemberitahuan</a>
                    <?php } else { 
                                if(count($notif_pembelian) == 0){
                                    $link = "pemesanan";
                                } else{
                                    $link = "pembelian";
                                }

                        ?>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item small" href="<?php echo site_url('admin/'.$link) ?>">Lihat Semua Pemberitahuan</a>
                    <?php } ?>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>
        </ul>
    </div>
</nav>