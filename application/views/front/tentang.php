<section id="subintro">
  <div class="jumbotron subhead" id="overview">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="centered">
            <h3>Tentang <?php echo $profil->nama; ?></h3>
            <p>
              Sekilas Tentang Kami dapat anda ketahui dibawah ini.
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
          <li class="active">Tentang Kami</li>
        </ul>
      </div>
    </div>
  </div>
</section>
<section id="maincontent">
  <div class="container">
    <div class="row">
      <?php if($profil->gambar != ""){ ?>

        <div class="span7">
          <h4><?php echo $profil->nama; ?></h4>
          <?php echo $profil->teks; ?>
        </div>
        <div class="span5">
          <img src="upload/profil/<?php echo $profil->gambar ?>" class="img-responsive">
        </div>

      <?php } else { ?>

      <div class="span12">
        <h4><?php echo $profil->nama; ?></h4>
        <?php echo $profil->teks; ?>
      </div>

      <?php } ?>
    </div>
  </div>
</section>