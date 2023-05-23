
 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Edit Sub Tryout</h1>
          </div>
      </section>
      
       <span class=""><?= $this->session->flashdata('pesan') ?> </span>
        <div class="alert alert-info" role="alert">
                 
                  <h4 class="text-white">Edit Sub Tryout</h4>
                  <p>Hanya admin yang dapat mengaktifkan, menonaktifkan dan menghapus data siswa!</p>
                  <hr>
                  <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                </div>
       <div class="card">
             
              <!-- /.card-header -->
             <div class="card">
               <?= form_open_multipart(base_url().'Tryout/edit_sub_to_aksi'); ?>
                  <div class="card-header">
                    <h4>Horizontal Form</h4>
                  </div>
                  <div class="card-body">
                  
                                        
                   
                    <?php foreach($data_sub_to as $dst): ?>
                       <div class="form-group">
                     
                      <input type="hidden" class="form-control" name="id"value="<?= $dst->id ?>">
                    </div>
                    <div class="form-group">
                      <label for="nama_kelas">Judul Sub Tryout</label>
                      <input type="text" class="form-control" name="judul" value="<?= $dst->nama ?>">
                    </div>
                       <div class="form-group">
            <label for="jurusan_ujian">Jurusan Ujian</label>
             <select name="jurusan_ujian" id="" class="form-control"  required>
              <option value="">--Pilih Jurusan Ujian--</option>
              <option value="saintek"

               <?php if ($dst->jurusan_ujian == 'saintek'): ?>
                selected="selected"
              <?php endif ?>>Saintek</option>
              <option value="soshum" <?php if ($dst->jurusan_ujian == 'soshum'): ?>
                selected="selected"
              <?php endif ?>>Soshum</option>
               
            </select>
            <?= form_error('jurusan_ujian'); ?>
          </div>
                    
                    <?php endforeach; ?>
                    
                    
                  </div>
                
                  <div class="card-footer">
                    <button class="btn btn-primary">Submit</button>
                  </div>
                </div>
                 <?= form_close(); ?>

       </div>
    
  </div>





  