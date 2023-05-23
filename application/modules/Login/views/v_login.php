
<div class="container-login bg-white mx-auto mt-5">
    <div class="row">
      <div class="col-md-12">
  	<?= form_open_multipart(base_url().'Login/login_aksi'); ?>
      <div class="container-img mx-auto">
          <img src="<?= base_url() . 'assets/customer/img/logo_baru.png' ?>" alt="">
      </div>
      
     
     <center>

    <h3 class="pt-4"> Masuk Akun</h3>
    <hr>
    <span class="" id="pesan"><?= $this->session->flashdata('pesan') ?> </span>
  </center>
 

 
  
   <center>
    <div class="form-group">
     
      
    <select class="mt-5" id="" name="level" required>
    	<option value="Guru">Guru</option>
    	<option value="Siswa">Siswa</option>
      <option value="Admin">Admin</option>
    </select>
    </div>

    <input class="mt-1" type="text" name="username" placeholder="Username anda" required><br>
    <input class="mt-3" type="password" name="password" placeholder="password" required><br>
    
    <button  type="submit" class="my-3 btn btn-md">LOGIN</button>
     <h6>Tidak memiliki akun?<a href="<?= base_url('Register') ?>">Daftar disini</a></h6>
       <?= form_close(); ?>
  </center>
  </div>
  </div>
</div>
<script>
   
</script>