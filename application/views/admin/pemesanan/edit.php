<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url('admin') ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Pemesanan</li>
</ol>

<div class="row">
    <div class="col-md-12">
        <h2 class="page-header" style="display: initial;">Detail Pemesanan</h2>
        <!-- <a href="<?php //echo base_url('admin/produk/tambah') ?>" class="btn btn-success" style="float: right;">Tambah Data</a> -->
    </div>
</div>
<hr>
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Detail Pemesanan Invoice : <?php echo $pemesanan->invoice; ?>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <h5>Data Pelanggan</h5>
                <strong>
                    <?php
                    $pembeli = $this->User_model->detail_data($pemesanan->pembeli_id);
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
                    Invoice #<?php echo $pemesanan->invoice; ?>
                </strong> <br>
               
                <strong>
                    Tanggal Pemesanan:
                </strong>
                <?php echo $pemesanan->tanggal; ?> <br>

                <strong>
                    Status:
                </strong>
                <?php 
                    if($pemesanan->status == 0){
                        echo "Belum Dikonfirmasi";
                    } else {
                        echo "Sudah Divalidasi";
                    }
                ?>
            
            </div>
            <div class="col-md-4">
                <h5>Alamat Pengiriman</h5>
                <strong>
                    <?php echo $pemesanan->alamat; ?>
                </strong>
                <br>
                <p>
                    Provinsi <?php echo $pemesanan->provinsi; ?> <br>
                    <?php echo $pemesanan->kabupaten.'-'.$pemesanan->kode_pos; ?>
                </p>
                <strong>
                    Jasa Ongkir
                </strong>
                <p>
                    <?php echo strtoupper($pemesanan->kurir); ?> <br>
                    <?php echo $pemesanan->layanan; ?>
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
                ?>

                <tr>
                    <td>
                        <?php echo $no++; ?>
                    </td>
                    <td>
                        Kategori: 
                        <?php 
                            $kategori = $this->Kategori_model->detail_data($pemesanan->kategori_id); 
                            echo $kategori->nama; ?> <br>
                        Ukuran: 
                        <?php 
                            $ukuran = $this->Ukuran_model->detail_data($pemesanan->ukuran_id); 
                            echo $ukuran->ukuran; ?> Cm<br>
                        Berat:
                        <?php echo $ukuran->berat; ?> Kg
                    </td>
                    <td>
                        <?php echo $pemesanan->keterangan; ?>
                    </td>
                    <td align="center">
                        <?php echo $pemesanan->jumlah; ?>
                    </td>
                    <td align="right"><?php echo number_format($pemesanan->harga*$pemesanan->jumlah, 0, ',', '.'); ?></td>
                </tr>
            </tbody>
        </table>
        <br><br>
        <div  class="row">
            <div class="col-md-8"></div>
            <div class="col-md-4">
                <table class="table table-hover table-bordered">
                    <tr>
                        <td>Ongkir</td>
                        <td align="right"><?php echo number_format($pemesanan->ongkir, 0, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td>Total Belanja</td>
                        <td align="right"><?php echo number_format($pemesanan->harga, 0, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td>Total + Ongkir</td>
                        <td align="right"><?php echo number_format($pemesanan->total, 0, ',', '.'); ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                
            </div>
            <div class="col-md-4">
                <a data-toggle="modal" data-target="#<?php echo $pemesanan->id ?>" title="Validasi admin" class="btn btn-warning">
                    Validasi
                </a>
                <a href="<?php echo base_url('admin/pemesanan') ?>"  class="btn btn-danger">Kembali</a>
            </div>            
        </div>
    </div>
</div>

<div class="modal fade" id="<?php echo $pemesanan->id ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Bukti Konfirmasi</h4>
      </div>
      <div class="modal-body">
        <?php if($pemesanan->gambar != ""){ ?>
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new thumbnail">
                <div class="hapus-gambar">
                    <a data-original-title="Hapus" data-placement="left" class="btn btn-bricky tooltips" href="<?php echo base_url('admin/konfirmasi/hapusgambar/'.$pemesanan->id) ?>" onclick="return hapusgambar()">
                        <i class="icon-remove icon-white"></i>
                    </a>
                </div>
                <img src="<?php echo base_url('upload/konfirmasi/'.$pemesanan->gambar) ?>">
            </div>                                      
        </div>
        <?php } else { ?>
        <h2>Pelanggan belum melakukan konfirmasi pembayaran</h2>
        <?php } ?>
      </div>
      <div class="modal-footer">
        <?php if ($pemesanan->status == 3): ?>
            <a href="<?php echo site_url('admin/pemesanan/validasi/'.$pemesanan->id) ?>" class="btn btn-success pull-left">Validasi</a>
            <a href="<?php echo site_url('admin/pemesanan/nonvalidasi/'.$pemesanan->id) ?>" class="btn btn-danger">Tidak Valid</a>
        <?php endif ?>
      </div>
    </div>
  </div>
</div>