
 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Manajemen Kelas</h1>
          </div>
      </section>
      
       <span class=""><?= $this->session->flashdata('pesan') ?> </span>
        <div class="alert alert-info" role="alert">
                 
                  <h4 class="text-white">Manajemen Kelas</h4>
                  <p>Hanya admin yang dapat mengaktifkan, menonaktifkan dan menghapus data siswa!</p>
                  <hr>
                  <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                </div>
       <div class="card">
             
              <!-- /.card-header -->
             <div class="card">
               <?= form_open_multipart(base_url().'Manajemen_kelas/update_data'); ?>
                  <div class="card-header">
                    <h4>Horizontal Form</h4>
                  </div>
                  <div class="card-body">
                    <?php foreach ($data_kelas as $kelas): ?>
                                        
                    <div class="form-group">
                     
                      <input type="hidden" class="form-control" name="id_kelas"value="<?= $kelas->id_kelas ?>">
                    </div>

                    <div class="form-group">
                      <label for="nama_kelas">Nama kelas</label>
                      <input type="text" class="form-control" name="nama_kelas" value="<?=$kelas->nama_kelas  ?>">
                    </div>
                    <div class="form-group">
                      <select name="wali_kelas" id=" "  class="form-control">
                        <?php foreach ($data_guru as $guru): ?>
                          <option value="<?=$guru->username ?>"><?=$guru->username ?></option>

                        <?php endforeach ?>
                        
                      </select>
                    </div>
                    
                    
                  </div>
                <?php endforeach; ?>
                  <div class="card-footer">
                    <button class="btn btn-primary">Submit</button>
                  </div>
                </div>
                 <?= form_close(); ?>

       </div>
    
  </div>





  