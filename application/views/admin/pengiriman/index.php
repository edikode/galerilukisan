<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Halaman Pengiriman</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Pembeli
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <a class="btn btn-primary btn-sm" href="<?php echo site_url('pengiriman/add'); ?>"><i class="fa fa-plus"></i> Tambah Data</a><br><br>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Id Pengiriman</th>
                                <th>Kota Asal</th>
                                <th>Kota Tujuan</th>
                                <th>Berat Kiriman</th>
                                <th>Kurir</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php
							$i= 0;
							foreach($pengiriman as $b){

							//  $data[$i]['r'] = $this->Rekap_pembayaran_log_model->get_total_rekap_pembayaran_log($b['no_bpk']);

							  ?>
							<tr>
							  
							  <td><?php echo $b['idPengiriman']; ?></td>
							  <td><?php echo $b['KotaAsal']; ?></td>
                              <td><?php echo $b['KotaTujuan']; ?></td>
                              <td><?php echo $b['BeratKiriman']; ?></td>
                              <td><?php echo $b['Kurir']; ?></td>
							  <td>
							    <a href="<?php echo site_url('pengiriman/edit/'.$b['idPengiriman']); ?>" class="btn btn-info btn-sm"><span class="fa fa-pencil"></span></a>
							    <a href="<?php echo site_url('pengiriman/remove/'.$b['idPengiriman']); ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
							  </td>
							</tr>
							<?php  $i++; } ?>
							</tbody>
                    </table>
                    
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
