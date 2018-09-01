<section id="subintro">
  <div class="jumbotron subhead" id="overview">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="centered">
            <h3>Pembayaran</h3>
            <p>
              Lakukan Pembayaran agar produk yang anda pesan segera dikirim.
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
          <li class="active">Pembayaran</li>
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
            <h4>Alur Konfirmasi</h4>
            <ul>
              <li><label><strong>Cek Pemesanan : </strong></label>
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
        <ul id="myTab" class="nav nav-tabs">
          <li class="active"><a href="#pemeblian" data-toggle="tab">Pembelian</a></li>
          <li class=""><a href="#pemesanan" data-toggle="tab">Pemesanan</a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
          <div class="tab-pane fade active in" id="pemeblian">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>
                    #
                  </th>
                  <th>
                    Tanggal Beli
                  </th>
                  <th>
                    Tujuan
                  </th>
                  <th style="text-align: center;">
                    Total Biaya
                  </th>
                  <th style="width: 180px;">
                    Status
                  </th>
                  <th>
                    Opsi
                  </th>
                </tr>
              </thead>
              <tbody>
                 <?php
                 $no = 1;
                 foreach($pembelian as $data){
                  ?>
                  <tr>
                    <td>
                      <?php echo $no++; ?>
                    </td>
                    <td>
                      <?php echo $this->fungsi->tanggal_id($data->tanggal); ?>
                    </td>
                    <td>
                      <?php echo $data->alamat; ?><br>
                      <?php echo $data->kabupaten; ?> - <?php echo $data->provinsi; ?>
                    </td>
                    
                    <td  style="text-align: right;">
                      <?php echo number_format($data->total, 0, ',', '.'); ?>
                    </td>
                    <td>
                      <?php 
                      if ($data->status == 3) {
                        echo "<div class='alert'>Menunggu Validasi dari Admin</div>";
                      } else if($data->status == 2){
                        echo "<div class='alert alert-error'>Pembayaran Tidak Valid</div>";
                      } else if($data->status == 1){
                        echo "<div class='alert alert-success'>Data Sukses divalidasi, dan proses pengiriman</div>";
                      } else if($data->status == 0){
                        echo "<div class='alert'>Belum Konfirmasi</div>";
                      }
                      ?>
                    </td>
                    <td>
                      <?php 
                      if ($data->status == 3) { ?>
                        <a class="zoom btn btn-warning btn-block" data-pretty="prettyPhoto" href="<?php echo site_url('upload/konfirmasi/'.$data->gambar) ?>">
                          Lihat Bukti
                        </a>
                      <?php
                      } else if($data->status == 2){
                        echo "<a data-toggle='modal' href='#$data->id' class='btn btn-warning btn-block' title='Upload Pembayaran'>Upload bukti ulang</a>";
                      } else if($data->status == 1){ ?>
                        <a class="zoom btn btn-warning" data-pretty="prettyPhoto" href="<?php echo site_url('upload/konfirmasi/'.$data->gambar) ?>">
                          Lihat Bukti
                        </a>
                      <?php
                      } else if($data->status == 0){
                        echo "<a data-toggle='modal' href='#$data->id' class='btn btn-warning  btn-block' title='Upload Pembayaran'>Upload bukti bayar</a>";
                      }
                      ?>
                      
                    </td>
                  </tr>

                  <div id="<?php echo $data->id ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h3 id="myModalLabel">Upload Bukti Pembayaran</h3>
                    </div>
                    <?php echo form_open('pembayaran/upload_bukti_pembelian/'.$data->id,'role="form" enctype="multipart/form-data" class="form-horizontal"'); ?>
                      <div class="modal-body">
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
                      <div class="modal-footer">
                        <button class="btn" data-dismiss="modal">Batal</button>
                        <button class="btn btn-success" type="submit">Simpan</button>
                      </div>
                    <?php echo form_close(); ?>
                  </div>

                <?php } ?>
              </tbody>
            </table>
          </div>
          <div class="tab-pane fade" id="pemesanan">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>
                    #
                  </th>
                  <th>
                    Tanggal Pesan
                  </th>
                  <th>
                    Tujuan
                  </th>
                  <th style="text-align: center;">
                    Total Biaya
                  </th>
                  <th style="width: 180px;">
                    Status
                  </th>
                  <th>
                    Opsi
                  </th>
                </tr>
              </thead>
              <tbody>
                 <?php
                 $no = 1;
                 foreach($pemesanan as $data){
                  if($data->total == ""){
                    continue;
                  }
                  ?>
                  <tr>
                    <td>
                      <?php echo $no++; ?>
                    </td>
                    <td>
                      <?php echo $this->fungsi->tanggal_id($data->tanggal); ?>
                    </td>
                    <td>
                      <?php echo $data->alamat; ?><br>
                      <?php echo $data->kabupaten; ?> - <?php echo $data->provinsi; ?>
                    </td>
                    
                    <td  style="text-align: right;">
                      <?php echo number_format($data->total, 0, ',', '.'); ?>
                    </td>
                    <td>
                      <?php 
                      if ($data->status == 3) {
                        echo "<div class='alert'>Menunggu Validasi dari Admin</div>";
                      } else if($data->status == 2){
                        echo "<div class='alert alert-error'>Pembayaran Tidak Valid</div>";
                      } else if($data->status == 1){
                        echo "<div class='alert alert-success'>Data Sukses divalidasi, dan proses pengiriman</div>";
                      } else if($data->status == 0){
                        echo "<div class='alert'>Belum Konfirmasi</div>";
                      }
                      ?>
                    </td>
                    <td>
                      <?php 
                      if ($data->status == 3) { ?>
                        <a class="zoom btn btn-warning btn-block" data-pretty="prettyPhoto" href="<?php echo site_url('upload/konfirmasi/'.$data->gambar) ?>">
                          Lihat Bukti
                        </a>
                      <?php
                      } else if($data->status == 2){
                        echo "<a data-toggle='modal' href='#$data->id' class='btn btn-warning btn-block' title='Upload Pembayaran'>Upload bukti ulang</a>";
                      } else if($data->status == 1){ ?>
                        <a class="zoom btn btn-warning" data-pretty="prettyPhoto" href="<?php echo site_url('upload/konfirmasi/'.$data->gambar) ?>">
                          Lihat Bukti
                        </a>
                      <?php
                      } else if($data->status == 0){
                        echo "<a data-toggle='modal' href='#$data->id' class='btn btn-warning  btn-block' title='Upload Pembayaran'>Upload bukti bayar</a>";
                      }
                      ?>
                      
                    </td>
                  </tr>

                  <div id="<?php echo $data->id ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h3 id="myModalLabel">Upload Bukti Pembayaran</h3>
                    </div>
                    <?php echo form_open('pembayaran/upload_bukti_pemesanan/'.$data->id,'role="form" enctype="multipart/form-data" class="form-horizontal"'); ?>
                      <div class="modal-body">
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
                      <div class="modal-footer">
                        <button class="btn" data-dismiss="modal">Batal</button>
                        <button class="btn btn-success" type="submit">Simpan</button>
                      </div>
                    <?php echo form_close(); ?>
                  </div>

                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>