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
        <?php echo form_open('pesan','role="form" enctype="multipart/form-data" class="form-horizontal"'); ?>
          
          <fieldset>
            <legend>Silahkan Isi form pemesanan untuk request lukisan</legend>

              <?php echo validation_errors(); ?>
              
              <div class="span3">
                <label for="kategori">Kategori</label>
                <select id="kategori" name="kategori" id="kategori" required="" style="color: black;width: 250px; margin-bottom: 10px">
                    <option value="">Pilih Kategori</option>
                    <?php foreach ($kategori as $k): ?>
                        <option value="<?php echo $k->id ?>"><?php echo $k->nama; ?></option>
                    <?php endforeach ?>
                </select>
                <label for="ukuran">Ukuran</label>
                <select id="ukuran" name="ukuran" id="ukuran" required="" style="color: black;margin-bottom:0px;width: 250px; margin-bottom: 10px">
                    <option value="">Pilih Ukuran</option>
                    <?php foreach ($ukuran as $u): ?>
                        <option value="<?php echo $u->id ?>"><?php echo $u->ukuran; ?></option>
                    <?php endforeach ?>
                </select>
                <label for="harga">Harga Lukisan</label>
                <input type="number" id="harga" name="harga" value="0" required="" placeholder="0" style="width: 250px; margin-bottom: 10px" readonly="readonly" >

                <label for="jumlah">Jumlah Pesan</label>
                <input type="text" id="jumlah" name="jumlah" value="" required="" id="harga" style="width: 250px;" >

                <span class="help-block" style="margin-top:0px;margin-bottom:10px">*Jumlah lukisan yang akan anda pesan</span>
                <label for="keterangan">Keterangan</label>
                <textarea id="keterangan" name="keterangan" rows="6" style=" width: 250px;"><?php echo $this->input->post('keterangan'); ?></textarea>
              </div>
              <div class="span3">
                <label for="keterangan">Upload Contoh Lukisan</label>
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-new thumbnail" style="max-width:334px; max-height:253px;"><img src="<?php echo base_url(); ?>assets/admin/img/400x300.jpg" alt="" class="img-thumbnail"/>
                    </div>
                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 400px; max-height: 300px; line-height: 20px;"></div>
                    <div>
                        <span class="btn btn-file" style="padding: 0px">
                            <span class="fileupload-new btn btn-primary">Pilih Gambar</span>
                            <span class="fileupload-exists btn btn-primary">Ganti</span>
                            <input type="file" name="gambar">
                        </span>
                        <a href="#" class="btn fileupload-exists btn-danger" data-dismiss="fileupload">
                            Hapus
                        </a>
                    </div>
                </div>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">

   $(document).ready(function() {

     $('#kategori').change(function() {
        var kategori = $('#kategori').val();
        var ukuran = $('#ukuran').val();

        $.ajax({
           url: "<?=base_url();?>pesan/cari_harga",
           method: "GET",
           data: {'kategori':kategori,'ukuran':ukuran},
           success: function(obj) {
              $('#harga').val(obj);
           }
        });
     });

     $('#ukuran').change(function() {
        var kategori = $('#kategori').val();
        var ukuran = $('#ukuran').val();

        $.ajax({
           url: "<?=base_url();?>pesan/cari_harga",
           method: "GET",
           data: {'kategori':kategori,'ukuran':ukuran},
           success: function(obj) {
              $('#harga').val(obj);
           }
        });
     });

   });

</script>