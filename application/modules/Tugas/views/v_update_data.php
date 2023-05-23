
 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Manajemen Guru</h1>
          </div>
      </section>
      
       <span class=""><?= $this->session->flashdata('pesan') ?> </span>
        <div class="alert alert-info" role="alert">
                 
                  <h4 class="text-white"> Edit tugas</h4>
                  <p>Hanya admin yang dapat mengaktifkan, menonaktifkan dan menghapus data siswa!</p>
                  <hr>
                  <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                </div>
       <div class="card">
             
              <!-- /.card-header -->
             <div class="card">
               <?= form_open_multipart(base_url().'Tugas/update_data'); ?>
                  <div class="card-header">
                    <h4>Horizontal Form</h4>
                  </div>
                  <div class="card-body">
                    <?php foreach ($data_tugas as $tugas):?>
                    
                    
                                        
                    <div class="form-group">
                     
                      
                      
                      <input type="text" class="form-control" name="id_tugas" value="<?= $tugas->id_tugas ?>">
                    </div>
                     <div class="form-group">
                      <label for="judul_tugas">Judul Tugas</label>
                      <input type="text" class="form-control" name="judul" value="<?= $tugas->judul_tugas ?>">
                    </div>
                    <div class="form-group">

                       <label for="kelas">Kelas</label>
                        <select name="kelas"  id=""  class="form-control">
                          <?php foreach ($data_kelas as $kelas): ?>
                            <?php $kls = $kelas->nama_kelas ?>
                            <option value="<?=$kelas->nama_kelas?>" 
                              <?php if($kelas->nama_kelas == $tugas->kelas): ?>
                                selected="selected"
                              <?php endif; ?>
                              ><?= $kelas->nama_kelas ?> </option>
                          <?php endforeach ?>
                        </select>
                      </div>

                 
                     <input type="hidden" class="form-control" name="file_lama" value="<?= $tugas->nama_file ?>">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                           <label for="file_tugas">file tugas</label>
                          <input type="file" class="form-control" name="file" value="">
                        </div>
                       </div>
                       <div class="col-md-6">
                         <div class="form-group">
                           <label for="username">Tanggal Deadline</label>
                          <input type="datetime-local" value='<?php echo  date('Y-m-d\TH:i', strtotime($tugas->tanggal_deadline))  ?>' class="form-control" name="tanggal_deadline">
                        </div>
                       
                       
                      </div>


                    </div>
                     <div class="form-group">
                      <label for="judul_tugas">Deskripsi</label>
                      <textarea name="deskripsi_tugas" class="form-control" id="" cols="30" rows="10"><?= $tugas->deskripsi_tugas ?></textarea>
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





  