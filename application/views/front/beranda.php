  <section id="intro">
    <div class="jumbotron masthead">
      <div class="container">
        <!-- slider navigation -->
        <div class="sequence-nav">
          <div class="prev">
            <span></span>
          </div>
          <div class="next">
            <span></span>
          </div>
        </div>
        <!-- end slider navigation -->
        <div class="row">
          <div class="span12">
            <div id="slider_holder">
              <div id="sequence">
                <ul>
                  <!-- Layer 1 -->
                  <li>
                    <div class="info animate-in">
                      <h2>Selamat Datang</h2>
                      <br>
                      <h3>di website galeri cahaya pelangi</h3>
                      <i><h1>KREATIF, INOVATIF DAN INSPIRATIF</h1></i>
                    </div>
                    <img class="slider_img animate-in" src="<?php echo base_url('/'); ?>assets/front/img/slides/sequence/img1.jpg" alt="">
                  </li>
                  <!-- Layer 2 -->
                  <li>
                    <div class="info">
                      <h2>Belanja Puas Harga Ok</h2>
                      <br>
                      <h3>Anda puas kami senang</h3>
                      <i><h1>GAK BIKIN KANTONG JEBOL</h1></i>
                    </div>
                    <img class="slider_img" src="<?php echo base_url('/'); ?>assets/front/img/slides/sequence/img2.jpg" alt="">
                  </li>
                  <!-- Layer 3 -->
                  <li>
                    <div class="info">
                      <h2>Tuangkan Inspirasimu</h2>
                      <br>
                      <h3>Bersama Kami</h3>
                      <i><h1>PILIH KATEGORI YANG KAMU SUKA!</h1></i>
                    </div>
                    <img class="slider_img" src="<?php echo base_url('/'); ?>assets/front/img/slides/sequence/img3.jpg" alt="">
                  </li>
                </ul>
              </div>
            </div>
            <!-- Sequence Slider::END-->
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="maincontent">
    <div class="container">
      <!-- <div class="row">
        <div class="span3 features">
          <i class="icon-circled icon-32 icon-suitcase left active"></i>
          <h4>Responsive bootstrap</h4>
          <div class="dotted_line">
          </div>
          <p class="left">
            Dolorem adipiscing definiebas ut nec. Dolore consectetuer eu vim, elit molestie ei has, petentium imperdiet in pri mel virtute nam.
          </p>
          <a href="#">Learn more</a>
        </div>
        <div class="span3 features">
          <i class="icon-circled icon-32 icon-plane left"></i>
          <h4>Lot of features</h4>
          <div class="dotted_line">
          </div>
          <p class="left">
            Dolorem adipiscing definiebas ut nec. Dolore consectetuer eu vim, elit molestie ei has, petentium imperdiet in pri mel virtute nam.
          </p>
          <a href="#">Learn more</a>
        </div>
        <div class="span3 features">
          <i class="icon-circled icon-32 icon-leaf left"></i>
          <h4>Multipurpose template</h4>
          <div class="dotted_line">
          </div>
          <p class="left">
            Dolorem adipiscing definiebas ut nec. Dolore consectetuer eu vim, elit molestie ei has, petentium imperdiet in pri mel virtute nam.
          </p>
          <a href="#">Learn more</a>
        </div>
        <div class="span3 features">
          <i class="icon-circled icon-32 icon-wrench left"></i>
          <h4>With latest technology</h4>
          <div class="dotted_line">
          </div>
          <p class="left">
            Dolorem adipiscing definiebas ut nec. Dolore consectetuer eu vim, elit molestie ei has, petentium imperdiet in pri mel virtute nam.
          </p>
          <a href="#">Learn more</a>
        </div>
      </div> -->
      <div class="row">
        <div class="span12">
          <div class="tagline centered">
            <div class="row">
              <div class="span12">
                <div class="tagline_text">
                  <h2>Lihat Koleksi Terbaru Kami hanya di LukisanStore</h2>
                  <p>
                    Mengabadikan tempat, perasaan, dan kebahagiaan dalam sebuah karya seni lukis. Selamat datang dan selamat berbelanja.
                  </p>
                </div>
                <div class="btn-toolbar cta">
                  <a class="btn btn-large btn-color" href="<?php echo site_url('tentang'); ?>">
                    <i class="icon-home icon-white"></i> Tentang Kami </a>
                  <a class="btn btn-large btn-inverse" href="<?php echo site_url('produk'); ?>">
                    <i class="icon-shopping-cart icon-white"></i> Beli Produk Kami </a>
                </div>
              </div>
            </div>
          </div>
          <!-- end tagline -->
        </div>
      </div>
      <div class="row">
        <div class="home-posts">
          <div class="span12">
            <h3>Produk Terbaru Kami</h3>
          </div>
          <?php foreach ($produk as $produk) { ?>
          <div class="span4">
            <div class="post-image">
              <a href="<?php echo site_url('produk/detail/'.$produk->link) ?>">
                <img src="<?php echo base_url('upload/produk/'.$produk->gambar) ?>" alt="<?php echo $produk->nama ?>">
              </a>
            </div>
            <div class="entry-meta">
              <!-- <a href="#"><i class="icon-square icon-48 icon-eye-open left"></i></a> -->
              <span class="date"><?php echo $this->fungsi->tanggal_id($produk->tanggal); ?></span>
            </div>
            <!-- end .entry-meta -->
            <div class="entry-body">
              <a href="<?php echo site_url('produk/detail/'.$produk->link) ?>">
                <h5 class="title"><?php echo $produk->nama; ?></h5>
              </a>
              <p>
                <?php echo $produk->teks; ?>
              </p>
            </div>
            <div class="clear">
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
