<section id="subintro">
  <div class="jumbotron subhead" id="overview">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="centered">
            <h3>Pesan</h3>
            <p>
              Customer dapat melakukan pemesanan lukisan sesuai dengan permintaan pada halaman ini
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
          <li><a href="<?php echo site_url('/'); ?>">Home</a><span class="divider">/</span></li>
          <li class="active">Pesan</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<div class="container">
  <div class="row">
    <div class="span4">
      <aside>
        <div class="widget">
          <h4>Alur Pemesanan</h4>
          <ul>
            <li><label><strong>Buat Pemesanan : </strong></label>
              <p align="justify">
                Proses konfirmasi harus segera dilakukan maksimal 1 hari setelah pemesanan. pertama cek data pemesanan anda pada email yang telah kami kirimkan ke email anda
              </p>
            </li>
            <li><label><strong>Transfer : </strong></label>
              <p align="justify">
                Setelah anda memeriksa data pemesanan sesuai, silahkan transfer biaya sejumlah yang tertera pada email anda.
              </p>
            </li>
            <li><label><strong>Upload Bukti Transfer : </strong></label>
              <p align="justify">
                Lakukan Konfirmasi pembayaran dengan mengupload bukti pembayaran pada menu pembayaran anda. dan pilih sesuai tanggal pemesanan anda
              </p>
            </li>
            <li><label><strong>Tunggu Proses Verifikasi : </strong></label>
              <p align="justify">
                Setelah anda melakukan upload bukti pembayaran, langkah selanjutnya adalah menunggu proses verifikasi dari admin. jika pembayaran anda dianggap valid, maka produk akan dikirim melalui kurir yang telah anda pilih. Namun jika konfirmasi anda tidak sesuai, status pada menu pembayaran anda akan berwarna merah dan anda harus mengupload bukti pembayaran ulang sampai data benar dianggap valid oleh admin.
              </p>
            </li>
          </ul>
        </div>
      </aside>
    </div>
    <div class="span8">
        <p style="font-size: 20px" align="justify">
          Apakah anda ingin pesan lukisan diwebsite kami ?
          <br><br>
          Ikuti langkah berikut ini !
          <br><br>
        </p>
        <div class="row">
            <div class="span8">
              <div class="well">
                <div class="centered">
                  <a href="<?php echo site_url('user/daftar') ?>" style="text-decoration: none">
                    <i class="icon-circled icon-64 icon-signout active"></i>
                    <h4>Register</h4>
                  </a>
                  <div class="dotted_line">
                  </div>
                  <p>
                    Anda harus melakukan Registrasi menjadi member untuk melakukan pemesanan lukisan pada website ini.
                  </p>
                </div>
              </div>
            </div>
            <div class="span8">
              <div class="well">
                <div class="centered">
                  <a href="<?php echo site_url('auth/login') ?>" style="text-decoration: none">
                    <i class="icon-circled icon-64 icon-signout active"></i>
                    <h4>Login</h4>
                  </a>
                  <div class="dotted_line">
                  </div>
                  <p>
                    Setelah anda meyelesaikan proses Registrasi dan akun anda sudah teraktivasi, langkah selanjutnya adalah login kedalam sistem.
                  </p>
                </div>
              </div>
            </div>
            <div class="span8">
              <div class="well">
                <div class="centered">
                  <a href="<?php echo site_url('auth/login') ?>" style="text-decoration: none">
                    <i class="icon-circled icon-64 icon-signin active"></i>
                    <h4>Lakukan Pemesanan</h4>
                  </a>
                  <div class="dotted_line">
                  </div>
                  <p>
                    Ketika sudah login, akan muncul form pemesanan untuk melakukan pemesanan lukisan. Anda dapat mengisi detail lukisan yang anda pesan melalui form tersebut.
                  </p>
                </div>
              </div>
            </div>
        </div>
        

    </div>
  </div>
</div>
