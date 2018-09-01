<section id="subintro">
  <div class="jumbotron subhead" id="overview">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="centered">
            <h3>Keranjang Belanja</h3>
            <p>
              Lanjutkan Belanja anda dengan menekan tombol selesai belanja
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
          <li class="active">Keranjang Belanja</li>
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
                 <?php echo $profil->facebook; ?> 
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
              <li><a href="#" title="Facebook"><i class="icon-rounded icon-32 icon-facebook"></i></a></li>
              <li><a href="#" title="Google plus"><i class="icon-rounded icon-32 icon-google-plus"></i></a></li>
            </ul>
          </div>
        </aside>
      </div>
      <div class="span8">

        <table class="table table-striped">
          <thead>
            <tr>
              <th>
                #
              </th>
              <th>
                Produk
              </th>
              <th>
                Harga
              </th>
              <th>
                QTY
              </th>
              <th style="text-align: center;">
                Total
              </th>
              <th>
                Opsi
              </th>
            </tr>
          </thead>
          <tbody>
             <?php
             $no = 1;
             foreach($this->cart->contents() as $data){
              ?>
              <tr>
                <td>
                  <?php echo $no++; ?>
                </td>
                <td>
                  <?php echo $data['name']; ?>
                </td>
                <td>
                  <?php echo number_format($data['price'], 0, ',', '.'); ?>
                </td>
                <td>
                  <?php echo $data['qty']; ?>
                </td>
                <td  style="text-align: right;">
                  <?php echo number_format($data['price']*$data['qty'], 0, ',', '.');; ?>
                </td>
                <td>
                  <a href="<?php echo site_url('beli/hapus_data/'.$data['rowid']) ?>" class="btn btn-danger" title="Hapus dari keranjang"><i class="icon-remove"></i></a>
                </td>
              </tr>
            <?php } ?>

              <tr>
                <td colspan="4">Total</td>
                <td style="text-align: right;"><?php echo 'Rp. '.number_format($this->cart->total(), 0, ',', '.'); ?></td>
                <td></td>
              </tr>
          </tbody>
        </table>

        <div class="row">
          <div class="span3">
            <a href="<?php echo site_url('produk') ?>" class="btn btn-warning">Lanjut Belanja</a>
          </div>
          <div class="span5">
            <a href="<?php echo site_url('beli/hapus_keranjang') ?>" class="btn btn-warning" style="float: right;">Kosongkan Belanja</a>
          </div>
          <br><br>
          <div class="span8">
            <a href="<?php echo site_url('beli/checkout') ?>" class="btn btn-warning" style="float: right;">Simpan Belanja</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>