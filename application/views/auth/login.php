<div class="card card-login mx-auto mt-5">
  <div class="card-header">Login</div>
  
  <?php if(isset($message)){ ?>
    <div class="text-center mt-5">
      <h4><?php echo $message;?></h4>
    </div>
  <?php } ?>

  <div class="card-body">
    <?php 
      if ($this->session->userdata('pesan_login')) { ?>
        <div class="alert alert-danger">
          <?php 
            $pesan = $this->session->userdata('pesan_login'); 
            $this->session->sess_destroy();
            echo $pesan;

          ?>
        </div>
    <?php } ?>
    
    <?php echo form_open("auth/login");?>
      <div class="form-group">
        <label for="identity">Username/Email</label>
        <input class="form-control" id="identity" name="identity" type="text" aria-describedby="emailHelp" placeholder="" >
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control" id="password" name="password" type="password" placeholder="Password">
      </div>
      <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
    </form>

    <div class="text-center">
      <a class="d-block small mt-3" href="<?php echo base_url('user/daftar') ?>">Daftar Akun Baru</a>
      <!-- <a class="d-block small" href="<?php //echo base_url('auth/forgot_password') ?>">Lupa Password?</a> -->
    </div>
  </div>
</div>