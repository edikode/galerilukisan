<section id="subintro">
    <div class="jumbotron subhead" id="overview">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="centered">
              <h3>Hubungi Kami</h3>
              <p>
                Terdapat kontak, alamat, email pengelola galeri
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
            <li class="active">Hubungi Kami</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section id="maincontent">
    <div class="container">
      <div class="row">
        <div class="span4">
          <aside>
            <div class="widget">
              <h4>Kontak Kami</h4>
              <ul>
                <li><label><strong>Telephone : </strong></label>
                  <p>
                    <?php echo $profil->telepon; ?>
                  </p>
                </li>
                <li><label><strong>Email : </strong></label>
                  <p>
                    <?php echo $profil->email; ?>
                  </p>
                </li>
                <li><label><strong>Facebook : </strong></label>
                  <p>
                   <a href="https://www.facebook.com/wieto.painter.9" target="_blank"><?php echo $profil->facebook; ?></a>
                  </p>
                </li>
                <li><label><strong>Alamat : </strong></label>
                  <p>
                    <?php echo $profil->alamat; ?>
                  </p>
                </li>
              </ul>
            </div>
            <div class="widget">
              <h4>Social network</h4>
              <ul class="social-links">
                <li><a href="https://www.facebook.com/wieto.painter.9" target="_blank" title="Facebook"><i class="icon-rounded icon-32 icon-facebook"></i></a></li>
                <!-- <li><a href="#" title="Google plus"><i class="icon-rounded icon-32 icon-google-plus"></i></a></li> -->
              </ul>
            </div>
          </aside>
        </div>
        <div class="span8">
          <?php echo $profil->teks; ?>
        </div>
      </div>
    </div>
  </section>