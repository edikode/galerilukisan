<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url('admin') ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Ukuran</li>
</ol>

<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Edit Ukuran</h2>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-lg-8">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Edit Ukuran
            </div>
            <div class="card-body">
                <?php echo form_open('admin/ukuran/edit/'.$ukuran->id,'role="form" class="form-horizontal"'); ?>
                    <?php echo validation_errors(); ?>
                    <div class="form-group">
                        <label for="ukuran">Ukuran</label>
                        <input type="text" id="ukuran" placeholder="ukuran" name="ukuran" value="<?php echo ($this->input->post('ukuran') ? $this->input->post('ukuran') : $ukuran->ukuran); ?>" class="form-control limited" maxlength="25" required>
                    </div>
                    <div class="form-group">
                        <label for="berat">Berat</label>
                        <input type="text" id="berat" placeholder="berat" name="berat" value="<?php echo ($this->input->post('berat') ? $this->input->post('berat') : $ukuran->berat); ?>" class="form-control limited" maxlength="25" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?php echo base_url('admin/ukuran') ?>"  class="btn btn-danger">Kembali</a>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
