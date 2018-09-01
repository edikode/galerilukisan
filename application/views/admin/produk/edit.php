<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url('admin') ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active"> Produk</li>
</ol>

<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">Edit Produk</h2>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Edit Produk
            </div>
            <div class="card-body">
                <?php echo form_open('admin/produk/edit/'.$produk->id,'role="form"  enctype="multipart/form-data" class="form-horizontal"'); ?>
                    <?php echo validation_errors(); ?>
                    <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="id">Nama Produk</label>
                            <input type="text" placeholder="Nama Produk" name="nama" value="<?php echo ($this->input->post('nama') ? $this->input->post('nama') : $produk->nama); ?>" class="form-control" required>
                        </div>
                        <div class='form-group'>
                            <label class='control-label'>Teks</label>
                            <textarea class='ckeditor' id='ckeditor' name='teks'><?php echo ($this->input->post('teks') ? $this->input->post('teks') : $produk->teks); ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <?php if($produk->gambar != ""){ ?>
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="max-width:334px; max-height:253px; position:relative;">
                                <div class="hapus-gambar">
                                    <a data-original-title="Hapus" data-placement="left" class="btn btn-bricky tooltips" href="<?php echo base_url('admin/produk/hapusgambar/'.$produk->id) ?>" onclick="return hapusgambar()">
                                        <i class="icon-remove icon-white"></i>
                                    </a>
                                </div>
                                <img src="<?php echo base_url('upload/produk/'.$produk->gambar) ?>">
                            </div>  
                            <a href="<?php echo site_url('admin/produk/hapusgambar/'.$produk->id) ?>" class="btn btn-danger">Hapus Gambar</a>               
                        </div>

                        <?php } else { ?>
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="max-width:334px; max-height:253px;"><img src="<?php echo base_url(); ?>assets/admin/img/400x300.jpg" alt="" class="img-thumbnail"/>
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 400px; max-height: 300px; line-height: 20px;"></div>
                            <div style="margin-left: -10px">
                                <span class="btn btn-file">
                                    <span class="fileupload-new btn btn-primary">Pilih Gambar</span>
                                    <span class="fileupload-exists btn btn-primary">Ganti</span>
                                    <input type="file" name="gambar">
                                </span>
                                <a href="#" class="btn fileupload-exists btn-danger" data-dismiss="fileupload">
                                    Hapus
                                </a>
                            </div>
                        </div>
                        <?php } ?>

                        <div class="form-group">
                            <label for="id">Kategori</label>
                            <select name="kategori_id" class="form-control" required="">
                                <option value="">--- Pilih Kategori ---</option>
                                <?php foreach ($kategori as $kat) { ?>
                                    <option value="<?php echo $kat->id ?>" <?php if($kat->id == $produk->kategori_id){ echo "selected"; } else { } ?>>
                                        <?php echo $kat->nama; ?>
                                    </option>    
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ukuran">Ukuran</label>
                            <select name="ukuran_id" id="ukuran" class="form-control" required="">
                                <option value="">Pilih Ukuran</option>
                                <?php 
                                    foreach ($ukuran as $u): 
                                        if($u->id == ($this->input->post('ukuran_id') ? $this->input->post('ukuran_id') : $produk->ukuran_id)){
                                            echo "<option value='$u->id' selected>$u->ukuran</option>";
                                        } else {
                                            echo "<option value='$u->id'>$u->ukuran</option>";
                                        } 
                                    endforeach 
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <hr>
                        <div style="float: right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?php echo base_url('admin/produk') ?>"  class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
