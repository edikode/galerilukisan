<section id="subintro">
  <div class="jumbotron subhead" id="overview">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="centered">
            <h3><?php echo $produk->nama  ?></h3>
            <p>
              Detail produk kami, mengutamakan kualitas dan keindahan Lukisan
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="breadcrumb">
  <div class="container">
    <div class="row">
      <div class="span12">
        <ul class="breadcrumb notop">
          <li><a href="<?php echo site_url(); ?>">Home</a><span class="divider">/</span></li>
          <li><a href="<?php echo site_url('produk'); ?>">Produk</a><span class="divider">/</span></li>
          <li class="active"><?php echo $produk->nama  ?></li>
        </ul>
      </div>
    </div>
  </div>
</section>
<section id="maincontent">
  <div class="container">
    <div class="row">
        <div class="span12">
          <article>
            <div class="heading">
              <h4><?php echo $produk->nama  ?></h4>
            </div>
            <div class="clearfix">
            </div>
            <div class="row">
              <div class="span8">

                <!-- start flexslider -->
                <div class="flexslider">
                  <ul class="slides">
                    <li class="" style="width: 100%; float: left; margin-right: -100%; position: relative; display: none;">
                      <img src="<?php echo site_url('upload/produk/'.$produk->gambar) ?>" alt="<?php echo $produk->nama  ?>">
                    </li>
                  </ul>
                <ol class="flex-control-nav flex-control-paging"><li><a class="">1</a></li></ol><ul class="flex-direction-nav"><li><a class="flex-prev" href="#">Previous</a></li><li><a class="flex-next" href="#">Next</a></li></ul></div>
                <!-- end flexslider -->

                <?php echo $produk->teks  ?>
              </div>
              <div class="span4">
                <div class="project-widget">
                  <h4><i class="icon-48 icon-beaker"></i> Produk info</h4>
                  <ul class="project-detail">
                    <li>
                      <label>Nama Produk :</label> 
                      <?php echo $produk->nama  ?></li>
                    <li>
                      <label>Kategori :</label> 
                      <?php echo $produk->kategori  ?></li>
                    <li>
                      <label>Ukuran :</label> 
                      <?php 
                        $ukuran = $this->Ukuran_model->detail_data($produk->ukuran_id); 
                        echo $ukuran->ukuran; 
                      ?> Cm
                    </li>
                    <li>
                      <label>Berat :</label> 
                      <?php echo $ukuran->berat; ?> Kg</li>
                    <li>
                      <label>Harga :</label> 
                      Rp. 
                      <?php 
                        $cari_harga = $this->Harga_model->cari_harga($ukuran->id,$produk->kategori_id); 
                        echo number_format($cari_harga->harga, 0, ',', '.'); 
                      ?>,-
                    </li>
                    <li>
                      <label>Tanggal Buat :</label> 
                      <?php echo $this->fungsi->tanggal_id($produk->tanggal); ?></li>
                  </ul>
                  <a href="<?php echo site_url('beli/masuk_keranjang/'.$produk->link) ?>" class="btn btn-large btn-block btn-warning" type="button">Beli Sekarang</a>
                  <br>
                </div>
              </div>
            </div>
          </article>
        </div>
      </div>
  </div>
</section>
