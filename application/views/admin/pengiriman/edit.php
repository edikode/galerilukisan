<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Pengiriman</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Form Edit Data
                </div>
                <div class="panel-body">
                <?php echo form_open('pengiriman/edit/'.$pengiriman['idPengiriman'],'role="form" class="form-horizontal"'); ?>
                <?php echo validation_errors(); ?>
                    <form role="form" class="form-horizontal" >
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-1">
                                ID
                            </label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="ID" name="idPengiriman" class="form-control" value="<?php echo ($this->input->post('idPengiriman') ? $this->input->post('idPengiriman') : $pengiriman['idPengiriman']); ?>" readonly="" /> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-20">
                                Kota Asal
                            </label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Kota Asal" name="KotaAsal" value="<?php echo ($this->input->post('KotaAsal') ? $this->input->post('KotaAsal') : $pengiriman['KotaAsal']); ?>" class="form-control limited" maxlength="25" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-20">
                                Kota Tujuan
                            </label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Kota Tujuan" name="KotaTujuan" value="<?php echo ($this->input->post('KotaTujuan') ? $this->input->post('KotaTujuan') : $pengiriman['KotaTujuan']); ?>" class="form-control limited" maxlength="25" required>
                            </div>
                        </div>                       
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-20">
                                Berat Kiriman
                            </label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Berat Kiriman" name="BeratKiriman" value="<?php echo ($this->input->post('BeratKiriman') ? $this->input->post('BeratKiriman') : $pengiriman['BeratKiriman']); ?>" class="form-control limited" maxlength="25" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-20">
                                Kurir
                            </label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Kurir" name="Kurir" value="<?php echo ($this->input->post('Kurir') ? $this->input->post('Kurir') : $pengiriman['Kurir']); ?>" class="form-control limited" maxlength="25" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-8">
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" name="submit" class="btn btn-blue">
                                    Save changes
                                </button>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </form>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>