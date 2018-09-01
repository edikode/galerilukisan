<section id="subintro">
  <div class="jumbotron subhead" id="overview">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="centered">
            <h3>Checkout</h3>
            <p>
              Lanjutkan Belanja anda dengan mengisi form dibawah ini
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
          <li class="active">Checkout</li>
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
          <?php  echo form_open('checkout', array('role'=>'form')); ?>
            <?php if(isset($pemesanan->id)){ ?>
              <input type="hidden" name="pemesanan_id" value="<?php echo $pemesanan->id ?>">
            <?php } ?>
            <input type="hidden" name="kategori" value="<?php echo $kategori; ?>">
            <fieldset>
              <legend>Masukkan Alamat Tujuan</legend>
                <div class="span3">
                  <label>Provinsi</label>
                  <select class="browser-default" name="prov" id="prov" required="">
                     <option value="" disabled selected>-- Pilih Provinsi --</option>
                     <?php
                      $curl = curl_init();

                      curl_setopt_array($curl, array(
                        CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "GET",
                        CURLOPT_HTTPHEADER => array(
                          "key: 7df3af2c30f429201b702d80a6ce5ae2"
                        ),
                      ));

                      $response = curl_exec($curl);
                      $err = curl_error($curl);

                      curl_close($curl);

                      if ($err) {
                        echo "cURL Error #:" . $err;
                      } else {
                        $data = json_decode($response, TRUE);

                        for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
                           echo '<option value="'.$data['rajaongkir']['results'][$i]['province_id'].','.$data['rajaongkir']['results'][$i]['province'].'">'.$data['rajaongkir']['results'][$i]['province'].'</option>';
                        }
                      }
                    ?>
                  </select>
                  <label for="alamat">Alamat</label>
                  <input type="text" id="alamat" name="alamat" value="" required="">
                  <label>Pilih Kurir</label>
                  <select class="browser-default" name="kurir" id="kurir" required="">
                    <option value="" disabled selected>Pilih Kurir</option>
                    <option value="pos">POS</option>
                    <option value="jne">JNE</option>
                  </select>
                  <label>Ongkos Kirim</label>
                  <input type="number" name="ongkir" value="0" id="ongkir"  readonly="readonly" style="color:black">
                </div>
                <div class="span3">
                  <label>Pilih Kota / Kabupaten</label>
                  <select name="kota" class="browser-default" id="kota" required="">
                     <option value="" disabled selected>-- Kota / Kabupaten --</option>
                  </select>
                  <label for="kd_pos">Kode Pos</label>
                  <input type="text" id="kode_pos" name="kode_pos" value="" required="">
                  <label>Pilih Layanan</label>
                  <select class="browser-default" name="layanan" id="layanan" required="">
                     <option value="" disabled selected>Pilih Layanan</option>
                  </select>
                  <br><br>
                  <?php if(isset($pemesanan->id)){ ?>
                      <b>  <input type="number" name="total" value="<?php echo $pemesanan->harga; ?>" id="total"  readonly="readonly" style="color:black;">
                      <label>Total Biaya</label></b>
                  <?php } else { ?>
                      <b>  <input type="number" name="total" value="<?= $this->cart->total(); ?>" id="total"  readonly="readonly" style="color:black;">
                      <label>Total Biaya</label></b>
                  <?php } ?>
                </div>

                <div class="span6">
                  <hr>
                  <button type="submit" name="submit" value="Submit" class="btn btn-primary">Simpan</button>
                  <a href="<?php echo site_url('beli/detail_keranjang') ?>" name="simpan" class="btn btn-danger">Kembali</a>
                </div>
            </fieldset>
          <?php echo form_close(); ?>
        
      </div>
    </div>
  </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">

   $(document).ready(function() {
   <?php if($this->uri->segment(2) == 'checkout' || $this->uri->segment(2) == 'Checkout') { ?>

     $('#prov').change(function() {
        var prov = $('#prov').val();
        var province = prov.split(',');

        $.ajax({
           url: "<?=base_url();?>checkout/city",
           method: "GET",
           data: { prov : province[0] },
           success: function(obj) {
              $('#kota').html(obj);
           }
        });
     });

     

     $('#kota').change(function() {
        var kota = $('#kota').val();
        var dest = kota.split(',');
        var kurir = $('#kurir').val()

        $.ajax({
           url: "<?=base_url();?>checkout/getcost<?php if(isset($pemesanan->id)){ echo "/".$pemesanan->id; } else { echo "/salah"; } ?>",
           method: "GET",
           data: {'dest':dest[0],'kurir':kurir},
           success: function(obj) {
              $('#layanan').html(obj);
           }
        });
     });

     $('#kurir').change(function() {
        var kota = $('#kota').val();
        var dest = kota.split(',');
        var kurir = $('#kurir').val()

        $.ajax({
           url: "<?=base_url();?>checkout/getcost<?php if(isset($pemesanan->id)){ echo "/".$pemesanan->id; } else { echo "/salah"; } ?>",
           method: "GET",
           data: {'dest':dest[0],'kurir':kurir},
           success: function(obj) {
              $('#layanan').html(obj);
           }
        });
     });

     $('#layanan').change(function() {
        var layanan = $('#layanan').val();

        $.ajax({
           url: "<?=base_url();?>checkout/cost<?php if(isset($pemesanan->id)){ echo "/".$pemesanan->id; } else { echo "/salah"; } ?>",
           method: "GET",
           data: {'layanan':layanan },
           success: function(obj) {
              var hasil = obj.split(",");

              $('#ongkir').val(hasil[0]);
              $('#total').val(hasil[1]);
           }
        });
     });

     <?php } ?>

   });

</script>