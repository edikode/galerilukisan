<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url('admin') ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Laporan Pemesanan</li>
</ol>

<div class="row">
    <div class="col-md-12">
        <h2 class="page-header" style="display: initial;">Laporan Pemesanan</h2>
        <!-- <a href="<?php //echo base_url('admin/produk/tambah') ?>" class="btn btn-success" style="float: right;">Tambah Data</a> -->
    </div>
</div>
<hr>
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Laporan Pemesanan
    </div>
    <div class="card-body">
        <?php echo form_open('admin/laporan_pemesanan','role="form" class="form-horizontal"'); ?>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <!-- panggil fungsi tahun -->
                        <label class="control-label">Bulan</label>
                        <select name="bulan" id="bulan" class="form-control search-select">
                            <option value="1" <?php if($bulan == 1) { echo "selected"; } ?> >Januari</option>
                            <option value="2"  <?php if($bulan == 2) { echo "selected"; } ?> >Februari</option>
                            <option value="3"  <?php if($bulan == 3) { echo "selected"; } ?> >Maret</option>
                            <option value="4"  <?php if($bulan == 4) { echo "selected"; } ?> >April</option>
                            <option value="5"  <?php if($bulan == 5) { echo "selected"; } ?> >Mei</option>
                            <option value="6"  <?php if($bulan == 6) { echo "selected"; } ?> >Juni</option>
                            <option value="7"  <?php if($bulan == 7) { echo "selected"; } ?> >Juli</option>
                            <option value="8"  <?php if($bulan == 8) { echo "selected"; } ?> >Agustus</option>
                            <option value="9"  <?php if($bulan == 9) { echo "selected"; } ?> >September</option>
                            <option value="10"  <?php if($bulan == 10) { echo "selected"; } ?> >Oktober</option>
                            <option value="11"  <?php if($bulan == 11) { echo "selected"; } ?> >November</option>
                            <option value="12"  <?php if($bulan == 12) { echo "selected"; } ?> >Desember</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label">Tahun</label>
                        <select name="tahun" id="tahun" class="form-control search-select">
                            <option value="2018" <?php if($tahun == 2018) { echo "selected"; } ?> >2018</option>
                            <option value="2019" <?php if($tahun == 2019) { echo "selected"; } ?> >2019</option>
                            <option value="2020" <?php if($tahun == 2020) { echo "selected"; } ?> >2020</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="keyword">Filter Alamat</label>
                        <input type="text" id="keyword" class="form-control" name="keyword" placeholder="Masukkan Kata Kunci" value="<?php echo $keyword; ?>">
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary" style="margin-top: 30px;">Tampilkan</button>
                </div>
                <div class="col-md-3">
                    <a data-original-title='Cetak' target="_blank"  class='btn btn-warning tooltips' href='
                    <?php 
                    if($keyword == ''){ $keyword = "tanpa_keyword"; } else { $keyword; }
                    echo site_url('admin/laporan_pemesanan/cetak/'.$keyword.'/'.$bulan.'/'.$tahun) ?>' style="margin-top: 30px; float: right;">
                        Cetak Laporan <i class='fa fa-print'></i>
                    </a>
                </div>
            
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width: 12%;">Tanggal Beli</th>
                        <th>Invoice</th>
                        <th>Nama</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Detail Beli</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $qty_semua = 0;
                    $total_semua = 0;
                    foreach($laporan as $p){
                        if($p->total == 0){
                            continue;
                          }
                        ?>
                        <tr>
                            <td class="no"><?php echo $this->fungsi->tanggal_id($p->tanggal); ?></td>
                            <td><?php echo $p->invoice; ?></td>
                            <td>
                                <?php
                                $pembeli = $this->User_model->detail_data($p->pembeli_id);
                                echo $pembeli->first_name;
                                ?>
                            </td>
                            <td><?php echo $pembeli->phone; ?></td>
                            <td><?php echo $p->alamat.' <br>Kab. '.$p->kabupaten.' - Prov. '.$p->provinsi; ?></td>
                            <td>
                                <?php 
                                    $kategori = $this->Kategori_model->detail_data($p->kategori_id);
                                    $ukuran = $this->Ukuran_model->detail_data($p->ukuran_id);
                                    echo 'Kategori: '.$kategori->nama.', '.$ukuran->ukuran.'Cm '.$ukuran->berat.'kg';
                                ?>
                            </td>
                            <td align="center"><?php echo $p->jumlah; ?></td>
                            <td align="right"><?php echo number_format($p->total, 0, ',', '.'); ?></td>
                        </tr>

                    <?php 
                        $qty_semua = $qty_semua + $p->jumlah;
                        $total_semua = $total_semua + $p->total;
                    } 

                    
                    if(count($laporan) == 0){
                        echo "<tr><td colspan='8' align='center'><strong>Tidak Ada data</stor</td></tr>";
                    } else {
                    ?>
                    <tr>
                        <td colspan="6"><strong>Total</strong></td>
                        <td align="center"><?php echo $qty_semua; ?></td>
                        <td align="right"><?php echo number_format($total_semua, 0, ',', '.'); ?></td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>

            <hr>
            <h6>Jumlah Pemesanan: <?php echo count($laporan); ?></h6>
            <?php //echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>
