<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="span4">  
        <img src="<?php echo base_url('upload/profil/'.$profil->gambar); ?>">
      </div>
      <div class="span4">
        <div class="widget">
          <h5>Edukasi</h5>
          <ul class="regular">
            <?php foreach ($artikel as $artikel): ?>
              <li><a href="<?php echo site_url('artikel/detail/'.$artikel->link) ?>"><?php echo $artikel->nama; ?></a></li>
            <?php endforeach ?>
          </ul>
        </div>
      </div>
      <div class="span4">
        <div class="widget">
          <h5>Kontak kami</h5>
          
          <address>
            <strong><?php echo $profil->alamat; ?></strong><br>
            <abbr title="Telepon">Telepon:</abbr> <?php echo $profil->telepon; ?>
          </address>
        </div>   
      </div>
    </div>
  </div>
  <div class="verybottom">
    <div class="container">
      <div class="row">
        <div class="span6">
          <p>
            &copy; LukisanStore - All right reserved
          </p>
        </div>
        <div class="span6">
          <div class="credits">
            Designed by <a href="#">Developer</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>