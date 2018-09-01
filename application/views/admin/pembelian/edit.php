<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url('admin') ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Pembelian</li>
</ol>

<div class="row">
    <div class="col-md-12">
        <h2 class="page-header" style="display: initial;">Detail Pembelian</h2>
        <!-- <a href="<?php //echo base_url('admin/produk/tambah') ?>" class="btn btn-success" style="float: right;">Tambah Data</a> -->
    </div>
</div>
<hr>
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Detail Pembelian Invoice : <?php echo $pembelian->invoice; ?>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <h5>Data Pelanggan</h5>
                <strong>
                    <?php
                    $pembeli = $this->User_model->detail_data($pembelian->pembeli_id);
                    echo $pembeli->first_name;
                    ?>
                </strong>
                <br>
                <p>
                    Telepon: <?php echo $pembeli->phone; ?> <br>
                    Email:  <?php echo $pembeli->email; ?>
                </p>
            </div>
            
            <div class="col-md-4">
                <h5>Data Pelanggan</h5>
                <strong>
                    Invoice #<?php echo $pembelian->invoice; ?>
                </strong> <br>
               
                <strong>
                    Tanggal Pembelian:
                </strong>
                <?php echo $pembelian->tanggal; ?> <br>

                <strong>
                    Status:
                </strong>
                <?php 
                    if($pembelian->status == 0){
                        echo "Belum Dikonfirmasi";
                    } else {
                        echo "Sudah Divalidasi";
                    }
                ?>
            
            </div>
            <div class="col-md-4">
                <h5>Alamat Pengiriman</h5>
                <strong>
                    <?php echo $pembelian->alamat; ?>
                </strong>
                <br>
                <p>
                    Provinsi <?php echo $pembelian->provinsi; ?> <br>
                    <?php echo $pembelian->kabupaten.'-'.$pembelian->kode_pos; ?>
                </p>
                <strong>
                    Jasa Ongkir
                </strong>
                <p>
                    <?php echo strtoupper($pembelian->kurir); ?> <br>
                    <?php echo $pembelian->layanan; ?>
                </p>
            </div>
        </div>
        <br><br>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Keterangan</th>
                    <th>Pcs</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no = 1;
                    $detail_pembelian = $this->DetailPembelian_model->detail_pembelian(2);
                    foreach ($detail_pembelian as $detail) {
                ?>
                    <tr>
                        <td>
                            <?php echo $no++; ?>
                        </td>
                        <td>
                            <?php echo $detail->nama; ?>
                        </td>
                        <td>
                            Kategori: 
                            <?php 
                                $kategori = $this->Kategori_model->detail_data($detail->kategori_id); 
                                echo $kategori->nama; ?> <br>
                            Ukuran: 
                            <?php 
                                $ukuran = $this->Ukuran_model->detail_data($detail->ukuran_id); 
                                echo $ukuran->ukuran; ?> Cm<br>
                            Berat:
                            <?php echo $ukuran->berat; ?> Kg
                        </td>
                        <td align="center">
                            <?php echo $detail->jumlah; ?>
                        </td>
                        <td align="right"><?php echo number_format($detail->subtotal, 0, ',', '.'); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <br><br>
        <div  class="row">
            <div class="col-md-8"></div>
            <div class="col-md-4">
                <table class="table table-hover table-bordered">
                    <tr>
                        <td>Ongkir</td>
                        <td align="right"><?php echo number_format($pembelian->ongkir, 0, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td>Total Belanja</td>
                        <td align="right"><?php echo number_format($pembelian->total-$pembelian->ongkir, 0, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td>Total + Ongkir</td>
                        <td align="right"><?php echo number_format($pembelian->total, 0, ',', '.'); ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                
            </div>
            <div class="col-md-4">
                <a data-toggle="modal" data-target="#<?php echo $pembelian->id ?>" title="Validasi admin" class="btn btn-warning">
                    Validasi
                </a>
                <a href="<?php echo base_url('admin/pembelian') ?>"  class="btn btn-danger">Kembali</a>
            </div>            
        </div>
    </div>
</div>

<div class="modal fade" id="<?php echo $pembelian->id ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Bukti Konfirmasi</h4>
      </div>
      <div class="modal-body">
        <?php if($pembelian->gambar != ""){ ?>
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new thumbnail">
                <div class="hapus-gambar">
                    <a data-original-title="Hapus" data-placement="left" class="btn btn-bricky tooltips" href="<?php echo base_url('admin/konfirmasi/hapusgambar/'.$pembelian->id) ?>" onclick="return hapusgambar()">
                        <i class="icon-remove icon-white"></i>
                    </a>
                </div>
                <img src="<?php echo base_url('upload/konfirmasi/'.$pembelian->gambar) ?>">
            </div>                                      
        </div>
        <?php } else { ?>
        <h2>Pelanggan belum melakukan konfirmasi pembayaran</h2>
        <?php } ?>
      </div>
      <div class="modal-footer">
        <?php if ($pembelian->status == 3): ?>
            <a href="<?php echo site_url('admin/pembelian/validasi/'.$pembelian->id) ?>" class="btn btn-success pull-left">Validasi</a>
            <a href="<?php echo site_url('admin/pembelian/nonvalidasi/'.$pembelian->id) ?>" class="btn btn-danger">Tidak Valid</a>
        <?php endif ?>
      </div>
    </div>
  </div>
</div>