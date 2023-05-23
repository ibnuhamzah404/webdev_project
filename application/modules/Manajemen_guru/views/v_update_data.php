
 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Edit Guru</h1>
          </div>
      </section>
      
       <span class=""><?= $this->session->flashdata('pesan') ?> </span>
        <div class="alert alert-info" role="alert">
                 
                  <h4 class="text-white">Guru</h4>
                  <p>Dimenu ini anda dapat megedit data guru, hanya guru yang dapat melakukan perubahan!</p>
                  <hr>
                  
                </div>
       <div class="card">
             
              <!-- /.card-header -->
             <div class="card">
               <?= form_open_multipart(base_url().'Manajemen_guru/update_data'); ?>
                  <div class="card-header">
                    <h4>Horizontal Form</h4>
                  </div>
                  <div class="card-body">
                    <?php foreach ($data_guru as $guru): ?>
                    
                    
                                        
                    <div class="form-group">
                     
                      <input type="text" class="form-control" name="id_guru" value="<?= $guru->id_guru ?>">
                    </div>
                     <div class="form-group">
                      <label for="nip">NIP</label>
                      <input type="text" class="form-control" name="nip" value="<?= $guru->nip?>">
                    </div>

                    <div class="form-group">
                      <label for="nama_guru">Nama Guru</label>
                      <input type="text" class="form-control" name="nama" value="<?= $guru->nama?>">
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                           <label for="username">Username</label>
                          <input type="text" class="form-control" name="username" value="<?= $guru->username?>">
                        </div>
                       </div>
                       <div class="col-md-6">
                    <div class="form-group">
                       <label for="password">Password</label>
                      <input type="text" class="form-control" name="password" value="<?= $guru->password?>">
                    </div>
                    </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                           <label for="username">Tanggal Lahir</label>
                          <input type="date" class="form-control" name="tgl_lahir" value="<?= $guru->tanggal_lahir?>">
                        </div>
                       </div>
                       <div class="col-md-6">
                    <div class="form-group">
                      <?php $jnk =  $guru->jenis_kelamin; ?>
                      <?= $jnk; ?>
                       <label for="password">Password</label>
                        <select name="jenis_kelamin"  id=""  class="form-control"><option value="Laki-laki" 
                          <?php if($jnk=="Laki-laki"):  ?>
                            selected="selected"
                          <?php endif; ?>>Laki laki</option>
                          <option value="Perempuan" 
                          <?php if($jnk=="Perempuan"):?>
                            selected="selected"
                          <?php endif; ?> >Perempuan</option>
                        </select>
                    </div>
                     

                    </div>
                    </div>
                    <div class="form-group">
                      <?php $st =  $guru->status; ?>
                      
                       <label for="status">Status</label>
                        <select name="status"  id=""  class="form-control"><option value="aktif" 
                          <?php if($st=="aktif"):  ?>
                            selected="selected"
                          <?php endif; ?>>Aktif</option>
                          <option value="nonaktif" 
                          <?php if($st=="nonaktif"):?>
                            selected="selected"
                          <?php endif; ?> >Nonaktif</option>
                        </select>
                    </div>

                    <?php endforeach; ?>
                    
                  </div>
            
                  <div class="card-footer">
                    <button class="btn btn-primary">Submit</button>
                     <a href="<?= base_url('Manajemen_guru') ?>" class="btn btn-md btn-warning">Kembali</a>
                  </div>
                </div>
                 <?= form_close(); ?>

       </div>
    
  </div>





  