<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Pengiriman</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Form Tambah Data
                </div>
                <div class="panel-body">
                <?php echo form_open('pengiriman/add','role="form" class="form-horizontal"'); ?>
                <?php echo validation_errors(); ?>
                    <form role="form" class="form-horizontal"  method="post">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-1">
                                ID
                            </label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="ID" name="idPengiriman" class="form-control" value="<?php echo $this->input->post('idPengiriman'); ?>" required> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-20">
                                Kota Asal
                            </label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Kota Asal" name="KotaAsal" value="<?php echo $this->input->post('KotaAsal'); ?>" class="form-control limited" maxlength="25" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-20">
                                Kota Tujuan
                            </label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Kota Tujuan" name="KotaTujuan" value="<?php echo $this->input->post('KotaTujuan'); ?>" class="form-control limited" maxlength="25" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-20">
                                Berat Kiriman
                            </label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Berat Kiriman" name="BeratKiriman" value="<?php echo $this->input->post('BeratKiriman'); ?>" class="form-control limited" maxlength="25" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-20">
                                Kurir
                            </label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Kurir" name="Kurir" value="<?php echo $this->input->post('Kurir'); ?>" class="form-control limited" maxlength="25" required>
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