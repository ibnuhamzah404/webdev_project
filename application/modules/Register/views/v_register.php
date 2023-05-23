
<div class="container-register bg-white mx-auto mt-5">
     <?= form_open_multipart(base_url().'Register/regis_aksi'); ?>
   <h3 class="pt-4"> Register Form</h3>
   <div class="row"> 
  
  <div class="col-md-12">
      <!-- label class="if mt-3" for=""><h6> Nis</h6></label>
      <input  class="if mb-3" type="number" name="nis" <?= form_error('nis') ? 'is-invalid' : null ?> value="<?= set_value('nis'); ?>" required> -->
      <label class="if mt-3" for=""><h6>  Email</h6></label>
    <input class="if mb-3"type="text" name="email" <?= form_error('email') ? 'is-invalid' : null ?>  value="<?= set_value('email'); ?>"required>
  </div>
  <div class="col-md-6">

    <label class="if mt-3" for=""><h6> Nama</h6></label>
    <input  class="if mb-3" type="text" name="nama" <?= form_error('nama') ? 'is-invalid' : null ?> value="<?= set_value('nama'); ?>"required> 
    
     <label class="if mt-3" for=""><h6>  Tanggal Lahir</h6></label>
    <input class="if mb-3"type="date" name="tgl_lahir" <?= form_error('tgl_lahir') ? 'is-invalid' : null ?>  value="<?= set_value('tgl_lahir'); ?>"required>
      
    <label class="tlp if " for=""><h6>  Password </h6></label><br>
     <input id="password" type="password" class="if pwstrength" data-indicator="pwindicator" name="password">
      <?= form_error('password') ?>
  

 
  </div>
  <div class="col-md-6">
  
        <label class="if mt-3"for=""><h6> username</h6></label>
       <input class="if mb-3"type="text" name="username"  <?= form_error('username') ? 'is-invalid' : null ?>  value="<?= set_value('username'); ?>" required>
      <label class="if mt-3" for=""><h6> Jenis Kelamin</h6></label><br>
      
                 
      <select name="jenis_kelamin" class="mb-3">
        <option value="laki-laki">laki-laki</option>
        <option value="Perempuan">Perempuan</option>
      </select>
        <?= form_error('jenis_kelamin') ?>


       
     
   
    <label class="tlp if " for=""><h6> Konfirmasi Password</h6></label><br>
  
    <input id="confirm_password" type="password" class="if" name="confirm_password">
                        <?= form_error('confirm_password') ?>
    


  </div>
  <div class="col-md-12">
          <div class="form-group mt-3">
            <label for="jurusan">Jurusan Ujian</label>
             <select name="jurusan" id="" class=""  required>
              <option value="saintek">--Pilih Jurusan Ujian--</option>
              <option value="saintek">Saintek</option>
              <option value="soshum">Soshum</option>
             
            </select>
            <?= form_error('jurusan'); ?>
          </div>
         
          </div>


 </div> 

  <button class=" sb mt-4 btn btn-md btn-warning"> Registrasi</button>
  <?= form_close(); ?>
</div>
