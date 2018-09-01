<header>
  <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <!-- logo -->
        <a class="brand logo" href="index.html"><img src="<?php echo base_url('assets/front/img/lo.png') ?>" alt="" width="100px"></a>
        <!-- end logo -->
        <!-- top menu -->
        <div class="navigation">
          <nav>
            <ul class="nav topnav">
              <li class="<?php if($this->uri->segment(1) == ""){ echo "dropdown active"; } else{ echo ""; } ?>">
                <a href="<?php echo base_url(); ?>">Home</a>
              </li>
              <li class="<?php if($this->uri->segment(1) == "tentang"){ echo "dropdown active"; } ?>">
                <a href="<?php echo base_url('tentang'); ?>">Tentang Kami</a>
              </li>
              <li class="<?php if($this->uri->segment(1) == "produk"){ echo "dropdown active"; } ?>">
                <a href="<?php echo base_url('produk/index/semua-kategori'); ?>">Produk</a>
              </li>
              <li class="<?php if($this->uri->segment(1) == "pesan"){ echo "dropdown active"; } ?>">
                <a href="<?php echo base_url('pesan/info'); ?>">Pesan</a>
              </li>
              <li class="<?php if($this->uri->segment(1) == "artikel" || $this->uri->segment(2) == "video"){ echo "dropdown active"; } ?>">
                <a href="<?php echo base_url('artikel'); ?>">Edukasi</a>
              </li>
              <li class="<?php if($this->uri->segment(1) == "hubungi"){ echo "dropdown active"; } ?>">
                <a href="<?php echo base_url('hubungi'); ?>">Hubungi Kami</a>
              </li>

              <!-- Jika pembeli login maka menu tambahan yang tampil -->
              <?php if($this->ion_auth->logged_in() && !$this->ion_auth->is_admin()) { ?>

              <li class="<?php if($this->uri->segment(1) == "pembayaran"){ echo "dropdown active"; } ?>">
                <a href="<?php echo base_url('pembayaran'); ?>">Pembayaran</a>
              </li>

              <li class="dropdown">
                <a href="#"><i class="icon-shopping-cart"></i> 
                  <?php
                  if ($this->cart->total() > 0) {
                     echo 'Rp. '.number_format($this->cart->total(), 0, ',', '.');
                  } else {
                     echo 'Keranjang Kosong';
                  }
                  ?>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo site_url('beli/detail_keranjang') ?>"><i class="icon-eye-open"></i> Lihat Detail</a></li>
                  <li><a href="<?php echo site_url('beli/hapus_keranjang') ?>"><i class="icon-remove"></i> Kosongkan Keranjang</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#"><i class="icon-user"></i> 
                  <?php 
                  $user = $this->ion_auth->user()->row();
                  echo $user->first_name;
                  ?>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="<?php echo base_url('auth/logout') ?>">Logout</a>
                  </li>
                </ul>
              </li>
              
              <?php } elseif($this->ion_auth->logged_in()) { ?>
              
              <?php } else { ?>
              <li>
                <a href="<?php echo base_url('auth/login') ?>">Login</a>
              </li>
              <?php } ?>
            </ul>
          </nav>
        </div>
        <!-- end menu -->
      </div>
    </div>
  </div>
</header>