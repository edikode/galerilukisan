<div class="card card-register mx-auto mt-5">
  <div class="card-header">Daftar Akun Baru</div>

  <?php if(isset($message)){ ?>
    <div class="text-center mt-5">
      <h4><?php echo $message;?></h4>
    </div>
  <?php } ?>

  <div class="card-body">
    <?php echo form_open("user/daftar");?>
      <div class="form-group">
        <div class="form-row">
          <div class="col-md-6">
            <label for="first_name">Nama Depan</label>
            <input class="form-control" id="first_name"name="first_name" type="text" value="<?php echo $this->input->post('first_name'); ?>" placeholder="" required>
          </div>
          <div class="col-md-6">
            <label for="last_name">Nama Belakang</label>
            <input class="form-control" id="last_name" name="last_name" type="text" value="<?php echo $this->input->post('last_name'); ?>" required>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="form-row">
          <div class="col-md-6">
            <label for="phone">Telepon</label>
            <input class="form-control" id="phone" name="phone" type="text" placeholder="" value="<?php echo $this->input->post('phone'); ?>" required>
          </div>
          <div class="col-md-6">
            <label for="company">Alamat</label>
            <input class="form-control" id="company" name="company" type="text" value="<?php echo $this->input->post('company'); ?>" required>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" id="email" type="email" name="email" value="<?php echo $this->input->post('email'); ?>" required>
      </div>
      <div class="form-group">
        <div class="form-row">
          <div class="col-md-6">
            <label for="password">Password</label>
            <input class="form-control" id="password" type="password" name="password" value="" placeholder="Password" required>
          </div>
          <div class="col-md-6">
            <label for="password_confirm">Ulangi password</label>
            <input class="form-control" id="password_confirm" type="password" name="password_confirm" placeholder="Ulangi password" required>
          </div>
        </div>
      </div>
      <button type="submit" name="submit" class="btn btn-primary btn-block">Daftar</button>
    </form>
    <div class="text-center">
      <a class="d-block small mt-3" href="<?php echo base_url('auth/login') ?>">Login</a>
      <a class="d-block small" href="<?php echo base_url('auth/forgot_password') ?>">Lupa Password?</a>
    </div>
  </div>
</div>