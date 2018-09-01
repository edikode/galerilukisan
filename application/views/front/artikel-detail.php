<section id="subintro">
  <div class="jumbotron subhead" id="overview">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="centered">
            <h3><?php echo $detail_artikel->nama  ?></h3>
            <p>
              Menambah wawasan dengan edukasi tentang seni
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
          <li><a href="<?php echo site_url('artikel'); ?>">Edukasi</a><span class="divider">/</span></li>
          <li class="active"><?php echo $detail_artikel->nama  ?></li>
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
            
            <div class="clearfix">
            </div>
            <div class="row">
              <div class="span2"></div>
              <div class="span8">
                <div class="heading">
                  <h4><?php echo $detail_artikel->nama  ?></h4>
                </div>
                <!-- start article full post -->
                <article class="blog-post">
                  <div class="clearfix">
                  </div>
                  <img src="<?php echo base_url('upload/artikel/'.$detail_artikel->gambar) ?>" alt="" style="width: 100%;">
                  <ul class="post-meta">
                    <li class="first"><i class="icon-calendar"></i><span><?php echo $this->fungsi->tanggal_id($detail_artikel->tanggal); ?></span></li>
                  </ul>
                  <div class="clearfix">
                  </div>
                  <?php 
                  echo $detail_artikel->teks;
                  ?>
                </article>
              </div>
              <div class="span4">
                
              </div>
            </div>
          </article>
        </div>
      </div>
  </div>
</section>
