<section id="subintro">
    <div class="jumbotron subhead" id="overview">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="centered">
              <h3>Produk</h3>
              <p>
                Terdapat berbagai kategori lukisan yang tersedia
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
            <li><a href="#">Home</a><span class="divider">/</span></li>
            <li class="active">Produk</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

 <section id="maincontent">
    <div class="container">
      <div class="row">
        <div class="span12">
          <ul class="filter">
            <li><a href="<?php echo site_url('produk/index/semua-kategori'); ?>" class="btn btn-color">Semua Kategori</a></li>
            
            <?php foreach ($kategori as $value) { ?>
              <li><a href="<?php echo site_url('produk/index/'.$value->link); ?>" class="btn btn-color"><?php echo $value->nama; ?></a></li>
            <?php } ?>

          </ul>
        </div>
      </div>
      <div class="row">
        <ul class="portfolio-area da-thumbs">
          <?php foreach ($produk as $value) { ?>
              <li class="portfolio-item2" data-id="id-0" data-type="<?php echo $value->kategori_id ?>">
                <div class="span4">
                  <div class="thumbnail">
                    <div class="image-wrapp">
                      <img src="<?php echo site_url('upload/produk/'.$value->gambar) ?>" alt="<?php echo $value->nama; ?>" title="<?php echo $value->nama; ?>">
                      <article class="da-animate da-slideFromRight" style="display: block;">
                        <h4><?php echo $value->nama; ?></h4>
                        <a href="<?php echo site_url('produk/detail/'.$value->link) ?>"><i class="icon-rounded icon-48 icon-shopping-cart"></i></a>
                        <span><a class="zoom" data-pretty="prettyPhoto" href="<?php echo site_url('upload/produk/'.$value->gambar) ?>">
                            <i class="icon-rounded icon-48 icon-zoom-in"></i>
                          </a>
                        </span>
                      </article>
                    </div>
                  </div>
                </div>
              </li>
          <?php } 
          if(count($produk) == 0){ ?>
            <div class="row">
              <div class="span12">
                <h3 style="margin-left: 30px">Data Masih Kosong</h3>
              </div>
            </div>
          <?php } ?>
        </ul>
      </div>
      <div class="row">
        <div class="span12">
            <?php echo $pagination; ?>
        </div>
      </div>
    </div>
  </section>