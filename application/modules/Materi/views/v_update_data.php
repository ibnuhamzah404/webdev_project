
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
               <?= form_open_multipart(base_url().'Materi/update_data'); ?>
                  <div class="card-header">
                    <h4>Horizontal Form</h4>
                  </div>
                  <div class="card-body">
                    <?php foreach ($data_materi as $materi): ?>
                                        
                    <div class="form-group">
                     
                      <input type="hidden" readonly class="form-control" name="id_materi"value="<?= $materi->id_materi ?>">
                    </div>

                    <div class="form-group">
                      <label for="judul">Judul Materi</label>
                      <input type="text" class="form-control" name="judul" value="<?= $materi->judul_materi ?>">
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                         <div class="form-group">

                       <label for="kelas">Kelas</label>
                        <select name="kelas"  id=""  class="form-control">
                          <?php foreach ($data_kelas as $kelas): ?>
                            <?php $kls = $kelas->nama_kelas ?>
                            <option value="<?=$kelas->nama_kelas?>" 
                              <?php if($kelas->nama_kelas == $materi->kelas): ?>
                                selected="selected"
                              <?php endif; ?>
                              ><?= $kelas->nama_kelas ?> </option>
                          <?php endforeach ?>
                        </select>
                      </div>
                      </div>
                      <div class="col-md-6">
                        <input type="hidden" class="form-control" name="file_lama" value="<?= $materi->nama_file ?>">
                        
                        <div class="form-group">
                            <label for="file">File</label>
                            <input type="file" class="form-control" name="file" value="">
                        </div>
                      </div>

                      
                  </div>
                  <div class="form-group">
                      <label for="jenis_materi">Jenis Materi</label>
                    
                        <select name="jenis_materi" id=""class="form-control" >
                          <?php  $jm = $materi->jenis_materi; ?>
                          
                          <option value="V"
                          <?php if($jm == 'V'): ?>
                            selected="selected"
                          <?php endif; ?>
                          >Visual</option>
                          <option value="A"
                           <?php if($jm == 'A'): ?>
                            selected="selected"
                          <?php endif; ?>
                          >Audio</option>
                          <option value="R"
                           <?php if($jm == 'R'): ?>
                            selected="selected"
                          <?php endif; ?>
                          >Read</option>
                          <option value="K"
                           <?php if($jm == 'K'): ?>
                            selected="selected"
                          <?php endif; ?>
                          >Kinetic</option>
              
              
                          </select>
                     
                    </div>
                    <div class="form-group">
                      <label for="deskripsi_materi">Deskripsi</label>
                     <textarea name="deskripsi_materi" id="" class="form-control" cols="10" rows="10"><?= $materi->deskripsi_materi ?></textarea>
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





  