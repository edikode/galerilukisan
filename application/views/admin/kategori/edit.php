<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url('admin') ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Kategori Produk</li>
</ol>

<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Edit Kategori Produk</h2>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-lg-8">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Edit Kategori Produk
            </div>
            <div class="card-body">
                <?php echo form_open('admin/kategori/edit/'.$kategori->id,'role="form" class="form-horizontal"'); ?>
                    <?php echo validation_errors(); ?>
                    <div class="form-group">
                        <label for="id">Nama Kategori</label>
                        <input type="text" placeholder="Nama Kategori" name="nama" value="<?php echo ($this->input->post('nama') ? $this->input->post('nama') : $kategori->nama); ?>" class="form-control limited" maxlength="25" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?php echo base_url('admin/kategori') ?>"  class="btn btn-danger">Kembali</a>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
